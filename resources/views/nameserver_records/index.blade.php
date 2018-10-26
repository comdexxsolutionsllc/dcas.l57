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
        <h4 class="mt-5 mb-5">Nameserver Records</h4>
      </div>

      <div class="btn-group btn-group-sm pull-right" role="group">
        <a href="{{ route('nameserver_records.nameserver_record.create') }}" class="btn btn-success"
           title="Create New Nameserver Record">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
      </div>

    </div>

    @if(count($nameserverRecords) == 0)
      <div class="panel-body text-center">
        <h4>No Nameserver Records Available!</h4>
      </div>
    @else
      <div class="panel-body panel-body-with-table">
        <div class="table-responsive">

          <table class="table table-striped ">
            <thead>
            <tr>
              <th>Domain</th>
              <th>Name</th>
              <th>Type</th>
              <th>Content</th>
              <th>Ttl</th>
              <th>Priority</th>
              <th>Change Date</th>
              <th>Disabled</th>
              <th>Ordername</th>
              <th>Auth</th>

              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($nameserverRecords as $nameserverRecord)
              <tr>
                <td>{{ optional($nameserverRecord->domain)->id }}</td>
                <td>{{ $nameserverRecord->name }}</td>
                <td>{{ $nameserverRecord->type }}</td>
                <td>{{ $nameserverRecord->content }}</td>
                <td>{{ $nameserverRecord->ttl }}</td>
                <td>{{ $nameserverRecord->priority }}</td>
                <td>{{ $nameserverRecord->change_date }}</td>
                <td>{{ $nameserverRecord->disabled }}</td>
                <td>{{ $nameserverRecord->ordername }}</td>
                <td>{{ $nameserverRecord->auth }}</td>

                <td>

                  <form method="POST"
                        action="{!! route('nameserver_records.nameserver_record.destroy', $nameserverRecord->id) !!}"
                        accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}

                    <div class="btn-group btn-group-xs pull-right" role="group">
                      <a href="{{ route('nameserver_records.nameserver_record.show', $nameserverRecord->id ) }}"
                         class="btn btn-info" title="Show Nameserver Record">
                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                      </a>
                      <a href="{{ route('nameserver_records.nameserver_record.edit', $nameserverRecord->id ) }}"
                         class="btn btn-primary" title="Edit Nameserver Record">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                      </a>

                      <button type="submit" class="btn btn-danger"
                              title="Delete Nameserver Record"
                              onclick="return confirm(&quot;Delete; Nameserver; Record?;&quot;)">
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
        {!! $nameserverRecords->render() !!}
      </div>

    @endif

  </div>
@endsection
