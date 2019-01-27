<?php

namespace App\Http\Controllers;

use App\Models\GENERATED\NetworkConfiguration;
use App\Models\GENERATED\SwitchportInformation;
use Exception;
use Illuminate\Http\Request;

class NetworkConfigurationController extends Controller
{

    /**
     * Display a listing of the network configurations.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $networkConfigurations = NetworkConfiguration::with('switchportinformation')->paginate(25);

        return view('network_configurations.index', compact('networkConfigurations'));
    }

    /**
     * Show the form for creating a new network configuration.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $switchportInformations = SwitchportInformation::pluck('id', 'id')->all();

        return view('network_configurations.create', compact('switchportInformations'));
    }

    /**
     * Store a new network configuration in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            NetworkConfiguration::create($data);

            return redirect()->route('network_configurations.network_configuration.index')->with('success_message', 'Network Configuration was successfully added!');
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
            'switchport_information_id' => 'required',
            'configuration'             => 'required|string|min:1|max:4294967295',

        ];

        $data = $request->validate($rules);

        return $data;
    }

    /**
     * Display the specified network configuration.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $networkConfiguration = NetworkConfiguration::with('switchportinformation')->findOrFail($id);

        return view('network_configurations.show', compact('networkConfiguration'));
    }

    /**
     * Show the form for editing the specified network configuration.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $networkConfiguration = NetworkConfiguration::findOrFail($id);
        $switchportInformations = SwitchportInformation::pluck('id', 'id')->all();

        return view('network_configurations.edit', compact('networkConfiguration', 'switchportInformations'));
    }

    /**
     * Update the specified network configuration in the storage.
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

            $networkConfiguration = NetworkConfiguration::findOrFail($id);
            $networkConfiguration->update($data);

            return redirect()->route('network_configurations.network_configuration.index')->with('success_message', 'Network Configuration was successfully updated!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified network configuration from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $networkConfiguration = NetworkConfiguration::findOrFail($id);
            $networkConfiguration->delete();

            return redirect()->route('network_configurations.network_configuration.index')->with('success_message', 'Network Configuration was successfully deleted!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
}
