<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;

/**
 * MustBeActive middleware.
 *
 * @todo
 */
class MustBeActive
{

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->isActive()) {
            $user = auth()->user();

            $user->update([
                'last_active' => Carbon::now(),
            ]);
        }

        if (auth()->check() && auth()->user()->isIdle()) {
            auth()->logout();
        }

        return $next($request);
    }
}
