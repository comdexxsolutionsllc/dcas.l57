@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Network Configuration' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST"
              action="{!! route('network_configurations.network_configuration.destroy', $networkConfiguration->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('network_configurations.network_configuration.index') }}"
               class="btn btn-primary" title="Show All Network Configuration">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('network_configurations.network_configuration.create') }}"
               class="btn btn-success" title="Create New Network Configuration">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('network_configurations.network_configuration.edit', $networkConfiguration->id ) }}"
               class="btn btn-primary" title="Edit Network Configuration">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Network Configuration"
                    onclick="return confirm(&quot;Delete; Network; Configuration??&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Switchport Information</dt>
        <dd>{{ optional($networkConfiguration->switchportInformation)->id }}</dd>
        <dt>Configuration</dt>
        <dd>{{ $networkConfiguration->configuration }}</dd>
        <dt>Created At</dt>
        <dd>{{ $networkConfiguration->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $networkConfiguration->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
