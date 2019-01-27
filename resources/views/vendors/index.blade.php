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
        <h4 class="mt-5 mb-5">Vendors</h4>
      </div>

      <div class="btn-group btn-group-sm pull-right" role="group">
        <a href="{{ route('vendors.vendor.create') }}" class="btn btn-success" title="Create New Vendor">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
      </div>

    </div>

    @if(count($vendors) == 0)
      <div class="panel-body text-center">
        <h4>No Vendors Available!</h4>
      </div>
    @else
      <div class="panel-body panel-body-with-table">
        <div class="table-responsive">

          <table class="table table-striped ">
            <thead>
            <tr>
              <th>Account</th>
              <th>Name</th>
              <th>Username</th>
              <th>Email</th>
              <th>Email Verified At</th>
              <th>Password</th>
              <th>Stripe</th>
              <th>Card Brand</th>
              <th>Card Last Four</th>
              <th>Trial Ends At</th>
              <th>Cover</th>
              <th>Remember Token</th>

              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($vendors as $vendor)
              <tr>
                <td>{{ optional($vendor->account)->id }}</td>
                <td>{{ $vendor->name }}</td>
                <td>{{ $vendor->username }}</td>
                <td>{{ $vendor->email }}</td>
                <td>{{ $vendor->email_verified_at }}</td>
                <td>{{ $vendor->password }}</td>
                <td>{{ optional($vendor->stripe)->id }}</td>
                <td>{{ $vendor->card_brand }}</td>
                <td>{{ $vendor->card_last_four }}</td>
                <td>{{ $vendor->trial_ends_at }}</td>
                <td>{{ $vendor->cover }}</td>
                <td>{{ $vendor->remember_token }}</td>

                <td>

                  <form method="POST" action="{!! route('vendors.vendor.destroy', $vendor->id) !!}"
                        accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}

                    <div class="btn-group btn-group-xs pull-right" role="group">
                      <a href="{{ route('vendors.vendor.show', $vendor->id ) }}"
                         class="btn btn-info" title="Show Vendor">
                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                      </a>
                      <a href="{{ route('vendors.vendor.edit', $vendor->id ) }}"
                         class="btn btn-primary" title="Edit Vendor">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                      </a>

                      <button type="submit" class="btn btn-danger" title="Delete Vendor"
                              onclick="return confirm(&quot;Delete; Vendor?;&quot;)">
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
        {!! $vendors->render() !!}
      </div>

    @endif

  </div>
@endsection
