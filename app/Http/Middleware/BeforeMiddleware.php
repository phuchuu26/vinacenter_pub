<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

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
        if ( $trustedHost = config('app.url') ) {
            $this->trustedHosts[] = parse_url($trustedHost, PHP_URL_HOST);
        }

        if ( $trustedHost = config('app.ftel_inside_fpay_url') ) {
            $this->trustedHosts[] = parse_url($trustedHost, PHP_URL_HOST);
        }
        
        if (!in_array($request->getHost(), $this->trustedHosts)) {
            \Log::info('Trust host invalid', ['current' => $request->getHost(), 'trusted' => $this->trustedHosts]);
            abort(400);
        }
        
        return $next($request);
    }
}
