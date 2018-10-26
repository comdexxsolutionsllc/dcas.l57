@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Domainmetadata' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST"
              action="{!! route('domainmetadatas.domainmetadata.destroy', $domainmetadata->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('domainmetadatas.domainmetadata.index') }}" class="btn btn-primary"
               title="Show All Domainmetadata">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('domainmetadatas.domainmetadata.create') }}" class="btn btn-success"
               title="Create New Domainmetadata">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('domainmetadatas.domainmetadata.edit', $domainmetadata->id ) }}"
               class="btn btn-primary" title="Edit Domainmetadata">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Domainmetadata"
                    onclick="return confirm(&quot;Delete; Domainmetadata??&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Domain</dt>
        <dd>{{ optional($domainmetadata->domain)->id }}</dd>
        <dt>Kind</dt>
        <dd>{{ $domainmetadata->kind }}</dd>
        <dt>Content</dt>
        <dd>{{ $domainmetadata->content }}</dd>
        <dt>Created At</dt>
        <dd>{{ $domainmetadata->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $domainmetadata->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
