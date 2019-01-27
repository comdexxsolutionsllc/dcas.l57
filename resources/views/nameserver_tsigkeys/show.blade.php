@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4
              class="mt-5 mb-5">{{ isset($nameserverTsigkey->name) ? $nameserverTsigkey->name : 'Nameserver Tsigkey' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST"
              action="{!! route('nameserver_tsigkeys.nameserver_tsigkey.destroy', $nameserverTsigkey->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('nameserver_tsigkeys.nameserver_tsigkey.index') }}" class="btn btn-primary"
               title="Show All Nameserver Tsigkey">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('nameserver_tsigkeys.nameserver_tsigkey.create') }}" class="btn btn-success"
               title="Create New Nameserver Tsigkey">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('nameserver_tsigkeys.nameserver_tsigkey.edit', $nameserverTsigkey->id ) }}"
               class="btn btn-primary" title="Edit Nameserver Tsigkey">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Nameserver Tsigkey"
                    onclick="return confirm(&quot;Delete; Nameserver; Tsigkey??&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Name</dt>
        <dd>{{ $nameserverTsigkey->name }}</dd>
        <dt>Algorithm</dt>
        <dd>{{ $nameserverTsigkey->algorithm }}</dd>
        <dt>Secret</dt>
        <dd>{{ $nameserverTsigkey->secret }}</dd>
        <dt>Created At</dt>
        <dd>{{ $nameserverTsigkey->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $nameserverTsigkey->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
