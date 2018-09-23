<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Roles\RoleCollection;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

/**
 * Class LoginController
 *
 * @package App\Http\Controllers\Auth
 */
class LoginController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * @var \App\Models\Roles\RoleCollection
     */
    protected $roles;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->setGuestMiddleware();

        $this->roles = new RoleCollection;
    }

    protected function setGuestMiddleware(): void
    {
        ($this->guard() === 'customer') ? $this->middleware('guest')->except('logout') : $this->middleware('guest:' . $this->role())->except('logout');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    public function guard()
    {
        return \Auth::guard($this->role());
    }

    /**
     * @return mixed
     */
    private function role()
    {
        preg_match("/(?:.login\/)(?'role'.*)/", url()->current(), $matches);

        $role = $matches['role'] ?? RoleCollection::default();

        return $role;
    }

    /**
     * Show the application's login form.
     *
     * @param null $role
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function showLoginForm($role = null)
    {
        $post_url = $this->posturl($role);

        return view('auth.login', compact('post_url'));
    }

    /**
     * @param $role
     *
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    private function postUrl($role)
    {
        return $this->roles->has($role) ? url("login/{$role}") : url('login');
    }

    /**
     * Where to redirect users after login.
     *
     * @return string
     */
    public function redirectTo(): string
    {
        switch ($role = $this->role()) {
            case 'customer':
                return route('home');
                break;
            case 'employee':
                return route('employee.home');
                break;
            case 'vendor':
                return route('vendor.home');
                break;
            case 'whitegloves':
                return route('whitegloves.home');
                break;
            default:
                break;
        }
    }
}
