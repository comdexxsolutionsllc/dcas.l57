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
        <h4 class="mt-5 mb-5">Coupons</h4>
      </div>

      <div class="btn-group btn-group-sm pull-right" role="group">
        <a href="{{ route('coupons.coupon.create') }}" class="btn btn-success" title="Create New Coupon">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
      </div>

    </div>

    @if(count($coupons) == 0)
      <div class="panel-body text-center">
        <h4>No Coupons Available!</h4>
      </div>
    @else
      <div class="panel-body panel-body-with-table">
        <div class="table-responsive">

          <table class="table table-striped ">
            <thead>
            <tr>
              <th>Type</th>
              <th>Code</th>
              <th>Value</th>
              <th>Minimum Amount</th>
              <th>Maximum Discount</th>
              <th>Valid Start Time</th>
              <th>Valid End Time</th>

              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($coupons as $coupon)
              <tr>
                <td>{{ $coupon->type }}</td>
                <td>{{ $coupon->code }}</td>
                <td>{{ $coupon->value }}</td>
                <td>{{ $coupon->minimum_amount }}</td>
                <td>{{ $coupon->maximum_discount }}</td>
                <td>{{ $coupon->valid_start_time }}</td>
                <td>{{ $coupon->valid_end_time }}</td>

                <td>

                  <form method="POST" action="{!! route('coupons.coupon.destroy', $coupon->id) !!}"
                        accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}

                    <div class="btn-group btn-group-xs pull-right" role="group">
                      <a href="{{ route('coupons.coupon.show', $coupon->id ) }}"
                         class="btn btn-info" title="Show Coupon">
                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                      </a>
                      <a href="{{ route('coupons.coupon.edit', $coupon->id ) }}"
                         class="btn btn-primary" title="Edit Coupon">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                      </a>

                      <button type="submit" class="btn btn-danger" title="Delete Coupon"
                              onclick="return confirm(&quot;Delete; Coupon?;&quot;)">
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
        {!! $coupons->render() !!}
      </div>

    @endif

  </div>
@endsection
