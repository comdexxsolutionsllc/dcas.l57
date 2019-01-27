<?php

namespace App\Http\Middleware;

use Closure;

class LogRequestsWithXRequestId
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
        $xReqId = $request->headers->get('x-request-id');
        $ipAddress = $request->ip();

        foreach ($request->all() as $type => $payload) {
            if (! is_array($payload)) {
                \Log::channel('x-request-id')->debug("[{$xReqId}] [{$ipAddress}]: {$type} => {$payload}");
            }
        }

        return $next($request);
    }
}
