@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Notification' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST" action="{!! route('notifications.notification.destroy', $notification->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('notifications.notification.index') }}" class="btn btn-primary"
               title="Show All Notification">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('notifications.notification.create') }}" class="btn btn-success"
               title="Create New Notification">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('notifications.notification.edit', $notification->id ) }}"
               class="btn btn-primary" title="Edit Notification">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Notification"
                    onclick="return confirm(&quot;Delete; Notification??&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Type</dt>
        <dd>{{ $notification->type }}</dd>
        <dt>Data</dt>
        <dd>{{ $notification->data }}</dd>
        <dt>Read At</dt>
        <dd>{{ $notification->read_at }}</dd>
        <dt>Created At</dt>
        <dd>{{ $notification->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $notification->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
