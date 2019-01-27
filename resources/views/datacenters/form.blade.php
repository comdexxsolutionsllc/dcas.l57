<div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
  <label for="code" class="col-md-2 control-label">Code</label>
  <div class="col-md-10">
    <input class="form-control" name="code" type="text" id="code"
           value="{{ old('code', optional($datacenter)->code) }}" minlength="1" maxlength="255" required="true"
           placeholder="Enter code here...">
    {!! $errors->first('code', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('location') ? 'has-error' : '' }}">
  <label for="location" class="col-md-2 control-label">Location</label>
  <div class="col-md-10">
    <input class="form-control" name="location" type="text" id="location"
           value="{{ old('location', optional($datacenter)->location) }}" minlength="1" maxlength="255"
           required="true" placeholder="Enter location here...">
    {!! $errors->first('location', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
  <label for="status" class="col-md-2 control-label">Status</label>
  <div class="col-md-10">
    <input class="form-control" name="status" type="text" id="status"
           value="{{ old('status', optional($datacenter)->status) }}" minlength="1" maxlength="255" required="true"
           placeholder="Enter status here...">
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('opening_date') ? 'has-error' : '' }}">
  <label for="opening_date" class="col-md-2 control-label">Opening Date</label>
  <div class="col-md-10">
    <input class="form-control" name="opening_date" type="text" id="opening_date"
           value="{{ old('opening_date', optional($datacenter)->opening_date) }}" required="true"
           placeholder="Enter opening date here...">
    {!! $errors->first('opening_date', '<p class="help-block">:message</p>') !!}
  </div>
</div>

