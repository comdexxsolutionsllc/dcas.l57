@extends('layouts.app')

@section('content')

  @if(Session::has('success_message'))
    <div class="alert alert-success">
      <span class="glyphicon glyphicon-ok"></span>
      {!! session('success_message') !!}

      <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
      </button>

    </div>
  @endif

  <div class="panel panel-default">

    <div class="panel-heading clearfix">

      <div class="pull-left">
        <h4 class="mt-5 mb-5">Invoices</h4>
      </div>

      <div class="btn-group btn-group-sm pull-right" role="group">
        <a href="{{ route('invoices.invoice.create') }}" class="btn btn-success" title="Create New Invoice">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
      </div>

    </div>

    @if(count($invoices) == 0)
      <div class="panel-body text-center">
        <h4>No Invoices Available!</h4>
      </div>
    @else
      <div class="panel-body panel-body-with-table">
        <div class="table-responsive">

          <table class="table table-striped ">
            <thead>
            <tr>
              <th>Customer</th>
              <th>Subtotal</th>
              <th>Payment Option</th>
              <th>Transaction</th>
              <th>Paypal Email</th>
              <th>Billing Info</th>
              <th>Date</th>
              <th>Date Due</th>
              <th>Date Paid</th>

              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($invoices as $invoice)
              <tr>
                <td>{{ optional($invoice->customer)->name }}</td>
                <td>{{ $invoice->subtotal }}</td>
                <td>{{ $invoice->payment_option }}</td>
                <td>{{ optional($invoice->transaction)->id }}</td>
                <td>{{ $invoice->paypal_email }}</td>
                <td>{{ optional($invoice->billingInfo)->first_name }}</td>
                <td>{{ $invoice->date }}</td>
                <td>{{ $invoice->date_due }}</td>
                <td>{{ $invoice->date_paid }}</td>

                <td>

                  <form method="POST" action="{!! route('invoices.invoice.destroy', $invoice->id) !!}"
                        accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}

                    <div class="btn-group btn-group-xs pull-right" role="group">
                      <a href="{{ route('invoices.invoice.show', $invoice->id ) }}"
                         class="btn btn-info" title="Show Invoice">
                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                      </a>
                      <a href="{{ route('invoices.invoice.edit', $invoice->id ) }}"
                         class="btn btn-primary" title="Edit Invoice">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                      </a>

                      <button type="submit" class="btn btn-danger" title="Delete Invoice"
                              onclick="return confirm(&quot;Delete; Invoice?;&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                      </button>
                    </div>

                  </form>

                </td>
              </tr>
            @endforeach
            </tbody>
          </table>

        </div>
      </div>

      <div class="panel-footer">
        {!! $invoices->render() !!}
      </div>

    @endif

  </div>
@endsection
