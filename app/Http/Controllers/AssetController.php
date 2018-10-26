<?php

namespace App\Http\Controllers;

//use App\Models\GENERATED\Hardware;
//use App\Models\GENERATED\Switchport;
//use App\Models\GENERATED\Switch;

class AssetController extends Controller
{

    ///**
    // * Display a listing of the assets.
    // *
    // * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    // */
    //public function index()
    //{
    //    $assets = Asset::with('hardware', 'datacenter', 'switch', 'switchport')->paginate(25);
    //
    //    return view('assets.index', compact('assets'));
    //}
    //
    ///**
    // * Show the form for creating a new asset.
    // *
    // * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    // */
    //public function create()
    //{
    //    $hardware = Hardware::pluck('id', 'id')->all();
    //    $datacenters = Datacenter::pluck('code', 'id')->all();
    //    $switches = Switch::pluck('id', 'id')->all();
    //    $switchports = Switchport::pluck('id', 'id')->all();
    //
    //    return view('assets.create', compact('hardware', 'datacenters', 'switches', 'switchports'));
    //}
    //
    ///**
    // * Store a new asset in the storage.
    // *
    // * @param \Illuminate\Http\Request $request
    // *
    // * @return \Illuminate\Http\RedirectResponse
    // */
    //public function store(Request $request)
    //{
    //    try {
    //
    //        $data = $this->getData($request);
    //
    //        Asset::create($data);
    //
    //        return redirect()->route('assets.asset.index')->with('success_message', 'Asset was successfully added!');
    //    } catch (Exception $exception) {
    //
    //        return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
    //    }
    //}
    //
    ///**
    // * Get the request's data from the request.
    // *
    // * @param \Illuminate\Http\Request $request
    // *
    // * @return mixed
    // */
    //protected function getData(Request $request)
    //{
    //    $rules = [
    //        'serial_number'           => 'required|numeric|string|min:1|max:255',
    //        'hardware_id'             => 'required',
    //        'status'                  => 'required|string|min:1|max:255',
    //        'datacenter_id'           => 'nullable',
    //        'switch_id'               => 'nullable',
    //        'switchport_id'           => 'nullable',
    //        'network_interface_cards' => 'required',
    //        'port_speed'              => 'nullable|string|min:0|max:255',
    //        'private_ip'              => 'nullable|string|min:0|max:45',
    //        'chassis'                 => 'required|string|min:1|max:255',
    //        'motherboard_type'        => 'required|string|min:1|max:255',
    //        'cpus'                    => 'required',
    //        'memory'                  => 'required',
    //        'disks'                   => 'required',
    //        'operating_system'        => 'nullable|string|min:0|max:255',
    //        'control_panel'           => 'nullable|string|min:0|max:255',
    //        'administrator_password'  => 'nullable|string|min:0|max:255',
    //        'onhand_qty'              => 'required|numeric|min:0|max:4294967295',
    //        'pending_testing_qty'     => 'required|numeric|min:0|max:4294967295',
    //        'rma_qty'                 => 'required|numeric|min:0|max:4294967295',
    //        'last_checkin'            => 'nullable|date_format:j/n/Y g:i A',
    //
    //    ];
    //
    //    $data = $request->validate($rules);
    //
    //    return $data;
    //}
    //
    ///**
    // * Display the specified asset.
    // *
    // * @param $id
    // *
    // * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    // */
    //public function show($id)
    //{
    //    $asset = Asset::with('hardware', 'datacenter', 'switch', 'switchport')->findOrFail($id);
    //
    //    return view('assets.show', compact('asset'));
    //}
    //
    ///**
    // * Show the form for editing the specified asset.
    // *
    // * @param $id
    // *
    // * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    // */
    //public function edit($id)
    //{
    //    $asset = Asset::findOrFail($id);
    //    $hardware = Hardware::pluck('id', 'id')->all();
    //    $datacenters = Datacenter::pluck('code', 'id')->all();
    //    $switches = Switch::pluck('id', 'id')->all();
    //    $switchports = Switchport::pluck('id', 'id')->all();
    //
    //    return view('assets.edit', compact('asset', 'hardware', 'datacenters', 'switches', 'switchports'));
    //}
    //
    ///**
    // * Update the specified asset in the storage.
    // *
    // * @param                          $id
    // * @param \Illuminate\Http\Request $request
    // *
    // * @return \Illuminate\Http\RedirectResponse
    // */
    //public function update($id, Request $request)
    //{
    //    try {
    //
    //        $data = $this->getData($request);
    //
    //        $asset = Asset::findOrFail($id);
    //        $asset->update($data);
    //
    //        return redirect()->route('assets.asset.index')->with('success_message', 'Asset was successfully updated!');
    //    } catch (Exception $exception) {
    //
    //        return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
    //    }
    //}
    //
    ///**
    // * Remove the specified asset from the storage.
    // *
    // * @param $id
    // *
    // * @return \Illuminate\Http\RedirectResponse
    // */
    //public function destroy($id)
    //{
    //    try {
    //        $asset = Asset::findOrFail($id);
    //        $asset->delete();
    //
    //        return redirect()->route('assets.asset.index')->with('success_message', 'Asset was successfully deleted!');
    //    } catch (Exception $exception) {
    //
    //        return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
    //    }
    //}
}
