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
        <h4 class="mt-5 mb-5">Registrars</h4>
      </div>

      <div class="btn-group btn-group-sm pull-right" role="group">
        <a href="{{ route('registrars.registrar.create') }}" class="btn btn-success"
           title="Create New Registrar">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
      </div>

    </div>

    @if(count($registrars) == 0)
      <div class="panel-body text-center">
        <h4>No Registrars Available!</h4>
      </div>
    @else
      <div class="panel-body panel-body-with-table">
        <div class="table-responsive">

          <table class="table table-striped ">
            <thead>
            <tr>
              <th>Name</th>
              <th>Url</th>
              <th>Type</th>

              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($registrars as $registrar)
              <tr>
                <td>{{ $registrar->name }}</td>
                <td>{{ $registrar->url }}</td>
                <td>{{ $registrar->type }}</td>

                <td>

                  <form method="POST"
                        action="{!! route('registrars.registrar.destroy', $registrar->id) !!}"
                        accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}

                    <div class="btn-group btn-group-xs pull-right" role="group">
                      <a href="{{ route('registrars.registrar.show', $registrar->id ) }}"
                         class="btn btn-info" title="Show Registrar">
                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                      </a>
                      <a href="{{ route('registrars.registrar.edit', $registrar->id ) }}"
                         class="btn btn-primary" title="Edit Registrar">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                      </a>

                      <button type="submit" class="btn btn-danger" title="Delete Registrar"
                              onclick="return confirm(&quot;Delete; Registrar?;&quot;)">
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
        {!! $registrars->render() !!}
      </div>

    @endif

  </div>
@endsection
