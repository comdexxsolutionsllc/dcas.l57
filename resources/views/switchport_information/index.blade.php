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
        <h4 class="mt-5 mb-5">Switchport Informations</h4>
      </div>

      <div class="btn-group btn-group-sm pull-right" role="group">
        <a href="{{ route('switchport_informations.switchport_information.create') }}" class="btn btn-success"
           title="Create New Switchport Information">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
      </div>

    </div>

    @if(count($switchportInformations) == 0)
      <div class="panel-body text-center">
        <h4>No Switchport Informations Available!</h4>
      </div>
    @else
      <div class="panel-body panel-body-with-table">
        <div class="table-responsive">

          <table class="table table-striped ">
            <thead>
            <tr>
              <th>Network Device</th>
              <th>Switchport Number</th>
              <th>Category</th>
              <th>Port Speed</th>
              <th>Connection Type</th>
              <th>Poe Status</th>
              <th>Stackable Status</th>
              <th>Duplex Type</th>

              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($switchportInformations as $switchportInformation)
              <tr>
                <td>{{ optional($switchportInformation->networkDevice)->asset_number }}</td>
                <td>{{ $switchportInformation->switchport_number }}</td>
                <td>{{ $switchportInformation->category }}</td>
                <td>{{ $switchportInformation->port_speed }}</td>
                <td>{{ $switchportInformation->connection_type }}</td>
                <td>{{ $switchportInformation->poe_status }}</td>
                <td>{{ $switchportInformation->stackable_status }}</td>
                <td>{{ $switchportInformation->duplex_type }}</td>

                <td>

                  <form method="POST"
                        action="{!! route('switchport_informations.switchport_information.destroy', $switchportInformation->id) !!}"
                        accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}

                    <div class="btn-group btn-group-xs pull-right" role="group">
                      <a
                        href="{{ route('switchport_informations.switchport_information.show', $switchportInformation->id ) }}"
                        class="btn btn-info" title="Show Switchport Information">
                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                      </a>
                      <a
                        href="{{ route('switchport_informations.switchport_information.edit', $switchportInformation->id ) }}"
                        class="btn btn-primary" title="Edit Switchport Information">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                      </a>

                      <button type="submit" class="btn btn-danger"
                              title="Delete Switchport Information"
                              onclick="return confirm(&quot;Delete; Switchport; Information?;&quot;)">
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
        {!! $switchportInformations->render() !!}
      </div>

    @endif

  </div>
@endsection
