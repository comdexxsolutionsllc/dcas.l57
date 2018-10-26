@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Reseller' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST" action="{!! route('resellers.reseller.destroy', $reseller->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('resellers.reseller.index') }}" class="btn btn-primary"
               title="Show All Reseller">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('resellers.reseller.create') }}" class="btn btn-success"
               title="Create New Reseller">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('resellers.reseller.edit', $reseller->id ) }}" class="btn btn-primary"
               title="Edit Reseller">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Reseller"
                    onclick="return confirm(&quot;Delete; Reseller??&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Account</dt>
        <dd>{{ optional($reseller->account)->id }}</dd>
        <dt>Company</dt>
        <dd>{{ optional($reseller->company)->name }}</dd>
        <dt>Expiry Date</dt>
        <dd>{{ $reseller->expiry_date }}</dd>
        <dt>Salesrep</dt>
        <dd>{{ optional($reseller->salesrep)->id }}</dd>
        <dt>Created At</dt>
        <dd>{{ $reseller->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $reseller->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
