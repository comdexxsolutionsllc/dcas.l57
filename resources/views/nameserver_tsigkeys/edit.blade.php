@extends('layouts.app')

@section('content')

  <div class="panel panel-default">

    <div class="panel-heading clearfix">

      <div class="pull-left">
        <h4
          class="mt-5 mb-5">{{ !empty($nameserverTsigkey->name) ? $nameserverTsigkey->name : 'Nameserver Tsigkey' }}</h4>
      </div>
      <div class="btn-group btn-group-sm pull-right" role="group">

        <a href="{{ route('nameserver_tsigkeys.nameserver_tsigkey.index') }}" class="btn btn-primary"
           title="Show All Nameserver Tsigkey">
          <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
        </a>

        <a href="{{ route('nameserver_tsigkeys.nameserver_tsigkey.create') }}" class="btn btn-success"
           title="Create New Nameserver Tsigkey">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>

      </div>
    </div>

    <div class="panel-body">

      @if ($errors->any())
        <ul class="alert alert-danger">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      @endif

      <form method="POST"
            action="{{ route('nameserver_tsigkeys.nameserver_tsigkey.update', $nameserverTsigkey->id) }}"
            id="edit_nameserver_tsigkey_form" name="edit_nameserver_tsigkey_form" accept-charset="UTF-8"
            class="form-horizontal">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PUT">
        @include ('nameserver_tsigkeys.form', [
                                    'nameserverTsigkey' => $nameserverTsigkey,
                                  ])

        <div class="form-group">
          <div class="col-md-offset-2 col-md-10">
            <input class="btn btn-primary" type="submit" value="Update">
          </div>
        </div>
      </form>

    </div>
  </div>

@endsection
