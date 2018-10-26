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
        <h4 class="mt-5 mb-5">Domains</h4>
      </div>

      <div class="btn-group btn-group-sm pull-right" role="group">
        <a href="{{ route('domains.domain.create') }}" class="btn btn-success" title="Create New Domain">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
      </div>

    </div>

    @if(count($domains) == 0)
      <div class="panel-body text-center">
        <h4>No Domains Available!</h4>
      </div>
    @else
      <div class="panel-body panel-body-with-table">
        <div class="table-responsive">

          <table class="table table-striped ">
            <thead>
            <tr>
              <th>Account</th>
              <th>Registrar</th>
              <th>Domain Name</th>
              <th>Active</th>
              <th>Monitor</th>
              <th>Whois Record Updated</th>
              <th>Whois Record Created</th>
              <th>Whois Record Expiry</th>

              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($domains as $domain)
              <tr>
                <td>{{ optional($domain->account)->id }}</td>
                <td>{{ optional($domain->registrar)->name }}</td>
                <td>{{ $domain->domain_name }}</td>
                <td>{{ ($domain->active) ? 'Yes' : 'No' }}</td>
                <td>{{ ($domain->monitor) ? 'Yes' : 'No' }}</td>
                <td>{{ $domain->whois_record_updated }}</td>
                <td>{{ $domain->whois_record_created }}</td>
                <td>{{ $domain->whois_record_expiry }}</td>

                <td>

                  <form method="POST" action="{!! route('domains.domain.destroy', $domain->id) !!}"
                        accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}

                    <div class="btn-group btn-group-xs pull-right" role="group">
                      <a href="{{ route('domains.domain.show', $domain->id ) }}"
                         class="btn btn-info" title="Show Domain">
                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                      </a>
                      <a href="{{ route('domains.domain.edit', $domain->id ) }}"
                         class="btn btn-primary" title="Edit Domain">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                      </a>

                      <button type="submit" class="btn btn-danger" title="Delete Domain"
                              onclick="return confirm(&quot;Delete; Domain?;&quot;)">
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
        {!! $domains->render() !!}
      </div>

    @endif

  </div>
@endsection
