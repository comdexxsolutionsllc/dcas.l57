@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4
              class="mt-5 mb-5">{{ isset($nameserverComment->name) ? $nameserverComment->name : 'Nameserver Comment' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST"
              action="{!! route('nameserver_comments.nameserver_comment.destroy', $nameserverComment->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('nameserver_comments.nameserver_comment.index') }}" class="btn btn-primary"
               title="Show All Nameserver Comment">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('nameserver_comments.nameserver_comment.create') }}" class="btn btn-success"
               title="Create New Nameserver Comment">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('nameserver_comments.nameserver_comment.edit', $nameserverComment->id ) }}"
               class="btn btn-primary" title="Edit Nameserver Comment">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Nameserver Comment"
                    onclick="return confirm(&quot;Delete; Nameserver; Comment??&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Domain</dt>
        <dd>{{ optional($nameserverComment->domain)->id }}</dd>
        <dt>Name</dt>
        <dd>{{ $nameserverComment->name }}</dd>
        <dt>Type</dt>
        <dd>{{ $nameserverComment->type }}</dd>
        <dt>Modified At</dt>
        <dd>{{ $nameserverComment->modified_at }}</dd>
        <dt>Account</dt>
        <dd>{{ $nameserverComment->account }}</dd>
        <dt>Comment</dt>
        <dd>{{ $nameserverComment->comment }}</dd>
        <dt>Created At</dt>
        <dd>{{ $nameserverComment->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $nameserverComment->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
