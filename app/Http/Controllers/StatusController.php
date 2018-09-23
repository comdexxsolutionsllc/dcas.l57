<?php

namespace App\Http\Controllers;

use App\Models\Support\Status;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class StatusController
 *
 * @package App\Http\Controllers
 */
class StatusController extends Controller
{

    /**
     * Display a listing of the statuses.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $statuses = Status::paginate(25);

        return view('statuses.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new status.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('statuses.create');
    }

    /**
     * Store a new status in the storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            $data = $this->getData($request);

            Status::create($data);

            return redirect()->route('statuses.status.index')->with('success_message', 'Status was successfully added!');
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
     * Display the specified status.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id): View
    {
        $status = Status::findOrFail($id);

        return view('statuses.show', compact('status'));
    }

    /**
     * Show the form for editing the specified status.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id): View
    {
        $status = Status::findOrFail($id);

        return view('statuses.edit', compact('status'));
    }

    /**
     * Update the specified status in the storage.
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

            $status = Status::findOrFail($id);
            $status->update($data);

            return redirect()->route('statuses.status.index')->with('success_message', 'Status was successfully updated!');
        } catch (Exception $exception) {
            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified status from the storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id): RedirectResponse
    {
        try {
            $status = Status::findOrFail($id);
            $status->delete();

            return redirect()->route('statuses.status.index')->with('success_message', 'Status was successfully deleted!');
        } catch (Exception $exception) {
            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
}
