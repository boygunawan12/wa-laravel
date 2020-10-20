<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Device; 
use App\Chat; 
use App\ChatSend;
use Illuminate\Support\Facades\Http;







class ApiController extends Controller
{
    public function sendMessage(Request $request){
        $deviceId = $request->device;
        $message = $request->message;
        $userid = $request->user->id;

        $phone = $request->phone.'@s.whatsapp.net';
      
        $deviceData  = Device::where(['phone'=>$deviceId,'userid'=>$userid]);

        if ($deviceData->count()==0) {
            # code...

            return [
                'success'=>false,
                'msg'=>'Device Not Found'
            ];
        }


        $fromDevice = $device->first()->phone;








    $user = $request->user;
    $quota = $user->quota;
    // $count = ChatSend::where('userid',$user->id)->count();
    $quotaLeft =  $quota-ChatSend::where('userid',$user->id)->count();

    if ($quotaLeft==0) {
        # code...
      return [
                'success'=>false,
                'msg'=>'Sorry, your quota was exceeded'
            ];
            

    }



        $response = Http::get('http://localhost:3000/chat/send', [
                'phone' => $phone,
                'fromDevice' => $fromDevice,
                'message' => $message,
            ]);
        // print_r($response);

        $body =$response->body();
        $decode = json_decode($body);
        // print_r($decode);
        $status = @$decode->status;


        if ($status==401) {

            $device = Device::where(['phone'=>$fromDevice])->update(['status'=>'0']);

            # code...

            return [
                'success'=>false,
                'msg'=>'Sorry, Your Device is Unauthorized'
            ];

        }
        else{
            sendChat($userid);

            return [
                'success'=>true,
                'msg'=>'Message Sent'
            ];
        }


    }
      public function sendMedia(Request $request){
        // print_r($request->all());

        // exit();
        $device = $request->device;
        $userid = $request->user->id;
        $message = $request->message;
        $phone = $request->phone;
        $file = $request->file('file');



    $validatedData = $request->validate([
"file" => 'image',
'message'=>'required',
'device'=>'required'

]);



        // print_r($userid);
        // exit();


    $user = $request->user;
    $quota = $user->quota;
    // $count = ChatSend::where('userid',$user->id)->count();
    $quotaLeft =  $quota-ChatSend::where('userid',$user->id)->count();

    if ($quotaLeft==0) {
        # code...
      return [
                'success'=>false,
                'msg'=>'Sorry, your quota was exceeded'
            ];
            

    }



        $deviceData  = Device::where(['phone'=>$device,'userid'=>$userid]);

        if ($deviceData->count()==0) {
            # code...

            return [
                'success'=>false,
                'msg'=>'Device Not Found'
            ];
        }
        $fromDevice = $deviceData->first()->phone;






        if (!empty($file)) {
            # code...

        $original_name = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path('uploads'),$original_name);

        $photo = fopen(public_path('/uploads/') . $original_name, 'r');


        $sendTo = $phone.'@s.whatsapp.net';
        // $sendTo = '6281215416084-1564231374@g.us';




        $response = Http::attach(
    'file', $photo
)->post('http://localhost:3000/chat/sendMedia?phone='.$sendTo.'&fromDevice='.$fromDevice.'&message='.$message.'&extension='.$extension.'&fileName='.$original_name, [
                'phone' => $phone,
                'fromDevice' => $fromDevice,
                'message' => $message,
            ]);
        // print_r($response);

        $body =$response->body();
        // print_r($body);
        $decode = json_decode($body);
        // print_r($decode);
        @$status = $decode->status;
        }
        else{

        $sendTo = $phone.'@s.whatsapp.net';
        // $sendTo = '6281215416084-1564231374@g.us';


              $response = Http::get('http://localhost:3000/chat/send', [
                'phone' => $sendTo,
                'fromDevice' => $fromDevice,
                'message' => $message,
            ]);
        // print_r($response);

        $body =$response->body();
        $decode = json_decode($body);
        // print_r($decode);
        $status = @$decode->status;


        }


        if ($status==401) {

            $device = Device::where(['phone'=>$fromDevice])->update(['status'=>'0']);

            # code...

            return [
                'success'=>false,
                'msg'=>'Sorry, Your Device is Unauthorized'
            ];

        }
        else{
            sendChat($userid);

            return [
                'success'=>true,
                'msg'=>'Message Sent'
            ];
        }


    }
      public function sendDocument(Request $request){

   // print_r($request->all());

        // exit();
        $device = $request->device;
        $userid = $request->user->id;
        $message = $request->message;
        $phone = $request->phone;
        $file = $request->file('file');

        // print_r($userid);
        // exit();


    $user = $request->user;
    $quota = $user->quota;
    // $count = ChatSend::where('userid',$user->id)->count();
    $quotaLeft =  $quota-ChatSend::where('userid',$user->id)->count();

    if ($quotaLeft==0) {
        # code...
      return [
                'success'=>false,
                'msg'=>'Sorry, your quota was exceeded'
            ];
            

    }


        $deviceData  = Device::where(['phone'=>$device,'userid'=>$userid]);

        if ($deviceData->count()==0) {
            # code...

            return [
                'success'=>false,
                'msg'=>'Device Not Found'
            ];
        }
        $fromDevice = $deviceData->first()->phone;






        if (!empty($file)) {
            # code...

        $original_name = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path('uploads'),$original_name);

        $photo = fopen(public_path('/uploads/') . $original_name, 'r');



        $response = Http::attach(
    'file', $photo
)->post('http://localhost:3000/chat/sendDocument?phone='.$phone.'@s.whatsapp.net&'.'&fromDevice='.$fromDevice.'&message='.$message.'&extension='.$extension, [
                'phone' => $phone,
                'fromDevice' => $fromDevice,
                'message' => $message,
            ]);
        // print_r($response);

        $body =$response->body();
        // print_r($body);
        $decode = json_decode($body);
        // print_r($decode);
        @$status = $decode->status;
        }
        else{

            


        }


        if ($status==401) {

            $device = Device::where(['phone'=>$fromDevice])->update(['status'=>'0']);

            # code...

            return [
                'success'=>false,
                'msg'=>'Sorry, Your Device is Unauthorized'
            ];

        }
        else{

            sendChat($userid);

            return [
                'success'=>true,
                'msg'=>'Message Sent'
            ];
        }




      }
}
