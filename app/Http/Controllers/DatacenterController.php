<?php

namespace App\Http\Controllers;

use App\Models\GENERATED\Datacenter;
use Exception;
use Illuminate\Http\Request;

class DatacenterController extends Controller
{

    /**
     * Display a listing of the datacenters.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $datacenters = Datacenter::paginate(25);

        return view('datacenters.index', compact('datacenters'));
    }

    /**
     * Show the form for creating a new datacenter.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('datacenters.create');
    }

    /**
     * Store a new datacenter in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            Datacenter::create($data);

            return redirect()->route('datacenters.datacenter.index')->with('success_message', 'Datacenter was successfully added!');
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
            'code'         => 'required|string|min:1|max:255',
            'location'     => 'required|string|min:1|max:255',
            'status'       => 'required|string|min:1|max:255',
            'opening_date' => 'required|date_format:j/n/Y',

        ];

        $data = $request->validate($rules);

        return $data;
    }

    /**
     * Display the specified datacenter.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $datacenter = Datacenter::findOrFail($id);

        return view('datacenters.show', compact('datacenter'));
    }

    /**
     * Show the form for editing the specified datacenter.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $datacenter = Datacenter::findOrFail($id);

        return view('datacenters.edit', compact('datacenter'));
    }

    /**
     * Update the specified datacenter in the storage.
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

            $datacenter = Datacenter::findOrFail($id);
            $datacenter->update($data);

            return redirect()->route('datacenters.datacenter.index')->with('success_message', 'Datacenter was successfully updated!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified datacenter from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $datacenter = Datacenter::findOrFail($id);
            $datacenter->delete();

            return redirect()->route('datacenters.datacenter.index')->with('success_message', 'Datacenter was successfully deleted!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
}
