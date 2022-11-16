<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AfterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {  
        $response = $next($request);
        // if(\Request::getRequestUri() == '/login/update-info-third-party-first-login'){

        // }
        //check login
        if (Auth::guard($guard)->check()) {
            $user = Auth::user();
            $info_user = $user->infoUser;
            // dd($info_user, $user);

            if(empty($info_user)){
                // dd( \Request(), \Request::getRequestUri());
                if(\Request::getRequestUri() == '/login/update-info-third-party-first-login'){
                    // dd(123);
                }

                return route('login.update_info_user');
            }
        }
        
        return $response;
    }
    
    public function terminate($request, $response)
    {
        
    }
}
