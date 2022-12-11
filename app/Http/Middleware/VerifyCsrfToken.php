<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        'forgot-password',
        '/login/update-info-third-party-first-login',
        '/get-total-cart',
        '/cap-nhat-voucher/*'
    ];
}
