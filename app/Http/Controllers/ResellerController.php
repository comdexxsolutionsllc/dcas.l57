<?php

namespace App\Http\Controllers;

use App\Models\GENERATED\Account;
use App\Models\GENERATED\Company;
use App\Models\GENERATED\Reseller;
use App\Models\GENERATED\Salesrep;
use Exception;
use Illuminate\Http\Request;

class ResellerController extends Controller
{

    /**
     * Display a listing of the resellers.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $resellers = Reseller::with('account', 'company', 'salesrep')->paginate(25);

        return view('resellers.index', compact('resellers'));
    }

    /**
     * Show the form for creating a new reseller.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $accounts = Account::pluck('id', 'id')->all();
        $companies = Company::pluck('name', 'id')->all();
        $salesreps = Salesrep::pluck('id', 'id')->all();

        return view('resellers.create', compact('accounts', 'companies', 'salesreps'));
    }

    /**
     * Store a new reseller in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            Reseller::create($data);

            return redirect()->route('resellers.reseller.index')->with('success_message', 'Reseller was successfully added!');
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
            'account_id'  => 'required|numeric|min:0',
            'company_id'  => 'required',
            'expiry_date' => 'nullable|date_format:j/n/Y',
            'salesrep_id' => 'required',

        ];

        $data = $request->validate($rules);

        return $data;
    }

    /**
     * Display the specified reseller.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $reseller = Reseller::with('account', 'company', 'salesrep')->findOrFail($id);

        return view('resellers.show', compact('reseller'));
    }

    /**
     * Show the form for editing the specified reseller.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $reseller = Reseller::findOrFail($id);
        $accounts = Account::pluck('id', 'id')->all();
        $companies = Company::pluck('name', 'id')->all();
        $salesreps = Salesrep::pluck('id', 'id')->all();

        return view('resellers.edit', compact('reseller', 'accounts', 'companies', 'salesreps'));
    }

    /**
     * Update the specified reseller in the storage.
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

            $reseller = Reseller::findOrFail($id);
            $reseller->update($data);

            return redirect()->route('resellers.reseller.index')->with('success_message', 'Reseller was successfully updated!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified reseller from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $reseller = Reseller::findOrFail($id);
            $reseller->delete();

            return redirect()->route('resellers.reseller.index')->with('success_message', 'Reseller was successfully deleted!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
}
