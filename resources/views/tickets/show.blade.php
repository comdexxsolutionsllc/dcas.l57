@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($ticket->title) ? $ticket->title : 'Ticket' }}</h4>
        </span>

            <div class="pull-right">

                <form method="POST" action="{!! route('tickets.ticket.destroy', $ticket->id) !!}"
                      accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}
                    <div class="btn-group btn-group-sm" role="group">
                        <a href="{{ route('tickets.ticket.index') }}" class="btn btn-primary" title="Show All Ticket">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                        </a>

                        <a href="{{ route('tickets.ticket.create') }}" class="btn btn-success"
                           title="Create New Ticket">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </a>

                        <a href="{{ route('tickets.ticket.edit', $ticket->id ) }}" class="btn btn-primary"
                           title="Edit Ticket">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a>

                        <button type="submit" class="btn btn-danger" title="Delete Ticket"
                                onclick="return confirm(&quot;Delete Ticket??&quot;)">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </button>
                    </div>
                </form>

            </div>

        </div>

        <div class="panel-body">
            <dl class="dl-horizontal">
                <dt>Ticket</dt>
                <dd>{{ optional($ticket->ticket)->id }}</dd>
                <dt>Title</dt>
                <dd>{{ $ticket->title }}</dd>
                <dt>Body</dt>
                <dd>{{ $ticket->body }}</dd>
                <dt>Status</dt>
                <dd>{{ optional($ticket->status)->name }}</dd>
                <dt>Department</dt>
                <dd>{{ optional($ticket->department)->name }}</dd>
                <dt>Is Resolved</dt>
                <dd>{{ ($ticket->is_resolved) ? 'Yes' : 'No' }}</dd>
                <dt>Deleted At</dt>
                <dd>{{ $ticket->deleted_at }}</dd>
                <dt>Created At</dt>
                <dd>{{ $ticket->created_at }}</dd>
                <dt>Updated At</dt>
                <dd>{{ $ticket->updated_at }}</dd>

            </dl>

        </div>
    </div>

@endsection
