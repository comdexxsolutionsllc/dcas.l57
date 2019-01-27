<?php

namespace App\Http\Controllers;

use App\Models\GENERATED\NameserverTsigkey;
use Exception;
use Illuminate\Http\Request;

class NameserverTsigkeyController extends Controller
{

    /**
     * Display a listing of the nameserver tsigkeys.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $nameserverTsigkeys = NameserverTsigkey::paginate(25);

        return view('nameserver_tsigkeys.index', compact('nameserverTsigkeys'));
    }

    /**
     * Show the form for creating a new nameserver tsigkey.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('nameserver_tsigkeys.create');
    }

    /**
     * Store a new nameserver tsigkey in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            NameserverTsigkey::create($data);

            return redirect()->route('nameserver_tsigkeys.nameserver_tsigkey.index')->with('success_message', 'Nameserver Tsigkey was successfully added!');
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
            'name'      => 'required|string|min:1|max:255',
            'algorithm' => 'required|string|min:1|max:255',
            'secret'    => 'required|string|min:1|max:255',

        ];

        $data = $request->validate($rules);

        return $data;
    }

    /**
     * Display the specified nameserver tsigkey.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $nameserverTsigkey = NameserverTsigkey::findOrFail($id);

        return view('nameserver_tsigkeys.show', compact('nameserverTsigkey'));
    }

    /**
     * Show the form for editing the specified nameserver tsigkey.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $nameserverTsigkey = NameserverTsigkey::findOrFail($id);

        return view('nameserver_tsigkeys.edit', compact('nameserverTsigkey'));
    }

    /**
     * Update the specified nameserver tsigkey in the storage.
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

            $nameserverTsigkey = NameserverTsigkey::findOrFail($id);
            $nameserverTsigkey->update($data);

            return redirect()->route('nameserver_tsigkeys.nameserver_tsigkey.index')->with('success_message', 'Nameserver Tsigkey was successfully updated!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified nameserver tsigkey from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $nameserverTsigkey = NameserverTsigkey::findOrFail($id);
            $nameserverTsigkey->delete();

            return redirect()->route('nameserver_tsigkeys.nameserver_tsigkey.index')->with('success_message', 'Nameserver Tsigkey was successfully deleted!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
}
