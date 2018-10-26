@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Invoice' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST" action="{!! route('invoices.invoice.destroy', $invoice->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('invoices.invoice.index') }}" class="btn btn-primary"
               title="Show All Invoice">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('invoices.invoice.create') }}" class="btn btn-success"
               title="Create New Invoice">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('invoices.invoice.edit', $invoice->id ) }}" class="btn btn-primary"
               title="Edit Invoice">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Invoice"
                    onclick="return confirm(&quot;Delete; Invoice??&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Customer</dt>
        <dd>{{ optional($invoice->customer)->name }}</dd>
        <dt>Subtotal</dt>
        <dd>{{ $invoice->subtotal }}</dd>
        <dt>Payment Option</dt>
        <dd>{{ $invoice->payment_option }}</dd>
        <dt>Transaction</dt>
        <dd>{{ optional($invoice->transaction)->id }}</dd>
        <dt>Paypal Email</dt>
        <dd>{{ $invoice->paypal_email }}</dd>
        <dt>Billing Info</dt>
        <dd>{{ optional($invoice->billingInfo)->first_name }}</dd>
        <dt>Date</dt>
        <dd>{{ $invoice->date }}</dd>
        <dt>Date Due</dt>
        <dd>{{ $invoice->date_due }}</dd>
        <dt>Date Paid</dt>
        <dd>{{ $invoice->date_paid }}</dd>
        <dt>Created At</dt>
        <dd>{{ $invoice->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $invoice->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
