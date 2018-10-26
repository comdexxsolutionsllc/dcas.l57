@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Tld Extension' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST" action="{!! route('tld_extensions.tld_extension.destroy', $tldExtension->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('tld_extensions.tld_extension.index') }}" class="btn btn-primary"
               title="Show All Tld Extension">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('tld_extensions.tld_extension.create') }}" class="btn btn-success"
               title="Create New Tld Extension">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('tld_extensions.tld_extension.edit', $tldExtension->id ) }}"
               class="btn btn-primary" title="Edit Tld Extension">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Tld Extension"
                    onclick="return confirm(&quot;Delete; Tld; Extension??&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Domain</dt>
        <dd>{{ $tldExtension->domain }}</dd>
        <dt>Description</dt>
        <dd>{{ $tldExtension->description }}</dd>
        <dt>Type</dt>
        <dd>{{ $tldExtension->type }}</dd>
        <dt>Created At</dt>
        <dd>{{ $tldExtension->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $tldExtension->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
