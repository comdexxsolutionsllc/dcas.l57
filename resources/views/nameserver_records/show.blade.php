@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4
              class="mt-5 mb-5">{{ isset($nameserverRecord->name) ? $nameserverRecord->name : 'Nameserver Record' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST"
              action="{!! route('nameserver_records.nameserver_record.destroy', $nameserverRecord->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('nameserver_records.nameserver_record.index') }}" class="btn btn-primary"
               title="Show All Nameserver Record">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('nameserver_records.nameserver_record.create') }}" class="btn btn-success"
               title="Create New Nameserver Record">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('nameserver_records.nameserver_record.edit', $nameserverRecord->id ) }}"
               class="btn btn-primary" title="Edit Nameserver Record">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Nameserver Record"
                    onclick="return confirm(&quot;Delete; Nameserver; Record??&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Domain</dt>
        <dd>{{ optional($nameserverRecord->domain)->id }}</dd>
        <dt>Name</dt>
        <dd>{{ $nameserverRecord->name }}</dd>
        <dt>Type</dt>
        <dd>{{ $nameserverRecord->type }}</dd>
        <dt>Content</dt>
        <dd>{{ $nameserverRecord->content }}</dd>
        <dt>Ttl</dt>
        <dd>{{ $nameserverRecord->ttl }}</dd>
        <dt>Priority</dt>
        <dd>{{ $nameserverRecord->priority }}</dd>
        <dt>Change Date</dt>
        <dd>{{ $nameserverRecord->change_date }}</dd>
        <dt>Disabled</dt>
        <dd>{{ $nameserverRecord->disabled }}</dd>
        <dt>Ordername</dt>
        <dd>{{ $nameserverRecord->ordername }}</dd>
        <dt>Auth</dt>
        <dd>{{ $nameserverRecord->auth }}</dd>
        <dt>Created At</dt>
        <dd>{{ $nameserverRecord->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $nameserverRecord->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
