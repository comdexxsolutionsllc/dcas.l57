@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($queue->name) ? $queue->name : 'Queue' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST" action="{!! route('queues.queue.destroy', $queue->id) !!}" accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('queues.queue.index') }}" class="btn btn-primary" title="Show All Queue">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('queues.queue.create') }}" class="btn btn-success" title="Create New Queue">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('queues.queue.edit', $queue->id ) }}" class="btn btn-primary"
               title="Edit Queue">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Queue"
                    onclick="return confirm(&quot;Delete; Queue??&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Name</dt>
        <dd>{{ $queue->name }}</dd>
        <dt>Description</dt>
        <dd>{{ $queue->description }}</dd>
        <dt>Visible</dt>
        <dd>{{ ($queue->visible) ? 'Yes' : 'No' }}</dd>
        <dt>Deleted At</dt>
        <dd>{{ $queue->deleted_at }}</dd>
        <dt>Created At</dt>
        <dd>{{ $queue->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $queue->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
