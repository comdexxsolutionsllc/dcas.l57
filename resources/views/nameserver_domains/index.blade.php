@extends('layouts.app')

@section('content')

  @if(Session::has('success_message'))
    <div class="alert alert-success">
      <span class="glyphicon glyphicon-ok"></span>
      {!! session('success_message') !!}

      <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
      </button>

    </div>
  @endif

  <div class="panel panel-default">

    <div class="panel-heading clearfix">

      <div class="pull-left">
        <h4 class="mt-5 mb-5">Nameserver Domains</h4>
      </div>

      <div class="btn-group btn-group-sm pull-right" role="group">
        <a href="{{ route('nameserver_domains.nameserver_domain.create') }}" class="btn btn-success"
           title="Create New Nameserver Domain">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
      </div>

    </div>

    @if(count($nameserverDomains) == 0)
      <div class="panel-body text-center">
        <h4>No Nameserver Domains Available!</h4>
      </div>
    @else
      <div class="panel-body panel-body-with-table">
        <div class="table-responsive">

          <table class="table table-striped ">
            <thead>
            <tr>
              <th>Name</th>
              <th>Master</th>
              <th>Last Check</th>
              <th>Type</th>
              <th>Notified Serial</th>
              <th>Account</th>

              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($nameserverDomains as $nameserverDomain)
              <tr>
                <td>{{ $nameserverDomain->name }}</td>
                <td>{{ $nameserverDomain->master }}</td>
                <td>{{ $nameserverDomain->last_check }}</td>
                <td>{{ $nameserverDomain->type }}</td>
                <td>{{ $nameserverDomain->notified_serial }}</td>
                <td>{{ $nameserverDomain->account }}</td>

                <td>

                  <form method="POST"
                        action="{!! route('nameserver_domains.nameserver_domain.destroy', $nameserverDomain->id) !!}"
                        accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}

                    <div class="btn-group btn-group-xs pull-right" role="group">
                      <a href="{{ route('nameserver_domains.nameserver_domain.show', $nameserverDomain->id ) }}"
                         class="btn btn-info" title="Show Nameserver Domain">
                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                      </a>
                      <a href="{{ route('nameserver_domains.nameserver_domain.edit', $nameserverDomain->id ) }}"
                         class="btn btn-primary" title="Edit Nameserver Domain">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                      </a>

                      <button type="submit" class="btn btn-danger"
                              title="Delete Nameserver Domain"
                              onclick="return confirm(&quot;Delete; Nameserver; Domain?;&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                      </button>
                    </div>

                  </form>

                </td>
              </tr>
            @endforeach
            </tbody>
          </table>

        </div>
      </div>

      <div class="panel-footer">
        {!! $nameserverDomains->render() !!}
      </div>

    @endif

  </div>
@endsection
