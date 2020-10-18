<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Device; 
use App\Chat; 
use Illuminate\Support\Facades\Http;







class ProfileController extends Controller
{
    public function profile(){
        // echo "string";
        return view('profile');
    }
}
