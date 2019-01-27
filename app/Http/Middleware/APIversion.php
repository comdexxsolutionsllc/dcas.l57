<?php

namespace App\Http\Middleware;

use Closure;

class APIversion
{

    /**
     * Handle an incoming request.
     *
     * @param          $request
     * @param \Closure $next
     * @param          $guard
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $guard)
    {
        config(['app.api_version' => $guard]);

        return $next($request);
    }
}
