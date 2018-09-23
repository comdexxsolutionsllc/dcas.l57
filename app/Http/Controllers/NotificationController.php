<?php

namespace App\Http\Controllers;

use App\Models\General\Notification;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class NotificationController
 *
 * @package App\Http\Controllers
 */
class NotificationController extends Controller
{

    /**
     * Display a listing of the notifications.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $notifications = Notification::paginate(25);

        return view('notifications.index', compact('notifications'));
    }

    /**
     * Show the form for creating a new notification.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('notifications.create');
    }

    /**
     * Store a new notification in the storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            $data = $this->getData($request);

            Notification::create($data);

            return redirect()->route('notifications.notification.index')->with('success_message', 'Notification was successfully added!');
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
            'type'    => 'required|string|min:1|max:255',
            'data'    => 'required',
            'read_at' => 'nullable|date_format:j/n/Y g:i A',

        ];

        $data = $request->validate($rules);

        return $data;
    }

    /**
     * Display the specified notification.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id): View
    {
        $notification = Notification::findOrFail($id);

        return view('notifications.show', compact('notification'));
    }

    /**
     * Show the form for editing the specified notification.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id): View
    {
        $notification = Notification::findOrFail($id);

        return view('notifications.edit', compact('notification'));
    }

    /**
     * Update the specified notification in the storage.
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

            $notification = Notification::findOrFail($id);
            $notification->update($data);

            return redirect()->route('notifications.notification.index')->with('success_message', 'Notification was successfully updated!');
        } catch (Exception $exception) {
            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified notification from the storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id): RedirectResponse
    {
        try {
            $notification = Notification::findOrFail($id);
            $notification->delete();

            return redirect()->route('notifications.notification.index')->with('success_message', 'Notification was successfully deleted!');
        } catch (Exception $exception) {
            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
}
