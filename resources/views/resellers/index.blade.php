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
        <h4 class="mt-5 mb-5">Resellers</h4>
      </div>

      <div class="btn-group btn-group-sm pull-right" role="group">
        <a href="{{ route('resellers.reseller.create') }}" class="btn btn-success" title="Create New Reseller">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
      </div>

    </div>

    @if(count($resellers) == 0)
      <div class="panel-body text-center">
        <h4>No Resellers Available!</h4>
      </div>
    @else
      <div class="panel-body panel-body-with-table">
        <div class="table-responsive">

          <table class="table table-striped ">
            <thead>
            <tr>
              <th>Account</th>
              <th>Company</th>
              <th>Expiry Date</th>
              <th>Salesrep</th>

              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($resellers as $reseller)
              <tr>
                <td>{{ optional($reseller->account)->id }}</td>
                <td>{{ optional($reseller->company)->name }}</td>
                <td>{{ $reseller->expiry_date }}</td>
                <td>{{ optional($reseller->salesrep)->id }}</td>

                <td>

                  <form method="POST"
                        action="{!! route('resellers.reseller.destroy', $reseller->id) !!}"
                        accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}

                    <div class="btn-group btn-group-xs pull-right" role="group">
                      <a href="{{ route('resellers.reseller.show', $reseller->id ) }}"
                         class="btn btn-info" title="Show Reseller">
                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                      </a>
                      <a href="{{ route('resellers.reseller.edit', $reseller->id ) }}"
                         class="btn btn-primary" title="Edit Reseller">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                      </a>

                      <button type="submit" class="btn btn-danger" title="Delete Reseller"
                              onclick="return confirm(&quot;Delete; Reseller?;&quot;)">
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
        {!! $resellers->render() !!}
      </div>

    @endif

  </div>
@endsection
