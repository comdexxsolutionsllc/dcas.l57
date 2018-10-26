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
        <h4 class="mt-5 mb-5">Nameserver Comments</h4>
      </div>

      <div class="btn-group btn-group-sm pull-right" role="group">
        <a href="{{ route('nameserver_comments.nameserver_comment.create') }}" class="btn btn-success"
           title="Create New Nameserver Comment">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
      </div>

    </div>

    @if(count($nameserverComments) == 0)
      <div class="panel-body text-center">
        <h4>No Nameserver Comments Available!</h4>
      </div>
    @else
      <div class="panel-body panel-body-with-table">
        <div class="table-responsive">

          <table class="table table-striped ">
            <thead>
            <tr>
              <th>Domain</th>
              <th>Name</th>
              <th>Type</th>
              <th>Modified At</th>
              <th>Account</th>
              <th>Comment</th>

              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($nameserverComments as $nameserverComment)
              <tr>
                <td>{{ optional($nameserverComment->domain)->id }}</td>
                <td>{{ $nameserverComment->name }}</td>
                <td>{{ $nameserverComment->type }}</td>
                <td>{{ $nameserverComment->modified_at }}</td>
                <td>{{ $nameserverComment->account }}</td>
                <td>{{ $nameserverComment->comment }}</td>

                <td>

                  <form method="POST"
                        action="{!! route('nameserver_comments.nameserver_comment.destroy', $nameserverComment->id) !!}"
                        accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}

                    <div class="btn-group btn-group-xs pull-right" role="group">
                      <a href="{{ route('nameserver_comments.nameserver_comment.show', $nameserverComment->id ) }}"
                         class="btn btn-info" title="Show Nameserver Comment">
                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                      </a>
                      <a href="{{ route('nameserver_comments.nameserver_comment.edit', $nameserverComment->id ) }}"
                         class="btn btn-primary" title="Edit Nameserver Comment">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                      </a>

                      <button type="submit" class="btn btn-danger"
                              title="Delete Nameserver Comment"
                              onclick="return confirm(&quot;Delete; Nameserver; Comment?;&quot;)">
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
        {!! $nameserverComments->render() !!}
      </div>

    @endif

  </div>
@endsection
