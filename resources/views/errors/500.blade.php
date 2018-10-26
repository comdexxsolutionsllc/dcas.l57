@extends('layouts.error')

@section('code', '500')
@section('title', __('Exception'))

@section('image')
  <div style="background-image: url('/svg/500.svg');"
       class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
  </div>
@endsection

@section('message')
  <div class="content">
    <div class="title">Something went wrong.</div>

    @if(app()->bound('sentry') && !empty(Sentry::getLastEventID()))
      <div class="subtitle" style="padding-top: 25px; font-size:25px">Error ID</div>
      <div class="subtitle"
           style="padding-top: 25px; padding-bottom: 50px; font-weight: bold">{{ Sentry::getLastEventID() }}</div>

      <script src="https://cdn.ravenjs.com/3.3.0/raven.min.js"></script>

      <script>
        Raven.showReportDialog({
          eventId: '{{ Sentry::getLastEventID() }}',
          dsn: 'https://99670c17a1a14d57929c0c4fc41461e4@sentry.io/1320599',
          user: {
            'name': 'Alex Renner',
            'email': 'alex@elementalfusion.online',
          }
        });
      </script>
    @endif
  </div>
@endsection
