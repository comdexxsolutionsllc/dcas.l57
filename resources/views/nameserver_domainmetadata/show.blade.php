@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Nameserver Domainmetadata' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST"
              action="{!! route('nameserver_domainmetadatas.nameserver_domainmetadata.destroy', $nameserverDomainmetadata->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('nameserver_domainmetadatas.nameserver_domainmetadata.index') }}"
               class="btn btn-primary" title="Show All Nameserver Domainmetadata">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('nameserver_domainmetadatas.nameserver_domainmetadata.create') }}"
               class="btn btn-success" title="Create New Nameserver Domainmetadata">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a
              href="{{ route('nameserver_domainmetadatas.nameserver_domainmetadata.edit', $nameserverDomainmetadata->id ) }}"
              class="btn btn-primary" title="Edit Nameserver Domainmetadata">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Nameserver Domainmetadata"
                    onclick="return confirm(&quot;Delete; Nameserver; Domainmetadata??&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Domain</dt>
        <dd>{{ optional($nameserverDomainmetadata->domain)->id }}</dd>
        <dt>Kind</dt>
        <dd>{{ $nameserverDomainmetadata->kind }}</dd>
        <dt>Content</dt>
        <dd>{{ $nameserverDomainmetadata->content }}</dd>
        <dt>Created At</dt>
        <dd>{{ $nameserverDomainmetadata->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $nameserverDomainmetadata->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
