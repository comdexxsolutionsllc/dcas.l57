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
        <h4 class="mt-5 mb-5">Operating Systems</h4>
      </div>

      <div class="btn-group btn-group-sm pull-right" role="group">
        <a href="{{ route('operating_systems.operating_system.create') }}" class="btn btn-success"
           title="Create New Operating System">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
      </div>

    </div>

    @if(count($operatingSystems) == 0)
      <div class="panel-body text-center">
        <h4>No Operating Systems Available!</h4>
      </div>
    @else
      <div class="panel-body panel-body-with-table">
        <div class="table-responsive">

          <table class="table table-striped ">
            <thead>
            <tr>
              <th>Architecture</th>
              <th>Type</th>
              <th>Name</th>

              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($operatingSystems as $operatingSystem)
              <tr>
                <td>{{ $operatingSystem->architecture }}</td>
                <td>{{ $operatingSystem->type }}</td>
                <td>{{ $operatingSystem->name }}</td>

                <td>

                  <form method="POST"
                        action="{!! route('operating_systems.operating_system.destroy', $operatingSystem->id) !!}"
                        accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}

                    <div class="btn-group btn-group-xs pull-right" role="group">
                      <a href="{{ route('operating_systems.operating_system.show', $operatingSystem->id ) }}"
                         class="btn btn-info" title="Show Operating System">
                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                      </a>
                      <a href="{{ route('operating_systems.operating_system.edit', $operatingSystem->id ) }}"
                         class="btn btn-primary" title="Edit Operating System">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                      </a>

                      <button type="submit" class="btn btn-danger" title="Delete Operating System"
                              onclick="return confirm(&quot;Delete; Operating; System?;&quot;)">
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
        {!! $operatingSystems->render() !!}
      </div>

    @endif

  </div>
@endsection
