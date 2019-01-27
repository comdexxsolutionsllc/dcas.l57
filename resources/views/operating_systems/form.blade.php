<div class="form-group {{ $errors->has('architecture') ? 'has-error' : '' }}">
  <label for="architecture" class="col-md-2 control-label">Architecture</label>
  <div class="col-md-10">
    <select class="form-control" id="architecture" name="architecture" required="true">
      <option value="" style="display: none;"
              {{ old('architecture', optional($operatingSystem)->architecture ?: '') == '' ? 'selected' : '' }} disabled
              selected>Enter architecture here...
      </option>
      @foreach (['x86' => 'X86',
'x64' => 'X64'] as $key => $text)
        <option
          value="{{ $key }}" {{ old('architecture', optional($operatingSystem)->architecture) == $key ? 'selected' : '' }}>
          {{ $text }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('architecture', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
  <label for="type" class="col-md-2 control-label">Type</label>
  <div class="col-md-10">
    <select class="form-control" id="type" name="type" required="true">
      <option value="" style="display: none;"
              {{ old('type', optional($operatingSystem)->type ?: '') == '' ? 'selected' : '' }} disabled selected>
        Enter type here...
      </option>
      @foreach (['UNIX' => 'UNIX',
'BSD' => 'BSD',
'Linux' => 'Linux',
'Microsoft Windows' => 'Microsoft Windows'] as $key => $text)
        <option value="{{ $key }}" {{ old('type', optional($operatingSystem)->type) == $key ? 'selected' : '' }}>
          {{ $text }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
  <label for="name" class="col-md-2 control-label">Name</label>
  <div class="col-md-10">
    <input class="form-control" name="name" type="text" id="name"
           value="{{ old('name', optional($operatingSystem)->name) }}" minlength="1" maxlength="255" required="true"
           placeholder="Enter name here...">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('notes') ? 'has-error' : '' }}">
  <label for="notes" class="col-md-2 control-label">Notes</label>
  <div class="col-md-10">
    <input class="form-control" name="notes" type="text" id="notes"
           value="{{ old('notes', optional($operatingSystem)->notes) }}" minlength="1" maxlength="4294967295"
           required="true">
    {!! $errors->first('notes', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('active') ? 'has-error' : '' }}">
  <label for="active" class="col-md-2 control-label">Active</label>
  <div class="col-md-10">
    <div class="checkbox">
      <label for="active_1">
        <input id="active_1" class="" name="active" type="checkbox"
               value="1" {{ old('active', optional($operatingSystem)->active) == '1' ? 'checked' : '' }}>
        Yes
      </label>
    </div>

    {!! $errors->first('active', '<p class="help-block">:message</p>') !!}
  </div>
</div>

