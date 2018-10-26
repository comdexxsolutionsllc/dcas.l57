@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($tsigkey->name) ? $tsigkey->name : 'Tsigkey' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST" action="{!! route('tsigkeys.tsigkey.destroy', $tsigkey->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('tsigkeys.tsigkey.index') }}" class="btn btn-primary"
               title="Show All Tsigkey">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('tsigkeys.tsigkey.create') }}" class="btn btn-success"
               title="Create New Tsigkey">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('tsigkeys.tsigkey.edit', $tsigkey->id ) }}" class="btn btn-primary"
               title="Edit Tsigkey">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Tsigkey"
                    onclick="return confirm(&quot;Delete; Tsigkey??&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Name</dt>
        <dd>{{ $tsigkey->name }}</dd>
        <dt>Algorithm</dt>
        <dd>{{ $tsigkey->algorithm }}</dd>
        <dt>Secret</dt>
        <dd>{{ $tsigkey->secret }}</dd>
        <dt>Created At</dt>
        <dd>{{ $tsigkey->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $tsigkey->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
