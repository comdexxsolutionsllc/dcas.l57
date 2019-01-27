<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Roles\RoleCollection;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
     */
    public function __construct()
    {
        $this->setGuestMiddleware();

        $this->roles = new RoleCollection;
    }

    /**
     * Set Guest Middleware.
     */
    protected function setGuestMiddleware(): void
    {
        ($this->guard() === 'customer') ? $this->middleware('guest')->except('logout') : $this->middleware('guest:' . $this->role())->except('logout');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    public function guard(): StatefulGuard
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

        // cache()->put('guard', $role);

        return $role;
    }

    /**
     * Log the user out of the application.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     *
     * @throws \Exception
     */
    public function logout(Request $request): RedirectResponse
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect(cache()->get('redirect_back')) ?? redirect('/login');
    }

    /**
     * Show the application's login form.
     *
     * @param null $role
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * @throws \Exception
     */
    public function showLoginForm($role = null): View
    {
        cache()->put('redirect_back', url()->current(), 60);

        $postUrl = $this->posturl($role);

        return view('auth.login', compact('postUrl'));
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
        switch ($this->role()) {
            case 'customer':
                return route('home.customer');
                break;
            case 'employee':
                return route('home.employee');
                break;
            case 'vendor':
                return route('home.vendor');
                break;
            case 'whitegloves':
                return route('home.whitegloves');
                break;
            default:
                break;
        }
    }
}
