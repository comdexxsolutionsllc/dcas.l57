@extends('layouts.app')

@section('content')

  <div class="panel panel-default">

    <div class="panel-heading clearfix">

      <div class="pull-left">
        <h4 class="mt-5 mb-5">{{ !empty($nameserverDomain->name) ? $nameserverDomain->name : 'Nameserver Domain' }}</h4>
      </div>
      <div class="btn-group btn-group-sm pull-right" role="group">

        <a href="{{ route('nameserver_domains.nameserver_domain.index') }}" class="btn btn-primary"
           title="Show All Nameserver Domain">
          <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
        </a>

        <a href="{{ route('nameserver_domains.nameserver_domain.create') }}" class="btn btn-success"
           title="Create New Nameserver Domain">
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
            action="{{ route('nameserver_domains.nameserver_domain.update', $nameserverDomain->id) }}"
            id="edit_nameserver_domain_form" name="edit_nameserver_domain_form" accept-charset="UTF-8"
            class="form-horizontal">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PUT">
        @include ('nameserver_domains.form', [
                                    'nameserverDomain' => $nameserverDomain,
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
