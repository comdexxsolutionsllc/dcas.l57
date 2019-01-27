@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Datacenter' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST" action="{!! route('datacenters.datacenter.destroy', $datacenter->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('datacenters.datacenter.index') }}" class="btn btn-primary"
               title="Show All Datacenter">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('datacenters.datacenter.create') }}" class="btn btn-success"
               title="Create New Datacenter">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('datacenters.datacenter.edit', $datacenter->id ) }}" class="btn btn-primary"
               title="Edit Datacenter">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Datacenter"
                    onclick="return confirm(&quot;Delete; Datacenter??&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Code</dt>
        <dd>{{ $datacenter->code }}</dd>
        <dt>Location</dt>
        <dd>{{ $datacenter->location }}</dd>
        <dt>Status</dt>
        <dd>{{ $datacenter->status }}</dd>
        <dt>Opening Date</dt>
        <dd>{{ $datacenter->opening_date }}</dd>
        <dt>Created At</dt>
        <dd>{{ $datacenter->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $datacenter->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
