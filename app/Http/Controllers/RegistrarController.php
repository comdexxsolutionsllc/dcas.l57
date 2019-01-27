<?php

namespace App\Http\Controllers;

use App\Models\GENERATED\Registrar;
use Exception;
use Illuminate\Http\Request;

class RegistrarController extends Controller
{

    /**
     * Display a listing of the registrars.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $registrars = Registrar::paginate(25);

        return view('registrars.index', compact('registrars'));
    }

    /**
     * Show the form for creating a new registrar.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('registrars.create');
    }

    /**
     * Store a new registrar in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            Registrar::create($data);

            return redirect()->route('registrars.registrar.index')->with('success_message', 'Registrar was successfully added!');
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
            'name' => 'required|string|min:1|max:255',
            'url'  => 'required|string|min:1|max:255',
            'type' => 'required|string|min:1|max:255',

        ];

        $data = $request->validate($rules);

        return $data;
    }

    /**
     * Display the specified registrar.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $registrar = Registrar::findOrFail($id);

        return view('registrars.show', compact('registrar'));
    }

    /**
     * Show the form for editing the specified registrar.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $registrar = Registrar::findOrFail($id);

        return view('registrars.edit', compact('registrar'));
    }

    /**
     * Update the specified registrar in the storage.
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

            $registrar = Registrar::findOrFail($id);
            $registrar->update($data);

            return redirect()->route('registrars.registrar.index')->with('success_message', 'Registrar was successfully updated!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified registrar from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $registrar = Registrar::findOrFail($id);
            $registrar->delete();

            return redirect()->route('registrars.registrar.index')->with('success_message', 'Registrar was successfully deleted!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
}
