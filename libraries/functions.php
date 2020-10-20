<?php 
use Illuminate\Support\Facades\Http;

function user($id=null){

	if ($id==null) {
		$id = session('userid');
	}
	$user = App\User::find($id);

	return $user;

}

function getChats($chats){


    // print_r($chats);
        if (!empty($chats)) {
            # code...
            $results = [];
            foreach ($chats as $key => $chatData) {
                # code...

                // print_r($chatData->messages);
                $messages = end($chatData->messages);

                // print_r($chatData);
                $jid = explode('@', $chatData->jid);
                $results[] = [
                    'jid'=>$chatData->jid,
                    'id'=>$jid[0],
                    'name'=>@$chatData->name,
                    'avatarUrl'=>@$chatData->imgUrl,
                    'message'=>[
                        'conversation'=>@$messages->message->conversation,
                        'messageTimestamp'=>@$messages->messageTimestamp,
                        'status'=>@$messages->status,
                    ]
                ];
                
            }
            return $results;
        }
        else{
            return null;
        }
}

function sendChat($userid){

    $chatSend = new App\ChatSend;
    $chatSend->userid = $userid;
    $chatSend->chat = 'message';
    $chatSend->save();

}


function checkPhoneIsConnected($userid){
// 

    $device = App\Device::where('userid',$userid);

    if ($device->count()) {

        foreach ($device->get() as $d) {
            # code...

       $response = Http::get('http://localhost:3000/chat/isConnected?phone=6285156838407', [
                'phone' => $d->phone,
                // 'userid' => user()->id,
                // 'page' => 1,
            ]);

        $body =$response->body();
        // print_r($body);
        $decode = json_decode($body);

        // print_r($decode);

        if (!$decode->isConnected) {
            # code...
                App\Device::where('id',$d->id)->update(['status'=>'0']);
        }
        }
        # code...
    }
}


function sidebarActive($param){

    return (Request::segment(1)==$param ? 'active' : '');

}