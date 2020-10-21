<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendChatJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $phone;
    protected $fromDevice;
    protected $message;
    protected $userid;
    public function __construct($phone,$fromDevice,$message,$userid)
    {
        //
        $this->phone =$phone;
        $this->fromDevice =$fromDevice;
        $this->message =$message;
        $this->userid =$userid;
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
        $phone =$this->phone;
        $fromDevice =$this->fromDevice;
        $message =$this->message;
        $userid =$this->userid;




        $sendTo = $phone.'@s.whatsapp.net';
        // $sendTo = '6281215416084-1564231374@g.us';


              $response = \Http::get('http://localhost:3000/chat/send', [
                'phone' => $sendTo,
                'fromDevice' => $fromDevice,
                'message' => $message,
            ]);
        // print_r($response);

        $body =$response->body();
        $decode = json_decode($body);
        print_r($decode);
        $status = @$decode->status;

        // print_r($status);

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
