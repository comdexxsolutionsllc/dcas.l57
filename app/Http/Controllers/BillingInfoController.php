<?php

namespace App\Http\Controllers;

use App\Models\General\BillingInfo;
use Exception;
use Illuminate\Http\Request;

class BillingInfoController extends Controller
{

    /**
     * Display a listing of the billing infos.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $billingInfo = BillingInfo::paginate(25);

        return view('billing_info.index', compact('billingInfo'));
    }

    /**
     * Show the form for creating a new billing info.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('billing_info.create');
    }

    /**
     * Store a new billing info in the storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try {
            $data = $this->getData($request);

            BillingInfo::create($data);

            return redirect()->route('billing_info.billing_info.index')->with('success_message', 'Billing Info was successfully added!');
        } catch (Exception $exception) {
            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Get the request's data from the request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    protected function getData(Request $request)
    {
        $rules = [
            'first_name'   => 'required|string|min:1|max:255',
            'last_name'    => 'required|string|min:1|max:255',
            'company'      => 'nullable|string|min:0|max:255',
            'address_1'    => 'required|string|min:1|max:255',
            'address_2'    => 'nullable|string|min:0|max:255',
            'city'         => 'required|string|min:1|max:255',
            'state'        => 'required|string|min:1|max:255',
            'postal_code'  => 'required|string|min:1|max:255',
            'country'      => 'required|numeric|string|min:1|max:255',
            'phone_number' => 'required|numeric|string|min:1|max:255',
            'phone_type'   => 'required',

        ];

        $data = $request->validate($rules);

        return $data;
    }

    /**
     * Display the specified billing info.
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $billingInfo = BillingInfo::findOrFail($id);

        return view('billing_info.show', compact('billingInfo'));
    }

    /**
     * Show the form for editing the specified billing info.
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $billingInfo = BillingInfo::findOrFail($id);

        return view('billing_info.edit', compact('billingInfo'));
    }

    /**
     * Update the specified billing info in the storage.
     *
     * @param                          $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, Request $request)
    {
        try {
            $data = $this->getData($request);

            $billingInfo = BillingInfo::findOrFail($id);
            $billingInfo->update($data);

            return redirect()->route('billing_info.billing_info.index')->with('success_message', 'Billing Info was successfully updated!');
        } catch (Exception $exception) {
            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified billing info from the storage.
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $billingInfo = BillingInfo::findOrFail($id);
            $billingInfo->delete();

            return redirect()->route('billing_info.billing_info.index')->with('success_message', 'Billing Info was successfully deleted!');
        } catch (Exception $exception) {
            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
}
