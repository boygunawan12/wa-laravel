<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Device; 
use App\Chat; 
use Illuminate\Support\Facades\Http;
use Str;
use App\User;






class ProfileController extends Controller
{
    public function profile(){
        // echo "string";

        $user = user();
        $userToken = $user->token;
        $userId = $user->id;

        if (empty($userToken)) {
        	$string = Str::random(10);
        	# code...
        	$user = User::find($userId);
        	$user->token = $string;
        	$user->save();
        }
        return view('profile');
    }
}
