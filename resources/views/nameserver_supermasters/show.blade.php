@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Nameserver Supermaster' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST"
              action="{!! route('nameserver_supermasters.nameserver_supermaster.destroy', $nameserverSupermaster->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('nameserver_supermasters.nameserver_supermaster.index') }}"
               class="btn btn-primary" title="Show All Nameserver Supermaster">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('nameserver_supermasters.nameserver_supermaster.create') }}"
               class="btn btn-success" title="Create New Nameserver Supermaster">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('nameserver_supermasters.nameserver_supermaster.edit', $nameserverSupermaster->id ) }}"
               class="btn btn-primary" title="Edit Nameserver Supermaster">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Nameserver Supermaster"
                    onclick="return confirm(&quot;Delete; Nameserver; Supermaster??&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Ip</dt>
        <dd>{{ $nameserverSupermaster->ip }}</dd>
        <dt>Nameserver</dt>
        <dd>{{ $nameserverSupermaster->nameserver }}</dd>
        <dt>Account</dt>
        <dd>{{ $nameserverSupermaster->account }}</dd>
        <dt>Created At</dt>
        <dd>{{ $nameserverSupermaster->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $nameserverSupermaster->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
