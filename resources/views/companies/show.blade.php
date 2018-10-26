@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($company->name) ? $company->name : 'Company' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST" action="{!! route('companies.company.destroy', $company->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('companies.company.index') }}" class="btn btn-primary"
               title="Show All Company">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('companies.company.create') }}" class="btn btn-success"
               title="Create New Company">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('companies.company.edit', $company->id ) }}" class="btn btn-primary"
               title="Edit Company">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Company"
                    onclick="return confirm(&quot;Delete; Company??&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Name</dt>
        <dd>{{ $company->name }}</dd>
        <dt>Contact Name</dt>
        <dd>{{ $company->contact_name }}</dd>
        <dt>Contact Email</dt>
        <dd>{{ $company->contact_email }}</dd>
        <dt>Contact Phone</dt>
        <dd>{{ $company->contact_phone }}</dd>
        <dt>Phone Type</dt>
        <dd>{{ $company->phone_type }}</dd>
        <dt>Active</dt>
        <dd>{{ ($company->active) ? 'Yes' : 'No' }}</dd>
        <dt>Created At</dt>
        <dd>{{ $company->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $company->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
