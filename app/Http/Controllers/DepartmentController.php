<?php

namespace App\Http\Controllers;

use App\Models\Support\Department;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class DepartmentController
 *
 * @package App\Http\Controllers
 */
class DepartmentController extends Controller
{

    /**
     * Display a listing of the departments.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $departments = Department::paginate(25);

        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new department.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('departments.create');
    }

    /**
     * Store a new department in the storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            $data = $this->getData($request);

            Department::create($data);

            return redirect()->route('departments.department.index')->with('success_message', 'Department was successfully added!');
        } catch (Exception $exception) {
            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Get the request's data from the request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    protected function getData(Request $request): array
    {
        $rules = [
            'name'        => 'required|string|min:1|max:255',
            'description' => 'nullable',
            'hexcode'     => 'required|string|min:1|max:255',
            'visible'     => 'boolean',

        ];

        $data = $request->validate($rules);

        $data['visible'] = $request->has('visible');

        return $data;
    }

    /**
     * Display the specified department.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id): View
    {
        $department = Department::findOrFail($id);

        return view('departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified department.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id): View
    {
        $department = Department::findOrFail($id);

        return view('departments.edit', compact('department'));
    }

    /**
     * Update the specified department in the storage.
     *
     * @param  int                     $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function update($id, Request $request): RedirectResponse
    {
        try {
            $data = $this->getData($request);

            $department = Department::findOrFail($id);
            $department->update($data);

            return redirect()->route('departments.department.index')->with('success_message', 'Department was successfully updated!');
        } catch (Exception $exception) {
            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified department from the storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id): RedirectResponse
    {
        try {
            $department = Department::findOrFail($id);
            $department->delete();

            return redirect()->route('departments.department.index')->with('success_message', 'Department was successfully deleted!');
        } catch (Exception $exception) {
            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
}
