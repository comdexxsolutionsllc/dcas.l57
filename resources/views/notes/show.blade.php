@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Note' }}</h4>
        </span>

            <div class="pull-right">

                <form method="POST" action="{!! route('notes.note.destroy', $note->id) !!}" accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}
                    <div class="btn-group btn-group-sm" role="group">
                        <a href="{{ route('notes.note.index') }}" class="btn btn-primary" title="Show All Note">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                        </a>

                        <a href="{{ route('notes.note.create') }}" class="btn btn-success" title="Create New Note">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </a>

                        <a href="{{ route('notes.note.edit', $note->id ) }}" class="btn btn-primary" title="Edit Note">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a>

                        <button type="submit" class="btn btn-danger" title="Delete Note"
                                onclick="return confirm(&quot;Delete Note??&quot;)">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </button>
                    </div>
                </form>

            </div>

        </div>

        <div class="panel-body">
            <dl class="dl-horizontal">
                <dt>Body</dt>
                <dd>{{ $note->body }}</dd>
                <dt>Created At</dt>
                <dd>{{ $note->created_at }}</dd>
                <dt>Updated At</dt>
                <dd>{{ $note->updated_at }}</dd>

            </dl>

        </div>
    </div>

@endsection
