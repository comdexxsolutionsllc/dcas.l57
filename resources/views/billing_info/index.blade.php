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
        <h4 class="mt-5 mb-5">Billing Infos</h4>
      </div>

      <div class="btn-group btn-group-sm pull-right" role="group">
        <a href="{{ route('billing_infos.billing_info.create') }}" class="btn btn-success"
           title="Create New Billing Info">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
      </div>

    </div>

    @if(count($billingInfos) == 0)
      <div class="panel-body text-center">
        <h4>No Billing Infos Available!</h4>
      </div>
    @else
      <div class="panel-body panel-body-with-table">
        <div class="table-responsive">

          <table class="table table-striped ">
            <thead>
            <tr>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Company</th>
              <th>Address 1</th>
              <th>Address 2</th>
              <th>City</th>
              <th>State</th>
              <th>Postal Code</th>
              <th>Country</th>
              <th>Phone Number</th>
              <th>Phone Type</th>

              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($billingInfos as $billingInfo)
              <tr>
                <td>{{ $billingInfo->first_name }}</td>
                <td>{{ $billingInfo->last_name }}</td>
                <td>{{ $billingInfo->company }}</td>
                <td>{{ $billingInfo->address_1 }}</td>
                <td>{{ $billingInfo->address_2 }}</td>
                <td>{{ $billingInfo->city }}</td>
                <td>{{ $billingInfo->state }}</td>
                <td>{{ $billingInfo->postal_code }}</td>
                <td>{{ $billingInfo->country }}</td>
                <td>{{ $billingInfo->phone_number }}</td>
                <td>{{ $billingInfo->phone_type }}</td>

                <td>

                  <form method="POST"
                        action="{!! route('billing_infos.billing_info.destroy', $billingInfo->id) !!}"
                        accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}

                    <div class="btn-group btn-group-xs pull-right" role="group">
                      <a href="{{ route('billing_infos.billing_info.show', $billingInfo->id ) }}"
                         class="btn btn-info" title="Show Billing Info">
                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                      </a>
                      <a href="{{ route('billing_infos.billing_info.edit', $billingInfo->id ) }}"
                         class="btn btn-primary" title="Edit Billing Info">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                      </a>

                      <button type="submit" class="btn btn-danger" title="Delete Billing Info"
                              onclick="return confirm(&quot;Delete; Billing; Info?;&quot;)">
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
        {!! $billingInfos->render() !!}
      </div>

    @endif

  </div>
@endsection
