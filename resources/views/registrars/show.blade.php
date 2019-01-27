@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($registrar->name) ? $registrar->name : 'Registrar' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST" action="{!! route('registrars.registrar.destroy', $registrar->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('registrars.registrar.index') }}" class="btn btn-primary"
               title="Show All Registrar">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('registrars.registrar.create') }}" class="btn btn-success"
               title="Create New Registrar">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('registrars.registrar.edit', $registrar->id ) }}" class="btn btn-primary"
               title="Edit Registrar">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Registrar"
                    onclick="return confirm(&quot;Delete; Registrar??&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Name</dt>
        <dd>{{ $registrar->name }}</dd>
        <dt>Url</dt>
        <dd>{{ $registrar->url }}</dd>
        <dt>Type</dt>
        <dd>{{ $registrar->type }}</dd>
        <dt>Created At</dt>
        <dd>{{ $registrar->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $registrar->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
