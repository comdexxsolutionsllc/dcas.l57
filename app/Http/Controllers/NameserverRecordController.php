<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\GENERATED\NameserverRecord;
use Exception;
use Illuminate\Http\Request;

class NameserverRecordController extends Controller
{

    /**
     * Display a listing of the nameserver records.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $nameserverRecords = NameserverRecord::with('domain')->paginate(25);

        return view('nameserver_records.index', compact('nameserverRecords'));
    }

    /**
     * Show the form for creating a new nameserver record.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $domains = Domain::pluck('id', 'id')->all();

        return view('nameserver_records.create', compact('domains'));
    }

    /**
     * Store a new nameserver record in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            NameserverRecord::create($data);

            return redirect()->route('nameserver_records.nameserver_record.index')->with('success_message', 'Nameserver Record was successfully added!');
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
            'domain_id'   => 'required',
            'name'        => 'nullable|string|min:0|max:255',
            'type'        => 'nullable|string|min:0|max:255',
            'content'     => 'nullable|string|min:0|max:255',
            'ttl'         => 'nullable|numeric|min:-2147483648|max:2147483647',
            'priority'    => 'nullable|numeric|min:-2147483648|max:2147483647',
            'change_date' => 'nullable|numeric|min:-2147483648|max:2147483647',
            'disabled'    => 'required|string|min:1',
            'ordername'   => 'nullable|string|min:0|max:255',
            'auth'        => 'required|string|min:1',

        ];

        $data = $request->validate($rules);

        return $data;
    }

    /**
     * Display the specified nameserver record.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $nameserverRecord = NameserverRecord::with('domain')->findOrFail($id);

        return view('nameserver_records.show', compact('nameserverRecord'));
    }

    /**
     * Show the form for editing the specified nameserver record.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $nameserverRecord = NameserverRecord::findOrFail($id);
        $domains = Domain::pluck('id', 'id')->all();

        return view('nameserver_records.edit', compact('nameserverRecord', 'domains'));
    }

    /**
     * Update the specified nameserver record in the storage.
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

            $nameserverRecord = NameserverRecord::findOrFail($id);
            $nameserverRecord->update($data);

            return redirect()->route('nameserver_records.nameserver_record.index')->with('success_message', 'Nameserver Record was successfully updated!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified nameserver record from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $nameserverRecord = NameserverRecord::findOrFail($id);
            $nameserverRecord->delete();

            return redirect()->route('nameserver_records.nameserver_record.index')->with('success_message', 'Nameserver Record was successfully deleted!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
}
