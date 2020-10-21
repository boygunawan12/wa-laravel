<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;	
use App\Mail\SendMail;
use App\Jobs\SendMailJob;

class SendMailController extends Controller
{
    //
     public function sendEmail()
 {
        Mail::to('fwidhiarta@gmail.com')
           ->send(new SendMail());
        echo "send mail";
 }

 public function sendEmailQueues()
 {
        $emailJob = (new SendMailJob());
        dispatch($emailJob);
        echo "send mail with queues";
 }


}
