<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use iamcal\SQLParser;
use Socialite;
use App\User;
use PragmaRX\Countries\Package\Countries;
use DB;
use Hash;
use App\VerifyUser;
use App\Mail\VerifyMail;
use App\ForgotPassword as ForgotPasswordModel;

use Webpatser\Uuid\Uuid;
use App\Mail\ForgotPassword;
use App\Setting;


class AuthController extends Controller
{

	public function register(Request $request){
		if ($request->isMethod("POST")) {
			# code...


    $validatedData = $request->validate([
"firstname" => "required" ,
// "country"=>"required",
"email"=>"required|email",
"password"=>"required|confirmed|min:6"

]);

	$firstname = $request->firstname;
	$lastname = $request->lastname;
	$country = $request->country;
	$email = $request->email;
	$password = $request->password;

	$userEmail = User::where('email',$email);

	if ($userEmail->count()==0) {

		$Setting = Setting::find(1);
		$quota= $Setting->quota;
		# code...

		$user = new User;
		$user->email = $email;
		$user->name = $firstname;
		$user->last_name = $lastname;
		// $user->id_country = $country;
		$user->password = bcrypt($password);
		$user->quota = $quota;
		$user->is_active = 1;
		$user->save();


  $verifyUser = VerifyUser::create([
    'userid' => $user->id,
    'token' => sha1(time())
  ]);

  // print_r($user->)
  \Mail::to($email)->send(new VerifyMail($user));





		if ($user->save()) {
		// $request->session()->put('userid', $user->id);
		return [
			'success'=>true,
			'msg'=>'Successfully registered, Please check your email/spam inbox to verify your account'
		];

		}
	}
	else{
		return [
			'success'=>false,
			'msg'=>'Sorry, this email has already been used'
		];
	}




		}
		else{
			return view('auth/register');
		}
	}
	public function login(Request $request){

    // var_dump( env('APP_LAUNCH'));

		// if (empty($request->secure)) {
		// 	# code...
		// if (!env('APP_LAUNCH')) {
		// 	# code...
		// 	return redirect('https://sqltocrud.com');
		// }
		// }
		
// echo "x";
		return view('auth/login');
	}
	public function loginPost(Request $request){

    $validatedData = $request->validate([
			"email" => "required|email" ,
			"password"=>"required"
		]);



		$email = $request->email;
		$password = $request->password;



		$user = User::where('email',$email);


		if ($user->count()) {
			# code...
			$userdb = $user->first();
			$passdb = $userdb->password;

			if (Hash::check($password, $passdb)) {
				# code...

				if (!$userdb->verified) {
					# code...

			return [
						'success'=>false,
						'msg'=>'Your account has not been verified, please check your email for account activation'
				];
				}


				if (!$userdb->is_active) {
					# code...
					return [
						'success'=>false,
						'msg'=>'Your account is disabled'
				];
				

				}
			$request->session()->put('userid', $userdb->id);
				
	return [
			'success'=>true,
			'msg'=>'Login Accepted,You will be redirected a few seconds'
		];

			}
			else{

		return [
			'success'=>false,
			'msg'=>'Invalid Password'
		];
			}
		}
		else{

		return [
			'success'=>false,
			'msg'=>'Invalid Login'
		];
		}
	}
	public function getCountries(Request $request){

        if ($request->has('q')) {
            $cari = $request->q;
            // echo $cari;
            $data = DB::table('countries')->select('id', 'name')->where('name', 'LIKE', "%$cari%")->get();

            return response()->json($data);
        }
        else{

            $data = DB::table('countries')->select('id', 'name')->limit(200)->get();

            return response()->json($data);
        }




	}
	public function oauth($driver){

		    return Socialite::driver($driver)->redirect();


	}

	public function redirect($driver,Request $request){
		// echo $driver;
		// exit();
		// try {
			    $user = Socialite::driver($driver)->user();

			    // print_r($user);
			  $userd = User::where('email',$user->getEmail())->where('driver',$driver);

			  if ($userd->count()) {
			  	# code...
			  	$datauser = $userd->first();
			  	$userdata = User::find($datauser->id);
			  	$userdata->email = $user->getEmail();
			  	$userdata->sid = $user->getId();
			  	$userdata->name = $user->getName();
			  	$userdata->photo = $user->getAvatar();
			  	$userdata->email = $user->getEmail();
			  	$userdata->driver = $driver;
			  	$userdata->email_verified_at = now();
			  	$userdata->save();

			  }
			  else{
				$userdata =   new User;
			  	$userdata->email = $user->getEmail();
			  	$userdata->name = $user->getName();
			  	$userdata->sid = $user->getId();

			  	$userdata->photo = $user->getAvatar();
			  	$userdata->driver = $driver;

			  	$userdata->email = $user->getEmail();
			  	$userdata->email_verified_at = now();
			  	$userdata->save();
			  }
			  // echo "string";

        // $create = User::firstOrCreate([
        //     'email' => $user->getEmail()
        // ], [
        //     'name' => $driver,
        //     'sid' => $user->getId(),
        //     'name' => $user->getName(),
        //     'photo' => $user->getAvatar(),
        //     'email_verified_at' => now(),
        //     'driver' => $driver,
        // ]);


			  $request->session()->put('userid', $userdata->id);

			  return redirect('/');

		// } catch (\Exception $e) {
		// 	// print_r($e);
		// }
	}

	public function logout(Request $request){

		$request->session()->flush();
		return redirect('/login');
	}

	public function verifyUser($token){
		$verifyUser = VerifyUser::where('token', $token)->first();
  if(isset($verifyUser) ){
    $user = $verifyUser->user;
    if(!$user->verified) {
      $verifyUser->user->verified = 1;
      $verifyUser->user->save();
      $status = "Your e-mail is verified. You can now login.";
    } else {
      $status = "Your e-mail is already verified. You can now login.";
    }
  } else {
    return redirect('/login')->with('warning', "Sorry your email cannot be identified.");
  }
  return redirect('/login')->with('status', $status);


	}

	public function forgot(Request $request){
			$uid = $request->uid;

		if ($request->isMethod("GET")) {
			# code...
			if (empty($uid)) {
				# code...
				return view('auth/forgot');
			}
			else{
				$ForgotPassword = ForgotPasswordModel::where('token',$uid);
				if ($ForgotPassword->count()) {
					# code...
					$request->session()->put('iduser', $ForgotPassword->first()->userid);
					return view('auth/forgot-confirm');
				}
				else{

				    return redirect('/forgot-password')->with('warning', "Token Is Missing");

				}
			}
		}
		elseif ($request->isMethod("POST")) {
			# code...

			if (!empty($uid)) {
				# code...

			 $validatedData = $request->validate([

			"password"=>"required|confirmed|min:6"
			

			]);


			$user = User::find(session('iduser'));
			$user->password = bcrypt($request->password);
			if ($user->save()) {
				# code...

			return [
				'success'=>true,
				'msg'=>'The password has been successfully changed and you will be directed to the login page'
			];

			}

			return [
				'success'=>false,
				'msg'=>'Error,'
			];






			}
			$email = $request->email;
			$user = User::where('email',$email);

			 $validatedData = $request->validate([

"email"=>"required|email",

]);



			if ($user->count()) {
					
					$userData = $user->first();
				$token = (string) Uuid::generate();

  $verifyUser = ForgotPasswordModel::create([
    'userid' => $userData->id,
    'token' => $token
  ]);

  \Mail::to($userData->email)->send(new ForgotPassword($userData));






			return [
				'success'=>true,
				'msg'=>'We have sent a verification link to the email, please check the email'
			];
			}
			return [
				'success'=>false,
				'msg'=>'user not found'
			];
		}
	}
}