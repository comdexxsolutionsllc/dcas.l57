@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Billing Info' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST" action="{!! route('billing_infos.billing_info.destroy', $billingInfo->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('billing_infos.billing_info.index') }}" class="btn btn-primary"
               title="Show All Billing Info">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('billing_infos.billing_info.create') }}" class="btn btn-success"
               title="Create New Billing Info">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('billing_infos.billing_info.edit', $billingInfo->id ) }}"
               class="btn btn-primary" title="Edit Billing Info">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Billing Info"
                    onclick="return confirm(&quot;Delete; Billing; Info??&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>First Name</dt>
        <dd>{{ $billingInfo->first_name }}</dd>
        <dt>Last Name</dt>
        <dd>{{ $billingInfo->last_name }}</dd>
        <dt>Company</dt>
        <dd>{{ $billingInfo->company }}</dd>
        <dt>Address 1</dt>
        <dd>{{ $billingInfo->address_1 }}</dd>
        <dt>Address 2</dt>
        <dd>{{ $billingInfo->address_2 }}</dd>
        <dt>City</dt>
        <dd>{{ $billingInfo->city }}</dd>
        <dt>State</dt>
        <dd>{{ $billingInfo->state }}</dd>
        <dt>Postal Code</dt>
        <dd>{{ $billingInfo->postal_code }}</dd>
        <dt>Country</dt>
        <dd>{{ $billingInfo->country }}</dd>
        <dt>Phone Number</dt>
        <dd>{{ $billingInfo->phone_number }}</dd>
        <dt>Phone Type</dt>
        <dd>{{ $billingInfo->phone_type }}</dd>
        <dt>Created At</dt>
        <dd>{{ $billingInfo->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $billingInfo->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
