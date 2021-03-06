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
        <h4 class="mt-5 mb-5">Companies</h4>
      </div>

      <div class="btn-group btn-group-sm pull-right" role="group">
        <a href="{{ route('companies.company.create') }}" class="btn btn-success" title="Create New Company">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
      </div>

    </div>

    @if(count($companies) == 0)
      <div class="panel-body text-center">
        <h4>No Companies Available!</h4>
      </div>
    @else
      <div class="panel-body panel-body-with-table">
        <div class="table-responsive">

          <table class="table table-striped ">
            <thead>
            <tr>
              <th>Name</th>
              <th>Contact Name</th>
              <th>Contact Email</th>
              <th>Contact Phone</th>
              <th>Phone Type</th>
              <th>Active</th>

              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($companies as $company)
              <tr>
                <td>{{ $company->name }}</td>
                <td>{{ $company->contact_name }}</td>
                <td>{{ $company->contact_email }}</td>
                <td>{{ $company->contact_phone }}</td>
                <td>{{ $company->phone_type }}</td>
                <td>{{ ($company->active) ? 'Yes' : 'No' }}</td>

                <td>

                  <form method="POST"
                        action="{!! route('companies.company.destroy', $company->id) !!}"
                        accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}

                    <div class="btn-group btn-group-xs pull-right" role="group">
                      <a href="{{ route('companies.company.show', $company->id ) }}"
                         class="btn btn-info" title="Show Company">
                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                      </a>
                      <a href="{{ route('companies.company.edit', $company->id ) }}"
                         class="btn btn-primary" title="Edit Company">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                      </a>

                      <button type="submit" class="btn btn-danger" title="Delete Company"
                              onclick="return confirm(&quot;Delete; Company?;&quot;)">
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
        {!! $companies->render() !!}
      </div>

    @endif

  </div>
@endsection
