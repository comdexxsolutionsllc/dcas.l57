<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{

    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \App\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        \App\Http\Middleware\TrustProxies::class,
        \Barryvdh\Cors\HandleCors::class,
        \Softonic\Laravel\Middleware\RequestId::class,
        \App\Http\Middleware\LogRequestsWithXRequestId::class,
        \App\Http\Middleware\RobotMiddleware::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,

            // \App\Http\Middleware\MustBeActive::class,

            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \Laravel\Passport\Http\Middleware\CreateFreshApiToken::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'api.version'    => \App\Http\Middleware\APIversion::class,
        'auth'           => \App\Http\Middleware\Authenticate::class,
        'auth.basic'     => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings'       => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'cache.headers'  => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can'            => \Illuminate\Auth\Middleware\Authorize::class,
        'customer'       => \App\Http\Middleware\Customer::class,
        'guest'          => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'internal'       => \App\Http\Middleware\Internal::class,
        'local'          => \App\Http\Middleware\Local::class,
        'permission'     => \Spatie\Permission\Middlewares\PermissionMiddleware::class,
        'role'           => \Spatie\Permission\Middlewares\RoleMiddleware::class,
        'scope'          => \Laravel\Passport\Http\Middleware\CheckForAnyScope::class,
        'scopes'         => \Laravel\Passport\Http\Middleware\CheckScopes::class,
        'secure.content' => \Stevenmaguire\Laravel\Http\Middleware\EnforceContentSecurity::class,
        'signed'         => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle'       => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'vendor'         => \App\Http\Middleware\Vendor::class,
        'verified'       => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'whitegloves'    => \App\Http\Middleware\WhiteGlove::class,

        'mailgun.webhook' => \App\Http\Middleware\ValidateMailgunWebhook::class,
    ];

    /**
     * The priority-sorted list of middleware.
     *
     * This forces the listed middleware to always be in the given order.
     *
     * @var array
     */
    protected $middlewarePriority = [
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\Authenticate::class,
        \Illuminate\Session\Middleware\AuthenticateSession::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
        \Illuminate\Auth\Middleware\Authorize::class,
    ];
}
