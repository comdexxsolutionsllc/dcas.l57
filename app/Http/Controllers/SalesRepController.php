<?php

namespace App\Http\Controllers;

use App\Models\GENERATED\Company;
use App\Models\GENERATED\Employee;
use App\Models\GENERATED\SalesRep;
use Exception;
use Illuminate\Http\Request;

class SalesRepController extends Controller
{

    /**
     * Display a listing of the sales reps.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $salesReps = SalesRep::with('employee', 'company')->paginate(25);

        return view('sales_reps.index', compact('salesReps'));
    }

    /**
     * Show the form for creating a new sales rep.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $employees = Employee::pluck('name', 'id')->all();
        $companies = Company::pluck('name', 'id')->all();

        return view('sales_reps.create', compact('employees', 'companies'));
    }

    /**
     * Store a new sales rep in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            SalesRep::create($data);

            return redirect()->route('sales_reps.sales_rep.index')->with('success_message', 'Sales Rep was successfully added!');
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
            'employee_id' => 'required',
            'company_id'  => 'required',

        ];

        $data = $request->validate($rules);

        return $data;
    }

    /**
     * Display the specified sales rep.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $salesRep = SalesRep::with('employee', 'company')->findOrFail($id);

        return view('sales_reps.show', compact('salesRep'));
    }

    /**
     * Show the form for editing the specified sales rep.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $salesRep = SalesRep::findOrFail($id);
        $employees = Employee::pluck('name', 'id')->all();
        $companies = Company::pluck('name', 'id')->all();

        return view('sales_reps.edit', compact('salesRep', 'employees', 'companies'));
    }

    /**
     * Update the specified sales rep in the storage.
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

            $salesRep = SalesRep::findOrFail($id);
            $salesRep->update($data);

            return redirect()->route('sales_reps.sales_rep.index')->with('success_message', 'Sales Rep was successfully updated!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified sales rep from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $salesRep = SalesRep::findOrFail($id);
            $salesRep->delete();

            return redirect()->route('sales_reps.sales_rep.index')->with('success_message', 'Sales Rep was successfully deleted!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
}
