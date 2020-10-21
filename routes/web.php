<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/chat/send-on-message', 'ChatController@onMessage');

Route::post('chat/incomingMessage', 'ChatController@incomingMessage');

Route::group(['prefix' => '/','middleware'=>['authUser']], function($d) {

Route::get('/', function() {
    //
    return view('home');
});

   Route::get('register','AuthController@register');
    Route::post('register','AuthController@register');

    Route::get('login','AuthController@login');
    Route::post('login','AuthController@loginPost');
    
    Route::get('logout','AuthController@logout');





Route::get("/device/list","DeviceController@list")->name("device.list");
Route::get("/device/json","DeviceController@json")->name("device.json");

Route::resource("/device","DeviceController");

Route::get("/users/json","UserController@json")->name("users.json");
Route::resource("/users","UserController");


Route::get("/affiliates/json","AffiliateController@json")->name("affiliates.json");
Route::resource("/affiliates","AffiliateController");


Route::get('test-broadcast', function(){
    broadcast(new \App\Events\SendQr("x"));
});





Route::get("/chat","ChatController@index");
Route::get("/profile","ProfileController@profile");

Route::get("/chat-list","ChatController@list");
Route::post("/chat/list","ChatController@listJson");
Route::post("/chat/send","ChatController@send");

});
Route::post('device/send-qr', 'DeviceController@sendQr');

Route::get("/device/getQr","DeviceController@getQr")->name("device.getQr");
Route::get("/device/{id}/pair","DeviceController@pair")->name("device.pair");

Route::post('device/send-state-open', 'DeviceController@connect');
Route::get('/user/verify/{token}', 'AuthController@verifyUser');

Route::get('billing', function() {
    //
    return view('billing');
});

// chat/send-on-message
Route::group(['prefix' => 'api','middleware'=>'ApiMiddleware'], function() {
    //
    Route::post('chat/send', 'ApiController@sendMessage');
    Route::post('chat/sendMedia', 'ApiController@sendMedia');
    Route::post('chat/sendDocument', 'ApiController@sendDocument');

});



Route::get('email', 'SendMailController@sendEmail');
Route::get('c', 'SendMailController@sendEmailQueues');


