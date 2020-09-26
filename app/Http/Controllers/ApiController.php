<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Device; 
use App\Chat; 
use Illuminate\Support\Facades\Http;







class ApiController extends Controller
{
    public function sendMessage(Request $request){
        $deviceId = $request->deviceId;
        $message = $request->message;
        $phone = $request->phone;
        $device  = Device::where('id',$deviceId);

        if ($device->count()==0) {
            # code...

            return [
                'success'=>false,
                'msg'=>'Device Not Found'
            ];
        }
        $fromDevice = $device->first()->phone;

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
            return [
                'success'=>true,
                'msg'=>'Message Sent'
            ];
        }


    }
      public function sendMedia(Request $request){
        $deviceId = $request->deviceId;
        $message = $request->message;
        $phone = $request->phone;
        $file = $request->file('file');

        // print_r($file);
        // exit();
        $device  = Device::where('id',$deviceId);

        if ($device->count()==0) {
            # code...

            return [
                'success'=>false,
                'msg'=>'Device Not Found'
            ];
        }
        $fromDevice = $device->first()->phone;

        $original_name = $file->getClientOriginalName();

        $file->move(public_path('uploads'),$original_name);

        $photo = fopen(public_path('/uploads/') . $original_name, 'r');


        $response = Http::attach(
    'file', $photo
)->post('http://localhost:3000/chat/sendMedia?phone='.$phone.'&fromDevice='.$fromDevice.'&message='.$message.'" ', [
                'phone' => $phone,
                'fromDevice' => $fromDevice,
                'message' => $message,
            ]);
        // print_r($response);

        $body =$response->body();
        print_r($body);
        $decode = json_decode($body);
        // print_r($decode);
        @$status = $decode->status;


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


    }
}
