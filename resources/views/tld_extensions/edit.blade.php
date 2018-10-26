@extends('layouts.app')

@section('content')

  <div class="panel panel-default">

    <div class="panel-heading clearfix">

      <div class="pull-left">
        <h4 class="mt-5 mb-5">{{ !empty($title) ? $title : 'Tld Extension' }}</h4>
      </div>
      <div class="btn-group btn-group-sm pull-right" role="group">

        <a href="{{ route('tld_extensions.tld_extension.index') }}" class="btn btn-primary"
           title="Show All Tld Extension">
          <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
        </a>

        <a href="{{ route('tld_extensions.tld_extension.create') }}" class="btn btn-success"
           title="Create New Tld Extension">
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

      <form method="POST" action="{{ route('tld_extensions.tld_extension.update', $tldExtension->id) }}"
            id="edit_tld_extension_form" name="edit_tld_extension_form" accept-charset="UTF-8"
            class="form-horizontal">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PUT">
        @include ('tld_extensions.form', [
                                    'tldExtension' => $tldExtension,
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
