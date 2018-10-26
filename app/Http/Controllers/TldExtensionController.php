<?php

namespace App\Http\Controllers;

use App\Models\GENERATED\TldExtension;
use Exception;
use Illuminate\Http\Request;

class TldExtensionController extends Controller
{

    /**
     * Display a listing of the tld extensions.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $tldExtensions = TldExtension::paginate(25);

        return view('tld_extensions.index', compact('tldExtensions'));
    }

    /**
     * Show the form for creating a new tld extension.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('tld_extensions.create');
    }

    /**
     * Store a new tld extension in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            TldExtension::create($data);

            return redirect()->route('tld_extensions.tld_extension.index')->with('success_message', 'Tld Extension was successfully added!');
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
            'domain'      => 'required|string|min:1|max:255',
            'description' => 'nullable|string|min:0|max:255',
            'type'        => 'required',

        ];

        $data = $request->validate($rules);

        return $data;
    }

    /**
     * Display the specified tld extension.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $tldExtension = TldExtension::findOrFail($id);

        return view('tld_extensions.show', compact('tldExtension'));
    }

    /**
     * Show the form for editing the specified tld extension.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $tldExtension = TldExtension::findOrFail($id);

        return view('tld_extensions.edit', compact('tldExtension'));
    }

    /**
     * Update the specified tld extension in the storage.
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

            $tldExtension = TldExtension::findOrFail($id);
            $tldExtension->update($data);

            return redirect()->route('tld_extensions.tld_extension.index')->with('success_message', 'Tld Extension was successfully updated!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified tld extension from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $tldExtension = TldExtension::findOrFail($id);
            $tldExtension->delete();

            return redirect()->route('tld_extensions.tld_extension.index')->with('success_message', 'Tld Extension was successfully deleted!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
}
