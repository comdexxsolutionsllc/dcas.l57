<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\GENERATED\NameserverDomainmetadata;
use Exception;
use Illuminate\Http\Request;

class NameserverDomainmetadataController extends Controller
{

    /**
     * Display a listing of the nameserver domainmetadatas.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $nameserverDomainmetadatas = NameserverDomainmetadata::with('domain')->paginate(25);

        return view('nameserver_domainmetadatas.index', compact('nameserverDomainmetadatas'));
    }

    /**
     * Show the form for creating a new nameserver domainmetadata.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $domains = Domain::pluck('id', 'id')->all();

        return view('nameserver_domainmetadatas.create', compact('domains'));
    }

    /**
     * Store a new nameserver domainmetadata in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            NameserverDomainmetadata::create($data);

            return redirect()->route('nameserver_domainmetadatas.nameserver_domainmetadata.index')->with('success_message', 'Nameserver Domainmetadata was successfully added!');
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
            'domain_id' => 'required',
            'kind'      => 'nullable|string|min:0|max:255',
            'content'   => 'nullable',

        ];

        $data = $request->validate($rules);

        return $data;
    }

    /**
     * Display the specified nameserver domainmetadata.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $nameserverDomainmetadata = NameserverDomainmetadata::with('domain')->findOrFail($id);

        return view('nameserver_domainmetadatas.show', compact('nameserverDomainmetadata'));
    }

    /**
     * Show the form for editing the specified nameserver domainmetadata.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $nameserverDomainmetadata = NameserverDomainmetadata::findOrFail($id);
        $domains = Domain::pluck('id', 'id')->all();

        return view('nameserver_domainmetadatas.edit', compact('nameserverDomainmetadata', 'domains'));
    }

    /**
     * Update the specified nameserver domainmetadata in the storage.
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

            $nameserverDomainmetadata = NameserverDomainmetadata::findOrFail($id);
            $nameserverDomainmetadata->update($data);

            return redirect()->route('nameserver_domainmetadatas.nameserver_domainmetadata.index')->with('success_message', 'Nameserver Domainmetadata was successfully updated!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified nameserver domainmetadata from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $nameserverDomainmetadata = NameserverDomainmetadata::findOrFail($id);
            $nameserverDomainmetadata->delete();

            return redirect()->route('nameserver_domainmetadatas.nameserver_domainmetadata.index')->with('success_message', 'Nameserver Domainmetadata was successfully deleted!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
}
