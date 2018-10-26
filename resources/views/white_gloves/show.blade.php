@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($whiteGlove->name) ? $whiteGlove->name : 'White Glove' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST" action="{!! route('white_gloves.white_glove.destroy', $whiteGlove->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('white_gloves.white_glove.index') }}" class="btn btn-primary"
               title="Show All White Glove">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('white_gloves.white_glove.create') }}" class="btn btn-success"
               title="Create New White Glove">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('white_gloves.white_glove.edit', $whiteGlove->id ) }}" class="btn btn-primary"
               title="Edit White Glove">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete White Glove"
                    onclick="return confirm(&quot;Delete; White; Glove??&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Account</dt>
        <dd>{{ optional($whiteGlove->account)->id }}</dd>
        <dt>Name</dt>
        <dd>{{ $whiteGlove->name }}</dd>
        <dt>Username</dt>
        <dd>{{ $whiteGlove->username }}</dd>
        <dt>Email</dt>
        <dd>{{ $whiteGlove->email }}</dd>
        <dt>Email Verified At</dt>
        <dd>{{ $whiteGlove->email_verified_at }}</dd>
        <dt>Password</dt>
        <dd>{{ $whiteGlove->password }}</dd>
        <dt>Stripe</dt>
        <dd>{{ optional($whiteGlove->stripe)->id }}</dd>
        <dt>Card Brand</dt>
        <dd>{{ $whiteGlove->card_brand }}</dd>
        <dt>Card Last Four</dt>
        <dd>{{ $whiteGlove->card_last_four }}</dd>
        <dt>Trial Ends At</dt>
        <dd>{{ $whiteGlove->trial_ends_at }}</dd>
        <dt>Cover</dt>
        <dd>{{ $whiteGlove->cover }}</dd>
        <dt>Avatar</dt>
        <dd>{{ $whiteGlove->avatar }}</dd>
        <dt>Remember Token</dt>
        <dd>{{ $whiteGlove->remember_token }}</dd>
        <dt>Deleted At</dt>
        <dd>{{ $whiteGlove->deleted_at }}</dd>
        <dt>Created At</dt>
        <dd>{{ $whiteGlove->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $whiteGlove->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
