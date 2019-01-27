<div class="form-group {{ $errors->has('domain') ? 'has-error' : '' }}">
  <label for="domain" class="col-md-2 control-label">Domain</label>
  <div class="col-md-10">
    <input class="form-control" name="domain" type="text" id="domain"
           value="{{ old('domain', optional($tldExtension)->domain) }}" minlength="1" maxlength="255"
           required="true" placeholder="Enter domain here...">
    {!! $errors->first('domain', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
  <label for="description" class="col-md-2 control-label">Description</label>
  <div class="col-md-10">
    <input class="form-control" name="description" type="text" id="description"
           value="{{ old('description', optional($tldExtension)->description) }}" maxlength="255">
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
  <label for="type" class="col-md-2 control-label">Type</label>
  <div class="col-md-10">
    <select class="form-control" id="type" name="type" required="true">
      <option value="" style="display: none;"
              {{ old('type', optional($tldExtension)->type ?: '') == '' ? 'selected' : '' }} disabled selected>
        Enter type here...
      </option>
      @foreach (['country-code' => 'Country-code',
'generic' => 'Generic',
'generic-restricted' => 'Generic-restricted',
'infrastructure' => 'Infrastructure',
'sponsored' => 'Sponsored',
'test' => 'Test'] as $key => $text)
        <option value="{{ $key }}" {{ old('type', optional($tldExtension)->type) == $key ? 'selected' : '' }}>
          {{ $text }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
  </div>
</div>

