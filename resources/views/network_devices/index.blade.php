@extends('layouts.app')

@section('content')

  @if(Session::has('success_message'))
    <div class="alert alert-success">
      <span class="glyphicon glyphicon-ok"></span>
      {!! session('success_message') !!}

      <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
      </button>

    </div>
  @endif

  <div class="panel panel-default">

    <div class="panel-heading clearfix">

      <div class="pull-left">
        <h4 class="mt-5 mb-5">Network Devices</h4>
      </div>

      <div class="btn-group btn-group-sm pull-right" role="group">
        <a href="{{ route('network_devices.network_device.create') }}" class="btn btn-success"
           title="Create New Network Device">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
      </div>

    </div>

    @if(count($networkDevices) == 0)
      <div class="panel-body text-center">
        <h4>No Network Devices Available!</h4>
      </div>
    @else
      <div class="panel-body panel-body-with-table">
        <div class="table-responsive">

          <table class="table table-striped ">
            <thead>
            <tr>
              <th>Asset Number</th>
              <th>Serial Number</th>
              <th>Network Device Type</th>
              <th>Hostname</th>
              <th>Ip Address</th>
              <th>Ip Address Alt</th>
              <th>Hardware Maker</th>
              <th>Hardware Version</th>
              <th>Device Os Version</th>
              <th>Total Ports</th>

              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($networkDevices as $networkDevice)
              <tr>
                <td>{{ $networkDevice->asset_number }}</td>
                <td>{{ $networkDevice->serial_number }}</td>
                <td>{{ optional($networkDevice->networkDeviceType)->name }}</td>
                <td>{{ $networkDevice->hostname }}</td>
                <td>{{ $networkDevice->ip_address }}</td>
                <td>{{ $networkDevice->ip_address_alt }}</td>
                <td>{{ $networkDevice->hardware_maker }}</td>
                <td>{{ $networkDevice->hardware_version }}</td>
                <td>{{ $networkDevice->device_os_version }}</td>
                <td>{{ $networkDevice->total_ports }}</td>

                <td>

                  <form method="POST"
                        action="{!! route('network_devices.network_device.destroy', $networkDevice->id) !!}"
                        accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}

                    <div class="btn-group btn-group-xs pull-right" role="group">
                      <a href="{{ route('network_devices.network_device.show', $networkDevice->id ) }}"
                         class="btn btn-info" title="Show Network Device">
                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                      </a>
                      <a href="{{ route('network_devices.network_device.edit', $networkDevice->id ) }}"
                         class="btn btn-primary" title="Edit Network Device">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                      </a>

                      <button type="submit" class="btn btn-danger" title="Delete Network Device"
                              onclick="return confirm(&quot;Delete; Network; Device?;&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                      </button>
                    </div>

                  </form>

                </td>
              </tr>
            @endforeach
            </tbody>
          </table>

        </div>
      </div>

      <div class="panel-footer">
        {!! $networkDevices->render() !!}
      </div>

    @endif

  </div>
@endsection
