@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Domain' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST" action="{!! route('domains.domain.destroy', $domain->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('domains.domain.index') }}" class="btn btn-primary" title="Show All Domain">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('domains.domain.create') }}" class="btn btn-success"
               title="Create New Domain">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('domains.domain.edit', $domain->id ) }}" class="btn btn-primary"
               title="Edit Domain">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Domain"
                    onclick="return confirm(&quot;Delete; Domain??&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Account</dt>
        <dd>{{ optional($domain->account)->id }}</dd>
        <dt>Registrar</dt>
        <dd>{{ optional($domain->registrar)->name }}</dd>
        <dt>Domain Name</dt>
        <dd>{{ $domain->domain_name }}</dd>
        <dt>Active</dt>
        <dd>{{ ($domain->active) ? 'Yes' : 'No' }}</dd>
        <dt>Monitor</dt>
        <dd>{{ ($domain->monitor) ? 'Yes' : 'No' }}</dd>
        <dt>Whois Record Updated</dt>
        <dd>{{ $domain->whois_record_updated }}</dd>
        <dt>Whois Record Created</dt>
        <dd>{{ $domain->whois_record_created }}</dd>
        <dt>Whois Record Expiry</dt>
        <dd>{{ $domain->whois_record_expiry }}</dd>
        <dt>Created At</dt>
        <dd>{{ $domain->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $domain->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
