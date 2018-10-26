@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Asset' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST" action="{!! route('assets.asset.destroy', $asset->id) !!}" accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('assets.asset.index') }}" class="btn btn-primary" title="Show All Asset">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('assets.asset.create') }}" class="btn btn-success" title="Create New Asset">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('assets.asset.edit', $asset->id ) }}" class="btn btn-primary"
               title="Edit Asset">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Asset"
                    onclick="return confirm(&quot;Delete; Asset??&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Serial Number</dt>
        <dd>{{ $asset->serial_number }}</dd>
        <dt>Hardware</dt>
        <dd>{{ optional($asset->hardware)->id }}</dd>
        <dt>Status</dt>
        <dd>{{ $asset->status }}</dd>
        <dt>Datacenter</dt>
        <dd>{{ optional($asset->datacenter)->code }}</dd>
        <dt>Switch</dt>
        <dd>{{ optional($asset->switch)->id }}</dd>
        <dt>Switchport</dt>
        <dd>{{ optional($asset->switchport)->id }}</dd>
        <dt>Network Interface Cards</dt>
        <dd>{{ $asset->network_interface_cards }}</dd>
        <dt>Port Speed</dt>
        <dd>{{ $asset->port_speed }}</dd>
        <dt>Private Ip</dt>
        <dd>{{ $asset->private_ip }}</dd>
        <dt>Chassis</dt>
        <dd>{{ $asset->chassis }}</dd>
        <dt>Motherboard Type</dt>
        <dd>{{ $asset->motherboard_type }}</dd>
        <dt>Cpus</dt>
        <dd>{{ $asset->cpus }}</dd>
        <dt>Memory</dt>
        <dd>{{ $asset->memory }}</dd>
        <dt>Disks</dt>
        <dd>{{ $asset->disks }}</dd>
        <dt>Operating System</dt>
        <dd>{{ $asset->operating_system }}</dd>
        <dt>Control Panel</dt>
        <dd>{{ $asset->control_panel }}</dd>
        <dt>Administrator Password</dt>
        <dd>{{ $asset->administrator_password }}</dd>
        <dt>Onhand Qty</dt>
        <dd>{{ $asset->onhand_qty }}</dd>
        <dt>Pending Testing Qty</dt>
        <dd>{{ $asset->pending_testing_qty }}</dd>
        <dt>Rma Qty</dt>
        <dd>{{ $asset->rma_qty }}</dd>
        <dt>Last Checkin</dt>
        <dd>{{ $asset->last_checkin }}</dd>
        <dt>Created At</dt>
        <dd>{{ $asset->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $asset->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
