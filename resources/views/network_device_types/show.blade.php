@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4
              class="mt-5 mb-5">{{ isset($networkDeviceType->name) ? $networkDeviceType->name : 'Network Device Type' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST"
              action="{!! route('network_device_types.network_device_type.destroy', $networkDeviceType->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('network_device_types.network_device_type.index') }}" class="btn btn-primary"
               title="Show All Network Device Type">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('network_device_types.network_device_type.create') }}" class="btn btn-success"
               title="Create New Network Device Type">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('network_device_types.network_device_type.edit', $networkDeviceType->id ) }}"
               class="btn btn-primary" title="Edit Network Device Type">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Network Device Type"
                    onclick="return confirm(&quot;Delete; Network; Device; Type??&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Name</dt>
        <dd>{{ $networkDeviceType->name }}</dd>
        <dt>Description</dt>
        <dd>{{ $networkDeviceType->description }}</dd>
        <dt>Active</dt>
        <dd>{{ ($networkDeviceType->active) ? 'Yes' : 'No' }}</dd>
        <dt>Created At</dt>
        <dd>{{ $networkDeviceType->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $networkDeviceType->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
