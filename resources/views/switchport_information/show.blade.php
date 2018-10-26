@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Switchport Information' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST"
              action="{!! route('switchport_informations.switchport_information.destroy', $switchportInformation->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('switchport_informations.switchport_information.index') }}"
               class="btn btn-primary" title="Show All Switchport Information">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('switchport_informations.switchport_information.create') }}"
               class="btn btn-success" title="Create New Switchport Information">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('switchport_informations.switchport_information.edit', $switchportInformation->id ) }}"
               class="btn btn-primary" title="Edit Switchport Information">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Switchport Information"
                    onclick="return confirm(&quot;Delete; Switchport; Information??&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Network Device</dt>
        <dd>{{ optional($switchportInformation->networkDevice)->asset_number }}</dd>
        <dt>Switchport Number</dt>
        <dd>{{ $switchportInformation->switchport_number }}</dd>
        <dt>Category</dt>
        <dd>{{ $switchportInformation->category }}</dd>
        <dt>Port Speed</dt>
        <dd>{{ $switchportInformation->port_speed }}</dd>
        <dt>Connection Type</dt>
        <dd>{{ $switchportInformation->connection_type }}</dd>
        <dt>Poe Status</dt>
        <dd>{{ $switchportInformation->poe_status }}</dd>
        <dt>Stackable Status</dt>
        <dd>{{ $switchportInformation->stackable_status }}</dd>
        <dt>Duplex Type</dt>
        <dd>{{ $switchportInformation->duplex_type }}</dd>
        <dt>Created At</dt>
        <dd>{{ $switchportInformation->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $switchportInformation->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
