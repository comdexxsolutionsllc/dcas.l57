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
        <h4 class="mt-5 mb-5">Nameserver Domainmetadatas</h4>
      </div>

      <div class="btn-group btn-group-sm pull-right" role="group">
        <a href="{{ route('nameserver_domainmetadatas.nameserver_domainmetadata.create') }}"
           class="btn btn-success" title="Create New Nameserver Domainmetadata">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
      </div>

    </div>

    @if(count($nameserverDomainmetadatas) == 0)
      <div class="panel-body text-center">
        <h4>No Nameserver Domainmetadatas Available!</h4>
      </div>
    @else
      <div class="panel-body panel-body-with-table">
        <div class="table-responsive">

          <table class="table table-striped ">
            <thead>
            <tr>
              <th>Domain</th>
              <th>Kind</th>

              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($nameserverDomainmetadatas as $nameserverDomainmetadata)
              <tr>
                <td>{{ optional($nameserverDomainmetadata->domain)->id }}</td>
                <td>{{ $nameserverDomainmetadata->kind }}</td>

                <td>

                  <form method="POST"
                        action="{!! route('nameserver_domainmetadatas.nameserver_domainmetadata.destroy', $nameserverDomainmetadata->id) !!}"
                        accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}

                    <div class="btn-group btn-group-xs pull-right" role="group">
                      <a
                        href="{{ route('nameserver_domainmetadatas.nameserver_domainmetadata.show', $nameserverDomainmetadata->id ) }}"
                        class="btn btn-info" title="Show Nameserver Domainmetadata">
                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                      </a>
                      <a
                        href="{{ route('nameserver_domainmetadatas.nameserver_domainmetadata.edit', $nameserverDomainmetadata->id ) }}"
                        class="btn btn-primary" title="Edit Nameserver Domainmetadata">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                      </a>

                      <button type="submit" class="btn btn-danger"
                              title="Delete Nameserver Domainmetadata"
                              onclick="return confirm(&quot;Delete; Nameserver; Domainmetadata?;&quot;)">
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
        {!! $nameserverDomainmetadatas->render() !!}
      </div>

    @endif

  </div>
@endsection
