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
        <h4 class="mt-5 mb-5">White Gloves</h4>
      </div>

      <div class="btn-group btn-group-sm pull-right" role="group">
        <a href="{{ route('white_gloves.white_glove.create') }}" class="btn btn-success"
           title="Create New White Glove">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
      </div>

    </div>

    @if(count($whiteGloves) == 0)
      <div class="panel-body text-center">
        <h4>No White Gloves Available!</h4>
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
            @foreach($whiteGloves as $whiteGlove)
              <tr>
                <td>{{ optional($whiteGlove->account)->id }}</td>
                <td>{{ $whiteGlove->name }}</td>
                <td>{{ $whiteGlove->username }}</td>
                <td>{{ $whiteGlove->email }}</td>
                <td>{{ $whiteGlove->email_verified_at }}</td>
                <td>{{ $whiteGlove->password }}</td>
                <td>{{ optional($whiteGlove->stripe)->id }}</td>
                <td>{{ $whiteGlove->card_brand }}</td>
                <td>{{ $whiteGlove->card_last_four }}</td>
                <td>{{ $whiteGlove->trial_ends_at }}</td>
                <td>{{ $whiteGlove->cover }}</td>
                <td>{{ $whiteGlove->remember_token }}</td>

                <td>

                  <form method="POST"
                        action="{!! route('white_gloves.white_glove.destroy', $whiteGlove->id) !!}"
                        accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}

                    <div class="btn-group btn-group-xs pull-right" role="group">
                      <a href="{{ route('white_gloves.white_glove.show', $whiteGlove->id ) }}"
                         class="btn btn-info" title="Show White Glove">
                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                      </a>
                      <a href="{{ route('white_gloves.white_glove.edit', $whiteGlove->id ) }}"
                         class="btn btn-primary" title="Edit White Glove">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                      </a>

                      <button type="submit" class="btn btn-danger" title="Delete White Glove"
                              onclick="return confirm(&quot;Delete; White; Glove?;&quot;)">
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
        {!! $whiteGloves->render() !!}
      </div>

    @endif

  </div>
@endsection
