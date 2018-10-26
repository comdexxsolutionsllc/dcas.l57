<?php

namespace App\Http\Controllers;

use App\Models\GENERATED\Domain;
use App\Models\GENERATED\NameserverComment;
use Exception;
use Illuminate\Http\Request;

class NameserverCommentController extends Controller
{

    /**
     * Display a listing of the nameserver comments.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $nameserverComments = NameserverComment::with('domain')->paginate(25);

        return view('nameserver_comments.index', compact('nameserverComments'));
    }

    /**
     * Show the form for creating a new nameserver comment.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $domains = Domain::pluck('id', 'id')->all();

        return view('nameserver_comments.create', compact('domains'));
    }

    /**
     * Store a new nameserver comment in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            NameserverComment::create($data);

            return redirect()->route('nameserver_comments.nameserver_comment.index')->with('success_message', 'Nameserver Comment was successfully added!');
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
            'domain_id'   => 'required',
            'name'        => 'required|string|min:1|max:255',
            'type'        => 'required|string|min:1|max:255',
            'modified_at' => 'required|numeric|min:-2147483648|max:2147483647',
            'account'     => 'required|numeric|string|min:1|max:255',
            'comment'     => 'required|string|min:1|max:255',

        ];

        $data = $request->validate($rules);

        return $data;
    }

    /**
     * Display the specified nameserver comment.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $nameserverComment = NameserverComment::with('domain')->findOrFail($id);

        return view('nameserver_comments.show', compact('nameserverComment'));
    }

    /**
     * Show the form for editing the specified nameserver comment.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $nameserverComment = NameserverComment::findOrFail($id);
        $domains = Domain::pluck('id', 'id')->all();

        return view('nameserver_comments.edit', compact('nameserverComment', 'domains'));
    }

    /**
     * Update the specified nameserver comment in the storage.
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

            $nameserverComment = NameserverComment::findOrFail($id);
            $nameserverComment->update($data);

            return redirect()->route('nameserver_comments.nameserver_comment.index')->with('success_message', 'Nameserver Comment was successfully updated!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified nameserver comment from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $nameserverComment = NameserverComment::findOrFail($id);
            $nameserverComment->delete();

            return redirect()->route('nameserver_comments.nameserver_comment.index')->with('success_message', 'Nameserver Comment was successfully deleted!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
}
