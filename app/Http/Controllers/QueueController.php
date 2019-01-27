<?php

namespace App\Http\Controllers;

use App\Models\GENERATED\Queue;
use Exception;
use Illuminate\Http\Request;

class QueueController extends Controller
{

    /**
     * Display a listing of the queues.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $queues = Queue::paginate(25);

        return view('queues.index', compact('queues'));
    }

    /**
     * Show the form for creating a new queue.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('queues.create');
    }

    /**
     * Store a new queue in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            Queue::create($data);

            return redirect()->route('queues.queue.index')->with('success_message', 'Queue was successfully added!');
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
            'name'        => 'required|string|min:1|max:255',
            'description' => 'nullable',
            'visible'     => 'boolean',

        ];

        $data = $request->validate($rules);

        $data['visible'] = $request->has('visible');

        return $data;
    }

    /**
     * Display the specified queue.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $queue = Queue::findOrFail($id);

        return view('queues.show', compact('queue'));
    }

    /**
     * Show the form for editing the specified queue.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $queue = Queue::findOrFail($id);

        return view('queues.edit', compact('queue'));
    }

    /**
     * Update the specified queue in the storage.
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

            $queue = Queue::findOrFail($id);
            $queue->update($data);

            return redirect()->route('queues.queue.index')->with('success_message', 'Queue was successfully updated!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified queue from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $queue = Queue::findOrFail($id);
            $queue->delete();

            return redirect()->route('queues.queue.index')->with('success_message', 'Queue was successfully deleted!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
}
