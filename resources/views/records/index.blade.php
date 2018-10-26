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
        <h4 class="mt-5 mb-5">Records</h4>
      </div>

      <div class="btn-group btn-group-sm pull-right" role="group">
        <a href="{{ route('records.record.create') }}" class="btn btn-success" title="Create New Record">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
      </div>

    </div>

    @if(count($records) == 0)
      <div class="panel-body text-center">
        <h4>No Records Available!</h4>
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
            @foreach($records as $record)
              <tr>
                <td>{{ optional($record->domain)->id }}</td>
                <td>{{ $record->name }}</td>
                <td>{{ $record->type }}</td>
                <td>{{ $record->content }}</td>
                <td>{{ $record->ttl }}</td>
                <td>{{ $record->priority }}</td>
                <td>{{ $record->change_date }}</td>
                <td>{{ $record->disabled }}</td>
                <td>{{ $record->ordername }}</td>
                <td>{{ $record->auth }}</td>

                <td>

                  <form method="POST" action="{!! route('records.record.destroy', $record->id) !!}"
                        accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}

                    <div class="btn-group btn-group-xs pull-right" role="group">
                      <a href="{{ route('records.record.show', $record->id ) }}"
                         class="btn btn-info" title="Show Record">
                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                      </a>
                      <a href="{{ route('records.record.edit', $record->id ) }}"
                         class="btn btn-primary" title="Edit Record">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                      </a>

                      <button type="submit" class="btn btn-danger" title="Delete Record"
                              onclick="return confirm(&quot;Delete; Record?;&quot;)">
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
        {!! $records->render() !!}
      </div>

    @endif

  </div>
@endsection
