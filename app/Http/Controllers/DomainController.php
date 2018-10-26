<?php

namespace App\Http\Controllers;

use App\Models\GENERATED\Account;
use App\Models\GENERATED\Domain;
use App\Models\GENERATED\Registrar;
use Exception;
use Illuminate\Http\Request;

class DomainController extends Controller
{

    /**
     * Display a listing of the domains.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $domains = Domain::with('account', 'registrar')->paginate(25);

        return view('domains.index', compact('domains'));
    }

    /**
     * Show the form for creating a new domain.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $accounts = Account::pluck('id', 'id')->all();
        $registrars = Registrar::pluck('name', 'id')->all();

        return view('domains.create', compact('accounts', 'registrars'));
    }

    /**
     * Store a new domain in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            Domain::create($data);

            return redirect()->route('domains.domain.index')->with('success_message', 'Domain was successfully added!');
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
            'account_id'           => 'required|numeric|min:0|max:4294967295',
            'registrar_id'         => 'required',
            'domain_name'          => 'required|string|min:1|max:255',
            'active'               => 'boolean',
            'monitor'              => 'boolean',
            'whois_record_updated' => 'nullable|date_format:j/n/Y g:i A',
            'whois_record_created' => 'nullable|date_format:j/n/Y g:i A',
            'whois_record_expiry'  => 'nullable|date_format:j/n/Y g:i A',

        ];

        $data = $request->validate($rules);

        $data['active'] = $request->has('active');
        $data['monitor'] = $request->has('monitor');

        return $data;
    }

    /**
     * Display the specified domain.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $domain = Domain::with('account', 'registrar')->findOrFail($id);

        return view('domains.show', compact('domain'));
    }

    /**
     * Show the form for editing the specified domain.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $domain = Domain::findOrFail($id);
        $accounts = Account::pluck('id', 'id')->all();
        $registrars = Registrar::pluck('name', 'id')->all();

        return view('domains.edit', compact('domain', 'accounts', 'registrars'));
    }

    /**
     * Update the specified domain in the storage.
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

            $domain = Domain::findOrFail($id);
            $domain->update($data);

            return redirect()->route('domains.domain.index')->with('success_message', 'Domain was successfully updated!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified domain from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $domain = Domain::findOrFail($id);
            $domain->delete();

            return redirect()->route('domains.domain.index')->with('success_message', 'Domain was successfully deleted!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
}
