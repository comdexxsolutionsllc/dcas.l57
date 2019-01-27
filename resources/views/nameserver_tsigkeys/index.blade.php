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
        <h4 class="mt-5 mb-5">Nameserver Tsigkeys</h4>
      </div>

      <div class="btn-group btn-group-sm pull-right" role="group">
        <a href="{{ route('nameserver_tsigkeys.nameserver_tsigkey.create') }}" class="btn btn-success"
           title="Create New Nameserver Tsigkey">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
      </div>

    </div>

    @if(count($nameserverTsigkeys) == 0)
      <div class="panel-body text-center">
        <h4>No Nameserver Tsigkeys Available!</h4>
      </div>
    @else
      <div class="panel-body panel-body-with-table">
        <div class="table-responsive">

          <table class="table table-striped ">
            <thead>
            <tr>
              <th>Name</th>
              <th>Algorithm</th>
              <th>Secret</th>

              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($nameserverTsigkeys as $nameserverTsigkey)
              <tr>
                <td>{{ $nameserverTsigkey->name }}</td>
                <td>{{ $nameserverTsigkey->algorithm }}</td>
                <td>{{ $nameserverTsigkey->secret }}</td>

                <td>

                  <form method="POST"
                        action="{!! route('nameserver_tsigkeys.nameserver_tsigkey.destroy', $nameserverTsigkey->id) !!}"
                        accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}

                    <div class="btn-group btn-group-xs pull-right" role="group">
                      <a href="{{ route('nameserver_tsigkeys.nameserver_tsigkey.show', $nameserverTsigkey->id ) }}"
                         class="btn btn-info" title="Show Nameserver Tsigkey">
                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                      </a>
                      <a href="{{ route('nameserver_tsigkeys.nameserver_tsigkey.edit', $nameserverTsigkey->id ) }}"
                         class="btn btn-primary" title="Edit Nameserver Tsigkey">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                      </a>

                      <button type="submit" class="btn btn-danger"
                              title="Delete Nameserver Tsigkey"
                              onclick="return confirm(&quot;Delete; Nameserver; Tsigkey?;&quot;)">
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
        {!! $nameserverTsigkeys->render() !!}
      </div>

    @endif

  </div>
@endsection
