@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Cryptokey' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST" action="{!! route('cryptokeys.cryptokey.destroy', $cryptokey->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('cryptokeys.cryptokey.index') }}" class="btn btn-primary"
               title="Show All Cryptokey">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('cryptokeys.cryptokey.create') }}" class="btn btn-success"
               title="Create New Cryptokey">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('cryptokeys.cryptokey.edit', $cryptokey->id ) }}" class="btn btn-primary"
               title="Edit Cryptokey">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Cryptokey"
                    onclick="return confirm(&quot;Delete; Cryptokey??&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Domain</dt>
        <dd>{{ optional($cryptokey->domain)->id }}</dd>
        <dt>Flags</dt>
        <dd>{{ $cryptokey->flags }}</dd>
        <dt>Active</dt>
        <dd>{{ ($cryptokey->active) ? 'Yes' : 'No' }}</dd>
        <dt>Content</dt>
        <dd>{{ $cryptokey->content }}</dd>
        <dt>Created At</dt>
        <dd>{{ $cryptokey->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $cryptokey->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
