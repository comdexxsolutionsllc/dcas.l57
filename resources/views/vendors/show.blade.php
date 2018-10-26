@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($vendor->name) ? $vendor->name : 'Vendor' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST" action="{!! route('vendors.vendor.destroy', $vendor->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('vendors.vendor.index') }}" class="btn btn-primary" title="Show All Vendor">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('vendors.vendor.create') }}" class="btn btn-success"
               title="Create New Vendor">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('vendors.vendor.edit', $vendor->id ) }}" class="btn btn-primary"
               title="Edit Vendor">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Vendor"
                    onclick="return confirm(&quot;Delete; Vendor??&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Account</dt>
        <dd>{{ optional($vendor->account)->id }}</dd>
        <dt>Name</dt>
        <dd>{{ $vendor->name }}</dd>
        <dt>Username</dt>
        <dd>{{ $vendor->username }}</dd>
        <dt>Email</dt>
        <dd>{{ $vendor->email }}</dd>
        <dt>Email Verified At</dt>
        <dd>{{ $vendor->email_verified_at }}</dd>
        <dt>Password</dt>
        <dd>{{ $vendor->password }}</dd>
        <dt>Stripe</dt>
        <dd>{{ optional($vendor->stripe)->id }}</dd>
        <dt>Card Brand</dt>
        <dd>{{ $vendor->card_brand }}</dd>
        <dt>Card Last Four</dt>
        <dd>{{ $vendor->card_last_four }}</dd>
        <dt>Trial Ends At</dt>
        <dd>{{ $vendor->trial_ends_at }}</dd>
        <dt>Cover</dt>
        <dd>{{ $vendor->cover }}</dd>
        <dt>Avatar</dt>
        <dd>{{ $vendor->avatar }}</dd>
        <dt>Remember Token</dt>
        <dd>{{ $vendor->remember_token }}</dd>
        <dt>Deleted At</dt>
        <dd>{{ $vendor->deleted_at }}</dd>
        <dt>Created At</dt>
        <dd>{{ $vendor->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $vendor->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
