<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use  App\Http\Controllers\Admin\LoginThirdPartyController;
use App\Providers\Validator;

class BeforeMiddleware
{
    
    private $trustedHosts = [];
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
        $except = [
            '/login/update-info-third-party-first-login',
            '/login/get-district',
            '/login/get-ward',
        ];
        $response = $next($request);
        // if(\Request::getRequestUri() == '/login/update-info-third-party-first-login'){
        //     dd(312);
        //     return $response;
        // } 
        //check login
        if (Auth::guard($guard)->check()) {
            $user = Auth::user();
            $info_user = $user->infoUser;
            
            if(empty($info_user)){
                $current_path = \Request::getRequestUri();
                // if(in_array($current_path, $except)){
                //     return $response;
                // }
                foreach($except as $ex){
                    if(str_contains($current_path, $ex)){
                        return $next($request);
                    }
                }
                
                $a = new LoginThirdPartyController();
                return $a->editInfoUser();
            }
        }
        
        return $response;
    }
}
