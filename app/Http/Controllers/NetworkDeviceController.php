<?php

namespace App\Http\Controllers;

use App\Models\GENERATED\NetworkDevice;
use App\Models\GENERATED\NetworkDeviceType;
use Exception;
use Illuminate\Http\Request;

class NetworkDeviceController extends Controller
{

    /**
     * Display a listing of the network devices.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $networkDevices = NetworkDevice::with('networkdevicetype')->paginate(25);

        return view('network_devices.index', compact('networkDevices'));
    }

    /**
     * Show the form for creating a new network device.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $networkDeviceTypes = NetworkDeviceType::pluck('name', 'id')->all();

        return view('network_devices.create', compact('networkDeviceTypes'));
    }

    /**
     * Store a new network device in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            NetworkDevice::create($data);

            return redirect()->route('network_devices.network_device.index')->with('success_message', 'Network Device was successfully added!');
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
            'asset_number'           => 'required|numeric|string|min:1|max:255',
            'serial_number'          => 'nullable|numeric|string|min:0|max:255',
            'network_device_type_id' => 'required',
            'hostname'               => 'required|string|min:1|max:255',
            'ip_address'             => 'required|string|min:1|max:45',
            'ip_address_alt'         => 'nullable|string|min:0|max:45',
            'hardware_maker'         => 'required|string|min:1|max:255',
            'hardware_version'       => 'required|string|min:1|max:255',
            'device_os_version'      => 'required|string|min:1|max:255',
            'total_ports'            => 'required|numeric|min:0|max:4294967295',

        ];

        $data = $request->validate($rules);

        return $data;
    }

    /**
     * Display the specified network device.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $networkDevice = NetworkDevice::with('networkdevicetype')->findOrFail($id);

        return view('network_devices.show', compact('networkDevice'));
    }

    /**
     * Show the form for editing the specified network device.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $networkDevice = NetworkDevice::findOrFail($id);
        $networkDeviceTypes = NetworkDeviceType::pluck('name', 'id')->all();

        return view('network_devices.edit', compact('networkDevice', 'networkDeviceTypes'));
    }

    /**
     * Update the specified network device in the storage.
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

            $networkDevice = NetworkDevice::findOrFail($id);
            $networkDevice->update($data);

            return redirect()->route('network_devices.network_device.index')->with('success_message', 'Network Device was successfully updated!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified network device from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $networkDevice = NetworkDevice::findOrFail($id);
            $networkDevice->delete();

            return redirect()->route('network_devices.network_device.index')->with('success_message', 'Network Device was successfully deleted!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
}
