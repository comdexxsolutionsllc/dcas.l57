<?php

namespace App\Http\Controllers;

use App\Models\Support\Department;
use App\Models\Support\Status;
use App\Models\Support\Ticket;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class TicketController
 *
 * @package App\Http\Controllers
 */
class TicketController extends Controller
{

    /**
     * Display a listing of the tickets.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $tickets = Ticket::with('ticket')->paginate(25);

        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new ticket.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        $tickets = Ticket::pluck('id', 'id')->all();
        $statuses = Status::pluck('name', 'id')->all();
        $departments = Department::pluck('name', 'id')->all();

        return view('tickets.create', compact('tickets', 'statuses', 'departments'));
    }

    /**
     * Store a new ticket in the storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            $data = $this->getData($request);

            Ticket::create($data);

            return redirect()->route('tickets.ticket.index')->with('success_message', 'Ticket was successfully added!');
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
            'ticket_id'     => 'required',
            'title'         => 'required|string|min:1|max:255',
            'body'          => 'required',
            'status_id'     => 'required',
            'department_id' => 'required',
            'is_resolved'   => 'boolean|nullable',

        ];

        $data = $request->validate($rules);

        $data['is_resolved'] = $request->has('is_resolved');

        return $data;
    }

    /**
     * Display the specified ticket.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id): View
    {
        $ticket = Ticket::with('ticket', 'status', 'department')->findOrFail($id);

        return view('tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified ticket.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id): View
    {
        $ticket = Ticket::findOrFail($id);
        $tickets = Ticket::pluck('id', 'id')->all();
        $statuses = Status::pluck('name', 'id')->all();
        $departments = Department::pluck('name', 'id')->all();

        return view('tickets.edit', compact('ticket', 'tickets', 'statuses', 'departments'));
    }

    /**
     * Update the specified ticket in the storage.
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

            $ticket = Ticket::findOrFail($id);
            $ticket->update($data);

            return redirect()->route('tickets.ticket.index')->with('success_message', 'Ticket was successfully updated!');
        } catch (Exception $exception) {
            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified ticket from the storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id): RedirectResponse
    {
        try {
            $ticket = Ticket::findOrFail($id);
            $ticket->delete();

            return redirect()->route('tickets.ticket.index')->with('success_message', 'Ticket was successfully deleted!');
        } catch (Exception $exception) {
            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
}
