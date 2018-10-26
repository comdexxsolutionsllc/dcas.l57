<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfAuthenticated
{

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     * @param string|null              $guard
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard) {
            case 'customer':
                if (\Auth::guard($guard)->check()) {
                    return redirect()->route('home.customer');
                }
                break;
            case 'employee':
                if (\Auth::guard($guard)->check()) {
                    return redirect()->route('home.employee');
                }
                break;
            case 'vendor':
                if (\Auth::guard($guard)->check()) {
                    return redirect()->route('home.vendor');
                }
                break;
            case 'whitegloves':
                if (\Auth::guard($guard)->check()) {
                    return redirect()->route('home.whitegloves');
                }
                break;
            default:
                break;
        }

        return $next($request);
    }
}
