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
        // dump(123);
        // $except = [
        //     '/login/update-info-third-party-first-login',
        //     '/login/get-district',
        //     '/login/get-ward',
        // ];
        // $response = $next($request);
        // if(\Request::getRequestUri() == '/login/update-info-third-party-first-login'){
        //     dd(312);
        //     return $response;
        // } 
        // //check login
        // if (Auth::guard($guard)->check()) {
        //     $user = Auth::user();
        //     $info_user = $user->infoUser;
        //     // dd($info_user, $user);
            
        //     if(empty($info_user)){
        //         $current_path = \Request::getRequestUri();
        //         // if(in_array($current_path, $except)){
        //         //     return $response;
        //         // }
        //         foreach($except as $ex){
        //             if(str_contains($current_path, $ex)){
        //                 return $response;
        //             }
        //         }
        //         // dd(route('login.update_info_user'));
        //         // dd( \Request(), \Request::getRequestUri());
        //         return \Redirect::to(route('login.update_info_user'));
        //     }
        // }
        $response = $next($request);
        return $response;
    }
    
    public function terminate($request, $response)
    {
        
    }
}
