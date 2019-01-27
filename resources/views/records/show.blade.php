@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($record->name) ? $record->name : 'Record' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST" action="{!! route('records.record.destroy', $record->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('records.record.index') }}" class="btn btn-primary" title="Show All Record">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('records.record.create') }}" class="btn btn-success"
               title="Create New Record">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('records.record.edit', $record->id ) }}" class="btn btn-primary"
               title="Edit Record">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Record"
                    onclick="return confirm(&quot;Delete; Record??&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Domain</dt>
        <dd>{{ optional($record->domain)->id }}</dd>
        <dt>Name</dt>
        <dd>{{ $record->name }}</dd>
        <dt>Type</dt>
        <dd>{{ $record->type }}</dd>
        <dt>Content</dt>
        <dd>{{ $record->content }}</dd>
        <dt>Ttl</dt>
        <dd>{{ $record->ttl }}</dd>
        <dt>Priority</dt>
        <dd>{{ $record->priority }}</dd>
        <dt>Change Date</dt>
        <dd>{{ $record->change_date }}</dd>
        <dt>Disabled</dt>
        <dd>{{ $record->disabled }}</dd>
        <dt>Ordername</dt>
        <dd>{{ $record->ordername }}</dd>
        <dt>Auth</dt>
        <dd>{{ $record->auth }}</dd>
        <dt>Created At</dt>
        <dd>{{ $record->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $record->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
