@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Technician' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST" action="{!! route('technicians.technician.destroy', $technician->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('technicians.technician.index') }}" class="btn btn-primary"
               title="Show All Technician">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('technicians.technician.create') }}" class="btn btn-success"
               title="Create New Technician">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('technicians.technician.edit', $technician->id ) }}" class="btn btn-primary"
               title="Edit Technician">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Technician"
                    onclick="return confirm(&quot;Delete; Technician??&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Department</dt>
        <dd>{{ optional($technician->department)->name }}</dd>
        <dt>User</dt>
        <dd>{{ optional($technician->user)->name }}</dd>
        <dt>Created At</dt>
        <dd>{{ $technician->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $technician->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
