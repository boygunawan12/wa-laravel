<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Device; 
use App\Chat; 
use Illuminate\Support\Facades\Http;
use Str;
use App\User;







class ChatController extends Controller
{
   public function index(){

        $token = user()->token;

    if (empty($token)) {
        # code...
 $newToken = Str::random(10);

        User::where('id',user()->id)->update(['token'=>$newToken]);
    }
    return view('chat/index');
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

        $chat = Chat::find(1);
        $response = $chat->response;

        $decode = json_decode($response);
        // print_r($decode);
        $chats = $decode->chats;
        // $chats = json_decode($chats);

        $chats = getChats($chats);

        // print_r($chats);
        // return $chats;
        // print_r($results);
        

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
        $device = Device::find($id);
        $phone = $device->phone;


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

        // $chat = new Chat;
        // $chat->response = $body;
        // $chat->userid = user()->id;
        // $chat->save();

        $decode = json_decode($body);

        // print_r($decode);
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
