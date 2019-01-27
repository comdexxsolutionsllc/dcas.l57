<?php

namespace App\Http\Controllers;

use App\Models\GENERATED\NetworkDeviceType;
use Exception;
use Illuminate\Http\Request;

class NetworkDeviceTypeController extends Controller
{

    /**
     * Display a listing of the network device types.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $networkDeviceTypes = NetworkDeviceType::paginate(25);

        return view('network_device_types.index', compact('networkDeviceTypes'));
    }

    /**
     * Show the form for creating a new network device type.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('network_device_types.create');
    }

    /**
     * Store a new network device type in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            NetworkDeviceType::create($data);

            return redirect()->route('network_device_types.network_device_type.index')->with('success_message', 'Network Device Type was successfully added!');
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
            'name'        => 'required|string|min:1|max:255',
            'description' => 'nullable|string|min:0|max:4294967295',
            'active'      => 'boolean',

        ];

        $data = $request->validate($rules);

        $data['active'] = $request->has('active');

        return $data;
    }

    /**
     * Display the specified network device type.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $networkDeviceType = NetworkDeviceType::findOrFail($id);

        return view('network_device_types.show', compact('networkDeviceType'));
    }

    /**
     * Show the form for editing the specified network device type.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $networkDeviceType = NetworkDeviceType::findOrFail($id);

        return view('network_device_types.edit', compact('networkDeviceType'));
    }

    /**
     * Update the specified network device type in the storage.
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

            $networkDeviceType = NetworkDeviceType::findOrFail($id);
            $networkDeviceType->update($data);

            return redirect()->route('network_device_types.network_device_type.index')->with('success_message', 'Network Device Type was successfully updated!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified network device type from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $networkDeviceType = NetworkDeviceType::findOrFail($id);
            $networkDeviceType->delete();

            return redirect()->route('network_device_types.network_device_type.index')->with('success_message', 'Network Device Type was successfully deleted!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
}
