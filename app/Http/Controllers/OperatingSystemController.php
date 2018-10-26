<?php

namespace App\Http\Controllers;

use App\Models\GENERATED\OperatingSystem;
use Exception;
use Illuminate\Http\Request;

class OperatingSystemController extends Controller
{

    /**
     * Display a listing of the operating systems.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $operatingSystems = OperatingSystem::paginate(25);

        return view('operating_systems.index', compact('operatingSystems'));
    }

    /**
     * Show the form for creating a new operating system.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('operating_systems.create');
    }

    /**
     * Store a new operating system in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            OperatingSystem::create($data);

            return redirect()->route('operating_systems.operating_system.index')->with('success_message', 'Operating System was successfully added!');
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
            'architecture' => 'required',
            'type'         => 'required',
            'name'         => 'required|string|min:1|max:255',
            'notes'        => 'required|string|min:1|max:4294967295',
            'active'       => 'boolean',

        ];

        $data = $request->validate($rules);

        $data['active'] = $request->has('active');

        return $data;
    }

    /**
     * Display the specified operating system.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $operatingSystem = OperatingSystem::findOrFail($id);

        return view('operating_systems.show', compact('operatingSystem'));
    }

    /**
     * Show the form for editing the specified operating system.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $operatingSystem = OperatingSystem::findOrFail($id);

        return view('operating_systems.edit', compact('operatingSystem'));
    }

    /**
     * Update the specified operating system in the storage.
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

            $operatingSystem = OperatingSystem::findOrFail($id);
            $operatingSystem->update($data);

            return redirect()->route('operating_systems.operating_system.index')->with('success_message', 'Operating System was successfully updated!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified operating system from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $operatingSystem = OperatingSystem::findOrFail($id);
            $operatingSystem->delete();

            return redirect()->route('operating_systems.operating_system.index')->with('success_message', 'Operating System was successfully deleted!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
}
