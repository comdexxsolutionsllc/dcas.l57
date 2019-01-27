@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4
              class="mt-5 mb-5">{{ isset($nameserverDomain->name) ? $nameserverDomain->name : 'Nameserver Domain' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST"
              action="{!! route('nameserver_domains.nameserver_domain.destroy', $nameserverDomain->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('nameserver_domains.nameserver_domain.index') }}" class="btn btn-primary"
               title="Show All Nameserver Domain">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('nameserver_domains.nameserver_domain.create') }}" class="btn btn-success"
               title="Create New Nameserver Domain">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('nameserver_domains.nameserver_domain.edit', $nameserverDomain->id ) }}"
               class="btn btn-primary" title="Edit Nameserver Domain">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Nameserver Domain"
                    onclick="return confirm(&quot;Delete; Nameserver; Domain??&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Name</dt>
        <dd>{{ $nameserverDomain->name }}</dd>
        <dt>Master</dt>
        <dd>{{ $nameserverDomain->master }}</dd>
        <dt>Last Check</dt>
        <dd>{{ $nameserverDomain->last_check }}</dd>
        <dt>Type</dt>
        <dd>{{ $nameserverDomain->type }}</dd>
        <dt>Notified Serial</dt>
        <dd>{{ $nameserverDomain->notified_serial }}</dd>
        <dt>Account</dt>
        <dd>{{ $nameserverDomain->account }}</dd>
        <dt>Created At</dt>
        <dd>{{ $nameserverDomain->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $nameserverDomain->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
