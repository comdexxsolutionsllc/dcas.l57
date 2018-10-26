<?php

namespace App\Http\Controllers;

use App\Models\GENERATED\Account;
use App\Models\GENERATED\Stripe;
use App\Models\GENERATED\Vendor;
use Exception;
use Illuminate\Http\Request;

class VendorController extends Controller
{

    /**
     * Display a listing of the vendors.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $vendors = Vendor::with('account', 'stripe')->paginate(25);

        return view('vendors.index', compact('vendors'));
    }

    /**
     * Show the form for creating a new vendor.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $accounts = Account::pluck('id', 'id')->all();
        $stripes = Stripe::pluck('id', 'id')->all();

        return view('vendors.create', compact('accounts', 'stripes'));
    }

    /**
     * Store a new vendor in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            Vendor::create($data);

            return redirect()->route('vendors.vendor.index')->with('success_message', 'Vendor was successfully added!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request
     *
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
            'account_id'        => 'required|numeric|min:0',
            'name'              => 'required|string|min:1|max:255',
            'username'          => 'required|string|min:1|max:255',
            'email'             => 'required|string|min:1|max:255',
            'email_verified_at' => 'nullable|date_format:j/n/Y g:i A',
            'password'          => 'required|string|min:1|max:255',
            'stripe_id'         => 'nullable',
            'card_brand'        => 'nullable|string|min:0|max:255',
            'card_last_four'    => 'nullable|string|min:0|max:255',
            'trial_ends_at'     => 'nullable|date_format:j/n/Y g:i A',
            'cover'             => 'nullable|string|min:0|max:255',
            'avatar'            => 'nullable|file|string|min:0|max:255',
            'remember_token'    => 'nullable|string|min:0|max:100',

        ];

        $data = $request->validate($rules);

        return $data;
    }

    /**
     * Display the specified vendor.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $vendor = Vendor::with('account', 'stripe')->findOrFail($id);

        return view('vendors.show', compact('vendor'));
    }

    /**
     * Show the form for editing the specified vendor.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $vendor = Vendor::findOrFail($id);
        $accounts = Account::pluck('id', 'id')->all();
        $stripes = Stripe::pluck('id', 'id')->all();

        return view('vendors.edit', compact('vendor', 'accounts', 'stripes'));
    }

    /**
     * Update the specified vendor in the storage.
     *
     * @param  int                    $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {

            $data = $this->getData($request);

            $vendor = Vendor::findOrFail($id);
            $vendor->update($data);

            return redirect()->route('vendors.vendor.index')->with('success_message', 'Vendor was successfully updated!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified vendor from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $vendor = Vendor::findOrFail($id);
            $vendor->delete();

            return redirect()->route('vendors.vendor.index')->with('success_message', 'Vendor was successfully deleted!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
}
