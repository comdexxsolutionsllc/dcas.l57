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
        <h4 class="mt-5 mb-5">Sales Reps</h4>
      </div>

      <div class="btn-group btn-group-sm pull-right" role="group">
        <a href="{{ route('sales_reps.sales_rep.create') }}" class="btn btn-success"
           title="Create New Sales Rep">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
      </div>

    </div>

    @if(count($salesReps) == 0)
      <div class="panel-body text-center">
        <h4>No Sales Reps Available!</h4>
      </div>
    @else
      <div class="panel-body panel-body-with-table">
        <div class="table-responsive">

          <table class="table table-striped ">
            <thead>
            <tr>
              <th>Employee</th>
              <th>Company</th>

              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($salesReps as $salesRep)
              <tr>
                <td>{{ optional($salesRep->employee)->name }}</td>
                <td>{{ optional($salesRep->company)->name }}</td>

                <td>

                  <form method="POST"
                        action="{!! route('sales_reps.sales_rep.destroy', $salesRep->id) !!}"
                        accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}

                    <div class="btn-group btn-group-xs pull-right" role="group">
                      <a href="{{ route('sales_reps.sales_rep.show', $salesRep->id ) }}"
                         class="btn btn-info" title="Show Sales Rep">
                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                      </a>
                      <a href="{{ route('sales_reps.sales_rep.edit', $salesRep->id ) }}"
                         class="btn btn-primary" title="Edit Sales Rep">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                      </a>

                      <button type="submit" class="btn btn-danger" title="Delete Sales Rep"
                              onclick="return confirm(&quot;Delete; Sales; Rep?;&quot;)">
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
        {!! $salesReps->render() !!}
      </div>

    @endif

  </div>
@endsection
