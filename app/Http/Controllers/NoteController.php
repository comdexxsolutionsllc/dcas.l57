<?php

namespace App\Http\Controllers;

use App\Models\Support\Note;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class NoteController
 *
 * @package App\Http\Controllers
 */
class NoteController extends Controller
{

    /**
     * Display a listing of the notes.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $notes = Note::paginate(25);

        return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new note.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('notes.create');
    }

    /**
     * Store a new note in the storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            $data = $this->getData($request);

            Note::create($data);

            return redirect()->route('notes.note.index')->with('success_message', 'Note was successfully added!');
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
            'body' => 'required',
        ];

        $data = $request->validate($rules);

        return $data;
    }

    /**
     * Display the specified note.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id): View
    {
        $note = Note::findOrFail($id);

        return view('notes.show', compact('note'));
    }

    /**
     * Show the form for editing the specified note.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id): View
    {
        $note = Note::findOrFail($id);

        return view('notes.edit', compact('note'));
    }

    /**
     * Update the specified note in the storage.
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

            $note = Note::findOrFail($id);
            $note->update($data);

            return redirect()->route('notes.note.index')->with('success_message', 'Note was successfully updated!');
        } catch (Exception $exception) {
            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified note from the storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id): RedirectResponse
    {
        try {
            $note = Note::findOrFail($id);
            $note->delete();

            return redirect()->route('notes.note.index')->with('success_message', 'Note was successfully deleted!');
        } catch (Exception $exception) {
            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
}
