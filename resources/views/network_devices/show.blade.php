@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Network Device' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST" action="{!! route('network_devices.network_device.destroy', $networkDevice->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('network_devices.network_device.index') }}" class="btn btn-primary"
               title="Show All Network Device">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('network_devices.network_device.create') }}" class="btn btn-success"
               title="Create New Network Device">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('network_devices.network_device.edit', $networkDevice->id ) }}"
               class="btn btn-primary" title="Edit Network Device">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Network Device"
                    onclick="return confirm(&quot;Delete; Network; Device??&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Asset Number</dt>
        <dd>{{ $networkDevice->asset_number }}</dd>
        <dt>Serial Number</dt>
        <dd>{{ $networkDevice->serial_number }}</dd>
        <dt>Network Device Type</dt>
        <dd>{{ optional($networkDevice->networkDeviceType)->name }}</dd>
        <dt>Hostname</dt>
        <dd>{{ $networkDevice->hostname }}</dd>
        <dt>Ip Address</dt>
        <dd>{{ $networkDevice->ip_address }}</dd>
        <dt>Ip Address Alt</dt>
        <dd>{{ $networkDevice->ip_address_alt }}</dd>
        <dt>Hardware Maker</dt>
        <dd>{{ $networkDevice->hardware_maker }}</dd>
        <dt>Hardware Version</dt>
        <dd>{{ $networkDevice->hardware_version }}</dd>
        <dt>Device Os Version</dt>
        <dd>{{ $networkDevice->device_os_version }}</dd>
        <dt>Total Ports</dt>
        <dd>{{ $networkDevice->total_ports }}</dd>
        <dt>Created At</dt>
        <dd>{{ $networkDevice->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $networkDevice->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
