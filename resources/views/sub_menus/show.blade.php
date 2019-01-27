@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Sub Menu' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST" action="{!! route('sub_menus.sub_menu.destroy', $subMenu->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('sub_menus.sub_menu.index') }}" class="btn btn-primary"
               title="Show All Sub Menu">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('sub_menus.sub_menu.create') }}" class="btn btn-success"
               title="Create New Sub Menu">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('sub_menus.sub_menu.edit', $subMenu->id ) }}" class="btn btn-primary"
               title="Edit Sub Menu">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Sub Menu"
                    onclick="return confirm(&quot;Delete; Sub; Menu??&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Text</dt>
        <dd>{{ $subMenu->text }}</dd>
        <dt>Url</dt>
        <dd>{{ $subMenu->url }}</dd>
        <dt>Target</dt>
        <dd>{{ $subMenu->target }}</dd>
        <dt>Route</dt>
        <dd>{{ $subMenu->route }}</dd>
        <dt>Icon</dt>
        <dd>{{ $subMenu->icon }}</dd>
        <dt>Level</dt>
        <dd>{{ $subMenu->level }}</dd>
        <dt>Can</dt>
        <dd>{{ $subMenu->can }}</dd>
        <dt>Menu</dt>
        <dd>{{ optional($subMenu->menu)->text }}</dd>
        <dt>Submenu</dt>
        <dd>{{ optional($subMenu->submenu)->id }}</dd>
        <dt>Created At</dt>
        <dd>{{ $subMenu->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $subMenu->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
