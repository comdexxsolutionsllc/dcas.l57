@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($operatingSystem->name) ? $operatingSystem->name : 'Operating System' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST"
              action="{!! route('operating_systems.operating_system.destroy', $operatingSystem->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('operating_systems.operating_system.index') }}" class="btn btn-primary"
               title="Show All Operating System">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('operating_systems.operating_system.create') }}" class="btn btn-success"
               title="Create New Operating System">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('operating_systems.operating_system.edit', $operatingSystem->id ) }}"
               class="btn btn-primary" title="Edit Operating System">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Operating System"
                    onclick="return confirm(&quot;Delete; Operating; System??&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Architecture</dt>
        <dd>{{ $operatingSystem->architecture }}</dd>
        <dt>Type</dt>
        <dd>{{ $operatingSystem->type }}</dd>
        <dt>Name</dt>
        <dd>{{ $operatingSystem->name }}</dd>
        <dt>Notes</dt>
        <dd>{{ $operatingSystem->notes }}</dd>
        <dt>Active</dt>
        <dd>{{ ($operatingSystem->active) ? 'Yes' : 'No' }}</dd>
        <dt>Created At</dt>
        <dd>{{ $operatingSystem->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $operatingSystem->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
