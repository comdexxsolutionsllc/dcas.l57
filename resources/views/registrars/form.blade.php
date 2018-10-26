<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
  <label for="name" class="col-md-2 control-label">Name</label>
  <div class="col-md-10">
    <input class="form-control" name="name" type="text" id="name"
           value="{{ old('name', optional($registrar)->name) }}" minlength="1" maxlength="255" required="true"
           placeholder="Enter name here...">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('url') ? 'has-error' : '' }}">
  <label for="url" class="col-md-2 control-label">Url</label>
  <div class="col-md-10">
    <input class="form-control" name="url" type="text" id="url" value="{{ old('url', optional($registrar)->url) }}"
           minlength="1" maxlength="255" required="true" placeholder="Enter url here...">
    {!! $errors->first('url', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
  <label for="type" class="col-md-2 control-label">Type</label>
  <div class="col-md-10">
    <input class="form-control" name="type" type="text" id="type"
           value="{{ old('type', optional($registrar)->type) }}" minlength="1" maxlength="255" required="true"
           placeholder="Enter type here...">
    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
  </div>
</div>

