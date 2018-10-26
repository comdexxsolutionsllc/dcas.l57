@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($status->name) ? $status->name : 'Status' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST" action="{!! route('statuses.status.destroy', $status->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('statuses.status.index') }}" class="btn btn-primary" title="Show All Status">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('statuses.status.create') }}" class="btn btn-success"
               title="Create New Status">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('statuses.status.edit', $status->id ) }}" class="btn btn-primary"
               title="Edit Status">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Status"
                    onclick="return confirm(&quot;Delete; Status??&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Name</dt>
        <dd>{{ $status->name }}</dd>
        <dt>Description</dt>
        <dd>{{ $status->description }}</dd>
        <dt>Hexcode</dt>
        <dd>{{ $status->hexcode }}</dd>
        <dt>Visible</dt>
        <dd>{{ ($status->visible) ? 'Yes' : 'No' }}</dd>
        <dt>Deleted At</dt>
        <dd>{{ $status->deleted_at }}</dd>
        <dt>Created At</dt>
        <dd>{{ $status->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $status->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
