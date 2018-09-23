<?php

if (! function_exists('get_guard')) {
    /**
     * @return mixed
     */
    function get_guard()
    {
        foreach ($guards = (new \App\Models\Roles\RoleCollection)->values() as $guard) {
            if (\Auth::guard($guard)->check()) {
                return $guard;
            }
        }
    }
}

if (! function_exists('get_middleware')) {
    /**
     * @return string
     */
    function get_middleware()
    {
        return 'auth:' . get_guard();
    }
}
