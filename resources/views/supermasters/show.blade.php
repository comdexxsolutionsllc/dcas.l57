@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Supermaster' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST" action="{!! route('supermasters.supermaster.destroy', $supermaster->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('supermasters.supermaster.index') }}" class="btn btn-primary"
               title="Show All Supermaster">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('supermasters.supermaster.create') }}" class="btn btn-success"
               title="Create New Supermaster">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('supermasters.supermaster.edit', $supermaster->id ) }}"
               class="btn btn-primary" title="Edit Supermaster">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Supermaster"
                    onclick="return confirm(&quot;Delete; Supermaster??&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Ip</dt>
        <dd>{{ $supermaster->ip }}</dd>
        <dt>Nameserver</dt>
        <dd>{{ $supermaster->nameserver }}</dd>
        <dt>Account</dt>
        <dd>{{ $supermaster->account }}</dd>
        <dt>Created At</dt>
        <dd>{{ $supermaster->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $supermaster->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
