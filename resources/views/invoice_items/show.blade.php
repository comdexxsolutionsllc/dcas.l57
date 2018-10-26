@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Invoice Item' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST" action="{!! route('invoice_items.invoice_item.destroy', $invoiceItem->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('invoice_items.invoice_item.index') }}" class="btn btn-primary"
               title="Show All Invoice Item">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('invoice_items.invoice_item.create') }}" class="btn btn-success"
               title="Create New Invoice Item">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('invoice_items.invoice_item.edit', $invoiceItem->id ) }}"
               class="btn btn-primary" title="Edit Invoice Item">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Invoice Item"
                    onclick="return confirm(&quot;Delete; Invoice; Item??&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Invoice</dt>
        <dd>{{ optional($invoiceItem->invoice)->subtotal }}</dd>
        <dt>Service</dt>
        <dd>{{ optional($invoiceItem->service)->service_type }}</dd>
        <dt>Description</dt>
        <dd>{{ $invoiceItem->description }}</dd>
        <dt>Price</dt>
        <dd>{{ $invoiceItem->price }}</dd>
        <dt>Created At</dt>
        <dd>{{ $invoiceItem->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $invoiceItem->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
