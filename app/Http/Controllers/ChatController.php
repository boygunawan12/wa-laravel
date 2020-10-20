<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Device; 
use App\Chat; 
use Illuminate\Support\Facades\Http;
use Str;
use App\User;
use App\ChatSend;







class ChatController extends Controller
{
   public function index(){

        $user = user();
        $token = $user->token;
        $quota = $user->quota;

    if (empty($token)) {
        # code...
 $newToken = Str::random(10);

        User::where('id',user()->id)->update(['token'=>$newToken]);
    }


    $quotaLeft =  $quota-ChatSend::where('userid',$user->id)->count();


    return view('chat/index',compact('quotaLeft'));
   }

   public function send(Request $request){
    // print_r($request->all());
    $phone = $request->phone;
    $message = $request->message;
    $fromDeviceId = $request->fromDevice;
    $device = Device::find($fromDeviceId);
    $fromDevice =$device->phone;







            $response = Http::get('http://localhost:3000/chat/send', [
                'phone' => $phone,
                'fromDevice' => $fromDevice,
                'message' => $message,
            ]);
        // print_r($response);

        $body =$response->body();
        $decode = json_decode($body);
        // print_r($decode);
        $status = $decode->status;

        if ($status==401) {

            $device = Device::where(['phone'=>$fromDevice])->update(['status'=>'0']);

            # code...

            return [
                'success'=>false,
                'msg'=>'Sorry, Your Device is Unauthorized'
            ];

        }
        else{
            return [
                'success'=>true,
                'msg'=>'Message Sent'
            ];
        }
        // print_r($body);


   }

   public function list(Request $request){


        return view('chat.list');
   }

    public function onMessage(Request $request){
        $phone = $request->phone;
        $device = Device::where('phone',$phone);

        $deviceData = $device->first();
         $data =[
            'phone'=>$deviceData->id,
            'userid'=>$deviceData->userid,
            'chat'=>$request->chat,
            'jid'=>$request->jid
        ];
        broadcast(new \App\Events\OnMessage($data));

        return[
            'success'=>true
        ];
    }
   public function listJson(Request $request){
        $id = $request->id;
        // $device = Device::find($id);
        $phone = $request->id;


          $response = Http::get('http://localhost:3000/chat/load', [
                'phone' => $phone,
                'load'=>true,
                // 'fromDevice' => $fromDevice,
                // 'message' => $message,
            ]);


        $body =$response->body();
        
        $decode = json_decode($body);
        // print_r($decode);
        $status = @$decode->status;

        if ($status==401) {

            $device = Device::where(['phone'=>$phone])->update(['status'=>'0']);

            # code...

            return [
                'success'=>false,
                'msg'=>'Sorry, Your Device is Unauthorized'
            ];

        }


        $decode = json_decode($body);

        $chats = $decode->chats;

        $results = getChats($chats);

        if (!empty($results)) {
            # code...
            return [
                'success'=>true,
                'data'=>$results
            ];
        }
        else{
            return [
                'success'=>false,
                'msg'=>'data not found'
            ];
        }
        // return $results;

   }
   public function incomingMessage(Request $request){

        $data  = [
            'jid'=>$request->jid,
            'conversation'=>$request->conversation
        ];

        broadcast(new \App\Events\OnMessageIncoming($data));

   }
}
