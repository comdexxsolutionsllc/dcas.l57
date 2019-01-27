<?php

namespace App\Http\Controllers;

use App\Models\GENERATED\Department;
use App\Models\GENERATED\Technician;
use App\Models\GENERATED\User;
use Exception;
use Illuminate\Http\Request;

class TechnicianController extends Controller
{

    /**
     * Display a listing of the technicians.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $technicians = Technician::with('department', 'user')->paginate(25);

        return view('technicians.index', compact('technicians'));
    }

    /**
     * Show the form for creating a new technician.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $departments = Department::pluck('name', 'id')->all();
        $users = User::pluck('name', 'id')->all();

        return view('technicians.create', compact('departments', 'users'));
    }

    /**
     * Store a new technician in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            Technician::create($data);

            return redirect()->route('technicians.technician.index')->with('success_message', 'Technician was successfully added!');
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
            'department_id' => 'required',
            'user_id'       => 'required',

        ];

        $data = $request->validate($rules);

        return $data;
    }

    /**
     * Display the specified technician.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $technician = Technician::with('department', 'user')->findOrFail($id);

        return view('technicians.show', compact('technician'));
    }

    /**
     * Show the form for editing the specified technician.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $technician = Technician::findOrFail($id);
        $departments = Department::pluck('name', 'id')->all();
        $users = User::pluck('name', 'id')->all();

        return view('technicians.edit', compact('technician', 'departments', 'users'));
    }

    /**
     * Update the specified technician in the storage.
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

            $technician = Technician::findOrFail($id);
            $technician->update($data);

            return redirect()->route('technicians.technician.index')->with('success_message', 'Technician was successfully updated!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified technician from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $technician = Technician::findOrFail($id);
            $technician->delete();

            return redirect()->route('technicians.technician.index')->with('success_message', 'Technician was successfully deleted!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
}
