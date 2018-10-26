@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Sales Rep' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST" action="{!! route('sales_reps.sales_rep.destroy', $salesRep->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('sales_reps.sales_rep.index') }}" class="btn btn-primary"
               title="Show All Sales Rep">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('sales_reps.sales_rep.create') }}" class="btn btn-success"
               title="Create New Sales Rep">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('sales_reps.sales_rep.edit', $salesRep->id ) }}" class="btn btn-primary"
               title="Edit Sales Rep">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Sales Rep"
                    onclick="return confirm(&quot;Delete; Sales; Rep??&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Employee</dt>
        <dd>{{ optional($salesRep->employee)->name }}</dd>
        <dt>Company</dt>
        <dd>{{ optional($salesRep->company)->name }}</dd>
        <dt>Created At</dt>
        <dd>{{ $salesRep->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $salesRep->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
