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
        <h4 class="mt-5 mb-5">Tld Extensions</h4>
      </div>

      <div class="btn-group btn-group-sm pull-right" role="group">
        <a href="{{ route('tld_extensions.tld_extension.create') }}" class="btn btn-success"
           title="Create New Tld Extension">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
      </div>

    </div>

    @if(count($tldExtensions) == 0)
      <div class="panel-body text-center">
        <h4>No Tld Extensions Available!</h4>
      </div>
    @else
      <div class="panel-body panel-body-with-table">
        <div class="table-responsive">

          <table class="table table-striped ">
            <thead>
            <tr>
              <th>Domain</th>
              <th>Type</th>

              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($tldExtensions as $tldExtension)
              <tr>
                <td>{{ $tldExtension->domain }}</td>
                <td>{{ $tldExtension->type }}</td>

                <td>

                  <form method="POST"
                        action="{!! route('tld_extensions.tld_extension.destroy', $tldExtension->id) !!}"
                        accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}

                    <div class="btn-group btn-group-xs pull-right" role="group">
                      <a href="{{ route('tld_extensions.tld_extension.show', $tldExtension->id ) }}"
                         class="btn btn-info" title="Show Tld Extension">
                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                      </a>
                      <a href="{{ route('tld_extensions.tld_extension.edit', $tldExtension->id ) }}"
                         class="btn btn-primary" title="Edit Tld Extension">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                      </a>

                      <button type="submit" class="btn btn-danger" title="Delete Tld Extension"
                              onclick="return confirm(&quot;Delete; Tld; Extension?;&quot;)">
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
        {!! $tldExtensions->render() !!}
      </div>

    @endif

  </div>
@endsection
