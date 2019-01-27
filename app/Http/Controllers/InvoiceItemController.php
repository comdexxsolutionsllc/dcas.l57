<?php

namespace App\Http\Controllers;

use App\Models\GENERATED\Invoice;
use App\Models\GENERATED\InvoiceItem;
use App\Models\GENERATED\Service;
use Exception;
use Illuminate\Http\Request;

class InvoiceItemController extends Controller
{

    /**
     * Display a listing of the invoice items.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $invoiceItems = InvoiceItem::with('invoice', 'service')->paginate(25);

        return view('invoice_items.index', compact('invoiceItems'));
    }

    /**
     * Show the form for creating a new invoice item.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $invoices = Invoice::pluck('subtotal', 'id')->all();
        $services = Service::pluck('service_type', 'id')->all();

        return view('invoice_items.create', compact('invoices', 'services'));
    }

    /**
     * Store a new invoice item in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            InvoiceItem::create($data);

            return redirect()->route('invoice_items.invoice_item.index')->with('success_message', 'Invoice Item was successfully added!');
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
            'invoice_id'  => 'required',
            'service_id'  => 'required',
            'description' => 'required',
            'price'       => 'required|string|min:1|max:255',

        ];

        $data = $request->validate($rules);

        return $data;
    }

    /**
     * Display the specified invoice item.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $invoiceItem = InvoiceItem::with('invoice', 'service')->findOrFail($id);

        return view('invoice_items.show', compact('invoiceItem'));
    }

    /**
     * Show the form for editing the specified invoice item.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $invoiceItem = InvoiceItem::findOrFail($id);
        $invoices = Invoice::pluck('subtotal', 'id')->all();
        $services = Service::pluck('service_type', 'id')->all();

        return view('invoice_items.edit', compact('invoiceItem', 'invoices', 'services'));
    }

    /**
     * Update the specified invoice item in the storage.
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

            $invoiceItem = InvoiceItem::findOrFail($id);
            $invoiceItem->update($data);

            return redirect()->route('invoice_items.invoice_item.index')->with('success_message', 'Invoice Item was successfully updated!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified invoice item from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $invoiceItem = InvoiceItem::findOrFail($id);
            $invoiceItem->delete();

            return redirect()->route('invoice_items.invoice_item.index')->with('success_message', 'Invoice Item was successfully deleted!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
}
