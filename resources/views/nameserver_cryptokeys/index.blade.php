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
        <h4 class="mt-5 mb-5">Nameserver Cryptokeys</h4>
      </div>

      <div class="btn-group btn-group-sm pull-right" role="group">
        <a href="{{ route('nameserver_cryptokeys.nameserver_cryptokey.create') }}" class="btn btn-success"
           title="Create New Nameserver Cryptokey">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
      </div>

    </div>

    @if(count($nameserverCryptokeys) == 0)
      <div class="panel-body text-center">
        <h4>No Nameserver Cryptokeys Available!</h4>
      </div>
    @else
      <div class="panel-body panel-body-with-table">
        <div class="table-responsive">

          <table class="table table-striped ">
            <thead>
            <tr>
              <th>Domain</th>
              <th>Flags</th>
              <th>Active</th>

              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($nameserverCryptokeys as $nameserverCryptokey)
              <tr>
                <td>{{ optional($nameserverCryptokey->domain)->id }}</td>
                <td>{{ $nameserverCryptokey->flags }}</td>
                <td>{{ ($nameserverCryptokey->active) ? 'Yes' : 'No' }}</td>

                <td>

                  <form method="POST"
                        action="{!! route('nameserver_cryptokeys.nameserver_cryptokey.destroy', $nameserverCryptokey->id) !!}"
                        accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}

                    <div class="btn-group btn-group-xs pull-right" role="group">
                      <a
                        href="{{ route('nameserver_cryptokeys.nameserver_cryptokey.show', $nameserverCryptokey->id ) }}"
                        class="btn btn-info" title="Show Nameserver Cryptokey">
                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                      </a>
                      <a
                        href="{{ route('nameserver_cryptokeys.nameserver_cryptokey.edit', $nameserverCryptokey->id ) }}"
                        class="btn btn-primary" title="Edit Nameserver Cryptokey">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                      </a>

                      <button type="submit" class="btn btn-danger"
                              title="Delete Nameserver Cryptokey"
                              onclick="return confirm(&quot;Delete; Nameserver; Cryptokey?;&quot;)">
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
        {!! $nameserverCryptokeys->render() !!}
      </div>

    @endif

  </div>
@endsection
