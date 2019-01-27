<?php

namespace App\Http\Controllers;

use App\Models\GENERATED\Employee;
use Exception;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    /**
     * Display a listing of the employees.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $employees = Employee::with('employee')->paginate(25);

        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new employee.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $employees = Employee::pluck('name', 'id')->all();

        return view('employees.create', compact('employees'));
    }

    /**
     * Store a new employee in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            Employee::create($data);

            return redirect()->route('employees.employee.index')->with('success_message', 'Employee was successfully added!');
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
            'employee_id'       => 'required',
            'name'              => 'required|string|min:1|max:255',
            'username'          => 'required|string|min:1|max:255',
            'email'             => 'required|string|min:1|max:255',
            'email_verified_at' => 'nullable|date_format:j/n/Y g:i A',
            'password'          => 'required|string|min:1|max:255',
            'cover'             => 'nullable|string|min:0|max:255',
            'avatar'            => 'nullable|file|string|min:0|max:255',
            'remember_token'    => 'nullable|string|min:0|max:100',
            'google2fa_secret'  => 'nullable',

        ];

        $data = $request->validate($rules);

        return $data;
    }

    /**
     * Display the specified employee.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $employee = Employee::with('employee')->findOrFail($id);

        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified employee.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $employees = Employee::pluck('name', 'id')->all();

        return view('employees.edit', compact('employee', 'employees'));
    }

    /**
     * Update the specified employee in the storage.
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

            $employee = Employee::findOrFail($id);
            $employee->update($data);

            return redirect()->route('employees.employee.index')->with('success_message', 'Employee was successfully updated!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified employee from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $employee = Employee::findOrFail($id);
            $employee->delete();

            return redirect()->route('employees.employee.index')->with('success_message', 'Employee was successfully deleted!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
}
