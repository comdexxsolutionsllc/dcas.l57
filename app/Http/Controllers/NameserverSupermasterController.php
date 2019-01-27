<?php

namespace App\Http\Controllers;

use App\Models\GENERATED\NameserverSupermaster;
use Exception;
use Illuminate\Http\Request;

class NameserverSupermasterController extends Controller
{

    /**
     * Display a listing of the nameserver supermasters.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $nameserverSupermasters = NameserverSupermaster::paginate(25);

        return view('nameserver_supermasters.index', compact('nameserverSupermasters'));
    }

    /**
     * Show the form for creating a new nameserver supermaster.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('nameserver_supermasters.create');
    }

    /**
     * Store a new nameserver supermaster in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            NameserverSupermaster::create($data);

            return redirect()->route('nameserver_supermasters.nameserver_supermaster.index')->with('success_message', 'Nameserver Supermaster was successfully added!');
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
            'ip'         => 'required|string|min:1|max:45',
            'nameserver' => 'required|string|min:1|max:255',
            'account'    => 'required|numeric|string|min:1|max:255',

        ];

        $data = $request->validate($rules);

        return $data;
    }

    /**
     * Display the specified nameserver supermaster.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $nameserverSupermaster = NameserverSupermaster::findOrFail($id);

        return view('nameserver_supermasters.show', compact('nameserverSupermaster'));
    }

    /**
     * Show the form for editing the specified nameserver supermaster.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $nameserverSupermaster = NameserverSupermaster::findOrFail($id);

        return view('nameserver_supermasters.edit', compact('nameserverSupermaster'));
    }

    /**
     * Update the specified nameserver supermaster in the storage.
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

            $nameserverSupermaster = NameserverSupermaster::findOrFail($id);
            $nameserverSupermaster->update($data);

            return redirect()->route('nameserver_supermasters.nameserver_supermaster.index')->with('success_message', 'Nameserver Supermaster was successfully updated!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified nameserver supermaster from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $nameserverSupermaster = NameserverSupermaster::findOrFail($id);
            $nameserverSupermaster->delete();

            return redirect()->route('nameserver_supermasters.nameserver_supermaster.index')->with('success_message', 'Nameserver Supermaster was successfully deleted!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
}
