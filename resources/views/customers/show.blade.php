@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($customer->name) ? $customer->name : 'Customer' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST" action="{!! route('customers.customer.destroy', $customer->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('customers.customer.index') }}" class="btn btn-primary"
               title="Show All Customer">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('customers.customer.create') }}" class="btn btn-success"
               title="Create New Customer">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('customers.customer.edit', $customer->id ) }}" class="btn btn-primary"
               title="Edit Customer">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Customer"
                    onclick="return confirm(&quot;Delete; Customer??&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Account</dt>
        <dd>{{ optional($customer->account)->id }}</dd>
        <dt>Name</dt>
        <dd>{{ $customer->name }}</dd>
        <dt>Username</dt>
        <dd>{{ $customer->username }}</dd>
        <dt>Email</dt>
        <dd>{{ $customer->email }}</dd>
        <dt>Email Verified At</dt>
        <dd>{{ $customer->email_verified_at }}</dd>
        <dt>Password</dt>
        <dd>{{ $customer->password }}</dd>
        <dt>Stripe</dt>
        <dd>{{ optional($customer->stripe)->id }}</dd>
        <dt>Card Brand</dt>
        <dd>{{ $customer->card_brand }}</dd>
        <dt>Card Last Four</dt>
        <dd>{{ $customer->card_last_four }}</dd>
        <dt>Trial Ends At</dt>
        <dd>{{ $customer->trial_ends_at }}</dd>
        <dt>Cover</dt>
        <dd>{{ $customer->cover }}</dd>
        <dt>Avatar</dt>
        <dd>{{ $customer->avatar }}</dd>
        <dt>Remember Token</dt>
        <dd>{{ $customer->remember_token }}</dd>
        <dt>Deleted At</dt>
        <dd>{{ $customer->deleted_at }}</dd>
        <dt>Created At</dt>
        <dd>{{ $customer->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $customer->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
