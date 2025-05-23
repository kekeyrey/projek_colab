<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        \App\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        \App\Http\Middleware\TrustProxies::class,
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
       'auth' => \App\Http\Middleware\Authenticate::class,
       'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
       'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
       'can' => \Illuminate\Auth\Middleware\Authorize::class,
       'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
       'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
       'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
       'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
       'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
       'scopes' => \Laravel\Passport\Http\Middleware\CheckScopes::class,
       'scope' => \Laravel\Passport\Http\Middleware\CheckForAnyScope::class,
       'admin' => \App\Http\Middleware\AdminMiddleware::class,
       'user' => \App\Http\Middleware\UserMiddleware::class,
   ];
}