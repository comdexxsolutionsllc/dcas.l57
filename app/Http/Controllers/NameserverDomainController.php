<?php

namespace App\Http\Controllers;

use App\Models\GENERATED\NameserverDomain;
use Exception;
use Illuminate\Http\Request;

class NameserverDomainController extends Controller
{

    /**
     * Display a listing of the nameserver domains.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $nameserverDomains = NameserverDomain::paginate(25);

        return view('nameserver_domains.index', compact('nameserverDomains'));
    }

    /**
     * Show the form for creating a new nameserver domain.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('nameserver_domains.create');
    }

    /**
     * Store a new nameserver domain in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            NameserverDomain::create($data);

            return redirect()->route('nameserver_domains.nameserver_domain.index')->with('success_message', 'Nameserver Domain was successfully added!');
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
            'name'            => 'required|string|min:1|max:255',
            'master'          => 'nullable|string|min:0|max:255',
            'last_check'      => 'nullable|numeric|min:-2147483648|max:2147483647',
            'type'            => 'required|string|min:1|max:255',
            'notified_serial' => 'nullable|numeric|min:-2147483648|max:2147483647',
            'account'         => 'nullable|numeric|string|min:0|max:255',

        ];

        $data = $request->validate($rules);

        return $data;
    }

    /**
     * Display the specified nameserver domain.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $nameserverDomain = NameserverDomain::findOrFail($id);

        return view('nameserver_domains.show', compact('nameserverDomain'));
    }

    /**
     * Show the form for editing the specified nameserver domain.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $nameserverDomain = NameserverDomain::findOrFail($id);

        return view('nameserver_domains.edit', compact('nameserverDomain'));
    }

    /**
     * Update the specified nameserver domain in the storage.
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

            $nameserverDomain = NameserverDomain::findOrFail($id);
            $nameserverDomain->update($data);

            return redirect()->route('nameserver_domains.nameserver_domain.index')->with('success_message', 'Nameserver Domain was successfully updated!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified nameserver domain from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $nameserverDomain = NameserverDomain::findOrFail($id);
            $nameserverDomain->delete();

            return redirect()->route('nameserver_domains.nameserver_domain.index')->with('success_message', 'Nameserver Domain was successfully deleted!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
}
