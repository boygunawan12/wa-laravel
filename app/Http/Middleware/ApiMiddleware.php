<?php

namespace App\Http\Middleware;

use Closure;

use App\User;

class ApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard=null)
    {
        $token = $request->header('x-token-access');

        $user = User::where('token',$token);

        $request->merge(['user' => $user->first() ]);

        // print_r($request->user);
        // $request->auth = "xx";
        // echo "string";
        if ($user->count()==0) {
            # code...
            $response= [
                'success'=>false,
                'message'=>'User Not Authenticated'
            ];

            return response()
            ->json($response,401);


        }


        return $next($request);
    }
}
