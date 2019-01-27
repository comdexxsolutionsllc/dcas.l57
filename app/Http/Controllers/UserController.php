<?php

namespace App\Http\Controllers;

use App\Models\Roles\Customer as User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Stripe\Stripe;

/**
 * Class UserController
 *
 * @package App\Http\Controllers
 */
class UserController extends Controller
{

    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $users = User::with('stripe')->paginate(25);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        $stripes = Stripe::pluck('id', 'id')->all();

        return view('users.create', compact('stripes'));
    }

    /**
     * Store a new user in the storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            $data = $this->getData($request);

            User::create($data);

            return redirect()->route('users.user.index')->with('success_message', 'User was successfully added!');
        } catch (Exception $exception) {
            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Get the request's data from the request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    protected function getData(Request $request): array
    {
        $rules = [
            'name'     => 'required|string|min:1|max:255',
            'username' => 'required|string|min:1|max:255',
            'email'    => 'required|string|min:1|max:255',
            'password' => 'required|string|min:1|max:255',
        ];

        $data = $request->validate($rules);

        return $data;
    }

    /**
     * Display the specified user.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id): View
    {
        $user = User::with('stripe')->findOrFail($id);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id): View
    {
        $user = User::findOrFail($id);
        $stripes = Stripe::pluck('id', 'id')->all();

        return view('users.edit', compact('user', 'stripes'));
    }

    /**
     * Update the specified user in the storage.
     *
     * @param  int                     $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function update($id, Request $request): RedirectResponse
    {
        try {
            $data = $this->getData($request);

            $user = User::findOrFail($id);
            $user->update($data);

            return redirect()->route('users.user.index')->with('success_message', 'User was successfully updated!');
        } catch (Exception $exception) {
            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified user from the storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id): RedirectResponse
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return redirect()->route('users.user.index')->with('success_message', 'User was successfully deleted!');
        } catch (Exception $exception) {
            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
}
