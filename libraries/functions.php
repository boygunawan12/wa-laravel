<?php 

function user($id=null){

	if ($id==null) {
		$id = session('userid');
	}
	$user = App\User::find($id);

	return $user;

}

function getChats($chats){

        if (!empty($chats)) {
            # code...
            $results = [];
            foreach ($chats as $key => $chatData) {
                # code...

                // print_r($chatData->messages);
                $messages = end($chatData->messages);

                // print_r($chatData);
                $results[] = [
                    'jid'=>$chatData->jid,
                    'name'=>@$chatData->name,
                    'avatarUrl'=>@$chatData->imgUrl,
                    'message'=>[
                        'conversation'=>@$messages->message->conversation,
                        'messageTimestamp'=>@$messages->messageTimestamp
                    ]
                ];
                
            }
            return $results;
        }
        else{
            return null;
        }
}