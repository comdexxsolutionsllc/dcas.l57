@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Nameserver Cryptokey' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST"
              action="{!! route('nameserver_cryptokeys.nameserver_cryptokey.destroy', $nameserverCryptokey->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('nameserver_cryptokeys.nameserver_cryptokey.index') }}"
               class="btn btn-primary" title="Show All Nameserver Cryptokey">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('nameserver_cryptokeys.nameserver_cryptokey.create') }}"
               class="btn btn-success" title="Create New Nameserver Cryptokey">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('nameserver_cryptokeys.nameserver_cryptokey.edit', $nameserverCryptokey->id ) }}"
               class="btn btn-primary" title="Edit Nameserver Cryptokey">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Nameserver Cryptokey"
                    onclick="return confirm(&quot;Delete; Nameserver; Cryptokey??&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Domain</dt>
        <dd>{{ optional($nameserverCryptokey->domain)->id }}</dd>
        <dt>Flags</dt>
        <dd>{{ $nameserverCryptokey->flags }}</dd>
        <dt>Active</dt>
        <dd>{{ ($nameserverCryptokey->active) ? 'Yes' : 'No' }}</dd>
        <dt>Content</dt>
        <dd>{{ $nameserverCryptokey->content }}</dd>
        <dt>Created At</dt>
        <dd>{{ $nameserverCryptokey->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $nameserverCryptokey->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
