<?php

namespace App\Http\Controllers;

use App\Models\GENERATED\Company;
use Exception;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    /**
     * Display a listing of the companies.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $companies = Company::paginate(25);

        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new company.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('companies.create');
    }

    /**
     * Store a new company in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            Company::create($data);

            return redirect()->route('companies.company.index')->with('success_message', 'Company was successfully added!');
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
            'name'          => 'required|string|min:1|max:255',
            'contact_name'  => 'required|string|min:1|max:255',
            'contact_email' => 'nullable|string|min:0|max:255',
            'contact_phone' => 'nullable|string|min:0|max:255',
            'phone_type'    => 'required',
            'active'        => 'boolean',

        ];

        $data = $request->validate($rules);

        $data['active'] = $request->has('active');

        return $data;
    }

    /**
     * Display the specified company.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $company = Company::findOrFail($id);

        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified company.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);

        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified company in the storage.
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

            $company = Company::findOrFail($id);
            $company->update($data);

            return redirect()->route('companies.company.index')->with('success_message', 'Company was successfully updated!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified company from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $company = Company::findOrFail($id);
            $company->delete();

            return redirect()->route('companies.company.index')->with('success_message', 'Company was successfully deleted!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
}
