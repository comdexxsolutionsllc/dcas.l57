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
        <h4 class="mt-5 mb-5">Supermasters</h4>
      </div>

      <div class="btn-group btn-group-sm pull-right" role="group">
        <a href="{{ route('supermasters.supermaster.create') }}" class="btn btn-success"
           title="Create New Supermaster">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
      </div>

    </div>

    @if(count($supermasters) == 0)
      <div class="panel-body text-center">
        <h4>No Supermasters Available!</h4>
      </div>
    @else
      <div class="panel-body panel-body-with-table">
        <div class="table-responsive">

          <table class="table table-striped ">
            <thead>
            <tr>
              <th>Ip</th>
              <th>Nameserver</th>
              <th>Account</th>

              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($supermasters as $supermaster)
              <tr>
                <td>{{ $supermaster->ip }}</td>
                <td>{{ $supermaster->nameserver }}</td>
                <td>{{ $supermaster->account }}</td>

                <td>

                  <form method="POST"
                        action="{!! route('supermasters.supermaster.destroy', $supermaster->id) !!}"
                        accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}

                    <div class="btn-group btn-group-xs pull-right" role="group">
                      <a href="{{ route('supermasters.supermaster.show', $supermaster->id ) }}"
                         class="btn btn-info" title="Show Supermaster">
                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                      </a>
                      <a href="{{ route('supermasters.supermaster.edit', $supermaster->id ) }}"
                         class="btn btn-primary" title="Edit Supermaster">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                      </a>

                      <button type="submit" class="btn btn-danger" title="Delete Supermaster"
                              onclick="return confirm(&quot;Delete; Supermaster?;&quot;)">
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
        {!! $supermasters->render() !!}
      </div>

    @endif

  </div>
@endsection
