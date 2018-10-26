<?php

namespace App\Http\Controllers;

use App\Models\GENERATED\BillingInfo;
use App\Models\GENERATED\Customer;
use App\Models\GENERATED\Invoice;
use App\Models\GENERATED\Transaction;
use Exception;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{

    /**
     * Display a listing of the invoices.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $invoices = Invoice::with('customer', 'transaction', 'billinginfo')->paginate(25);

        return view('invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new invoice.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $customers = Customer::pluck('name', 'id')->all();
        $transactions = Transaction::pluck('id', 'id')->all();
        $billingInfos = BillingInfo::pluck('first_name', 'id')->all();

        return view('invoices.create', compact('customers', 'transactions', 'billingInfos'));
    }

    /**
     * Store a new invoice in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            Invoice::create($data);

            return redirect()->route('invoices.invoice.index')->with('success_message', 'Invoice was successfully added!');
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
            'customer_id'     => 'required',
            'subtotal'        => 'required|string|min:1|max:255',
            'payment_option'  => 'required',
            'transaction_id'  => 'required',
            'paypal_email'    => 'nullable|string|min:0|max:255',
            'billing_info_id' => 'required',
            'date'            => 'nullable|date_format:j/n/Y g:i A',
            'date_due'        => 'nullable|date_format:j/n/Y',
            'date_paid'       => 'nullable|date_format:j/n/Y',

        ];

        $data = $request->validate($rules);

        return $data;
    }

    /**
     * Display the specified invoice.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $invoice = Invoice::with('customer', 'transaction', 'billinginfo')->findOrFail($id);

        return view('invoices.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified invoice.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $invoice = Invoice::findOrFail($id);
        $customers = Customer::pluck('name', 'id')->all();
        $transactions = Transaction::pluck('id', 'id')->all();
        $billingInfos = BillingInfo::pluck('first_name', 'id')->all();

        return view('invoices.edit', compact('invoice', 'customers', 'transactions', 'billingInfos'));
    }

    /**
     * Update the specified invoice in the storage.
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

            $invoice = Invoice::findOrFail($id);
            $invoice->update($data);

            return redirect()->route('invoices.invoice.index')->with('success_message', 'Invoice was successfully updated!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified invoice from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $invoice = Invoice::findOrFail($id);
            $invoice->delete();

            return redirect()->route('invoices.invoice.index')->with('success_message', 'Invoice was successfully deleted!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
}
