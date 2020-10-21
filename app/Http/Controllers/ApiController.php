<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Device; 
use App\Chat; 
use App\ChatSend;
use Illuminate\Support\Facades\Http;

use App\Jobs\SendChatJob;






class ApiController extends Controller
{
    public function sendMessage(Request $request){
        $deviceId = $request->from;
        $message = $request->message;
        $userid = $request->user->id;

        $phone = $request->to.'@s.whatsapp.net';
      

// exit();

$input_data = $request->all();

$validator = \Validator::make(
$input_data, 

[
// "file" => 'image|required',
'message'=>'required',
'from'=>'required',
'to'=>'required'

]
);

if ($validator->fails()) {
    $messages = $validator->messages();


    return [
        'success'=>false,
        'msg'=>$messages
    ];
}

        $deviceData  = Device::where(['phone'=>$deviceId,'userid'=>$userid]);

        if ($deviceData->count()==0) {
            # code...

            return [
                'success'=>false,
                'msg'=>'Device Not Found'
            ];
        }


    $fromDevice = $deviceData->first()->phone;


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
        $device = $request->from;
        $userid = $request->user->id;
        $message = $request->message;
        $phone = $request->to;
        $file = $request->file('file');




$input_data = $request->all();


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


$validator = \Validator::make(
$input_data, 

[
"file" => 'image|required',
'message'=>'required',
'from'=>'required',
'to'=>'required'

]
);

if ($validator->fails()) {
    $messages = $validator->messages();


    return [
        'success'=>false,
        'msg'=>$messages
    ];
}


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


$validator = \Validator::make(
$input_data, 

[
// "file" => 'image|required',
'message'=>'required',
'from'=>'required',
'to'=>'required'

]
);

if ($validator->fails()) {
    $messages = $validator->messages();


    return [
        'success'=>false,
        'msg'=>$messages
    ];
}



        $job = (new SendChatJob($phone,$fromDevice,$message,$user->id));
        dispatch($job);
        // echo "send mail with queues";




        return [
            'success'=>true,
            'msg'=>'Success, messages are queued'
        ];

        }

// echo "string";

       


    }
      public function sendDocument(Request $request){

   // print_r($request->all());

        // exit();
        $device = $request->from;
        $userid = $request->user->id;
        $message = $request->message;
        $phone = $request->to;
        $file = $request->file('file');

        // print_r($userid);
        // exit();




$input_data = $request->all();

$validator = \Validator::make(
$input_data, 

[
"file" => 'required',
'message'=>'required',
'from'=>'required',
'to'=>'required'

]
);

if ($validator->fails()) {
    $messages = $validator->messages();


    return [
        'success'=>false,
        'msg'=>$messages
    ];
}


if ($validator->fails()) {
    $messages = $validator->messages();


    return [
        'success'=>false,
        'msg'=>$messages
    ];
}




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
)->post('http://localhost:3000/chat/sendDocument?phone='.$phone.'@s.whatsapp.net&'.'&fromDevice='.$fromDevice.'&message='.$message.'&extension='.$extension.'&fileName='.$original_name, [
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
