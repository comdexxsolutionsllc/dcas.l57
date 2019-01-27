<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
  <label for="name" class="col-md-2 control-label">Name</label>
  <div class="col-md-10">
    <input class="form-control" name="name" type="text" id="name"
           value="{{ old('name', optional($networkDeviceType)->name) }}" minlength="1" maxlength="255"
           required="true" placeholder="Enter name here...">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
  <label for="description" class="col-md-2 control-label">Description</label>
  <div class="col-md-10">
    <input class="form-control" name="description" type="text" id="description"
           value="{{ old('description', optional($networkDeviceType)->description) }}" maxlength="4294967295">
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('active') ? 'has-error' : '' }}">
  <label for="active" class="col-md-2 control-label">Active</label>
  <div class="col-md-10">
    <div class="checkbox">
      <label for="active_1">
        <input id="active_1" class="" name="active" type="checkbox"
               value="1" {{ old('active', optional($networkDeviceType)->active) == '1' ? 'checked' : '' }}>
        Yes
      </label>
    </div>

    {!! $errors->first('active', '<p class="help-block">:message</p>') !!}
  </div>
</div>

