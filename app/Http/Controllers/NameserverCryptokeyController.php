<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\GENERATED\NameserverCryptokey;
use Exception;
use Illuminate\Http\Request;

class NameserverCryptokeyController extends Controller
{

    /**
     * Display a listing of the nameserver cryptokeys.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $nameserverCryptokeys = NameserverCryptokey::with('domain')->paginate(25);

        return view('nameserver_cryptokeys.index', compact('nameserverCryptokeys'));
    }

    /**
     * Show the form for creating a new nameserver cryptokey.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $domains = Domain::pluck('id', 'id')->all();

        return view('nameserver_cryptokeys.create', compact('domains'));
    }

    /**
     * Store a new nameserver cryptokey in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            NameserverCryptokey::create($data);

            return redirect()->route('nameserver_cryptokeys.nameserver_cryptokey.index')->with('success_message', 'Nameserver Cryptokey was successfully added!');
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
            'flags'     => 'required|numeric|min:-2147483648|max:2147483647',
            'active'    => 'nullable|boolean',
            'content'   => 'nullable',

        ];

        $data = $request->validate($rules);

        $data['active'] = $request->has('active');

        return $data;
    }

    /**
     * Display the specified nameserver cryptokey.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $nameserverCryptokey = NameserverCryptokey::with('domain')->findOrFail($id);

        return view('nameserver_cryptokeys.show', compact('nameserverCryptokey'));
    }

    /**
     * Show the form for editing the specified nameserver cryptokey.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $nameserverCryptokey = NameserverCryptokey::findOrFail($id);
        $domains = Domain::pluck('id', 'id')->all();

        return view('nameserver_cryptokeys.edit', compact('nameserverCryptokey', 'domains'));
    }

    /**
     * Update the specified nameserver cryptokey in the storage.
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

            $nameserverCryptokey = NameserverCryptokey::findOrFail($id);
            $nameserverCryptokey->update($data);

            return redirect()->route('nameserver_cryptokeys.nameserver_cryptokey.index')->with('success_message', 'Nameserver Cryptokey was successfully updated!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified nameserver cryptokey from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $nameserverCryptokey = NameserverCryptokey::findOrFail($id);
            $nameserverCryptokey->delete();

            return redirect()->route('nameserver_cryptokeys.nameserver_cryptokey.index')->with('success_message', 'Nameserver Cryptokey was successfully deleted!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
}
