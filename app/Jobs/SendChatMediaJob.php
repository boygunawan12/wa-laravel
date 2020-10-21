<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Http;
class SendChatMediaJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $request;
    protected $file;

    public function __construct($request,$file)
    {
        //
        $this->request =$request;
        $this->file =$file;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //

     // echo "string";
        $device = $request->from;
        $userid = $request->user->id;
        $message = $request->message;
        $phone = $request->to;
        // $file = $request->file('file');
        $file = $this->file;


        // print_r($file);
        // exit();


        $sendTo = $phone.'@s.whatsapp.net';
        // $sendTo = '6281215416084-1564231374@g.us';

        // print_r($sendTo);
        // exit();

     

        $response = Http::attach(
    'file', $file
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



        print_r($decode);

        print_r($status);

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



        // exit();


        // return $status;
    }
}
