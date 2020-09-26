<?php

namespace App\Http\Middleware;

use Closure;
use Response;

class AuthUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // echo "string";
        // print_r($request->all());
        // echo "string";
        // print_r($request->session()->all());
        // exit();

        if ($request->segment(1) == 'login'||$request->segment(1) == 'register' || $request->segment(1)=='forgot-password') {
            if (!empty(session('userid'))) {
                 if (!empty($request->redirect)) {
    # code...
                  
              return redirect($request->redirect);
              }
              else{
                  return redirect('/');

              }
    


            }
            return $next($request);
              
            
        } else {
            // print_r(session('userid'));
            if (empty(session('userid'))) {

                if ($request->ajax()) {
                  # code...
                return Response::json([
    'status' => 'unauthorized'
], 401);
                }


                return redirect('/login?redirect='.urlencode(url()->current()));
            } 
            
                // if (user()) {
                //     # code...
                // }
            // echo user()->poli;
            // return 'ok';

           
                return $next($request);    
            
            
        }
    }
}
