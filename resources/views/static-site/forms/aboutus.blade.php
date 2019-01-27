@extends('layouts.app')

@section('content')
  <form method="post" action="{{ route('aboutus.update', $employee->id) }}">
    @csrf
    @method('patch')
    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
      <label for="name" class="col-md-2 control-label">Name</label>
      <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name"
               value="{{ old('name', optional($employee)->name) }}"
               minlength="1" maxlength="255" required="true" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
      </div>
    </div>

    <div class="form-group {{ $errors->has('portrait') ? 'has-error' : '' }}">
      <label for="portrait" class="col-md-2 control-label">Portrait</label>
      <div class="col-md-10">
        <input class="form-control" name="portrait" type="text" id="portrait"
               value="{{ old('portrait', optional($employee)->portrait) }}" maxlength="255"
               placeholder="Enter portrait here...">
        {!! $errors->first('portrait', '<p class="help-block">:message</p>') !!}
      </div>
    </div>

    <div class="form-group {{ $errors->has('job_title') ? 'has-error' : '' }}">
      <label for="job_title" class="col-md-2 control-label">Job Title</label>
      <div class="col-md-10">
        <input class="form-control" name="job_title" type="text" id="job_title"
               value="{{ old('job_title', optional($employee)->job_title) }}" minlength="1" maxlength="255"
               required="true"
               placeholder="Enter job title here...">
        {!! $errors->first('job_title', '<p class="help-block">:message</p>') !!}
      </div>
    </div>

    <div class="form-group">
      <label for="job_summary" class="col-md-2 control-label">Job Summary</label>
      <div class="col-md-10">
    <textarea class="form-control" name="job_summary" cols="50" rows="10" id="job_summary" required="true"
              placeholder="Enter job summary here...">{{ old('job_summary', optional($employee)->job_summary) }}</textarea>
        {!! $errors->first('job_summary', '<p class="help-block">:message</p>') !!}
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-10">
        <input class="form-control btn btn-primary" type="submit" value="Submit">
      </div>
    </div>
  </form>
@endsection
