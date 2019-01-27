<div class="form-group {{ $errors->has('domain_id') ? 'has-error' : '' }}">
  <label for="domain_id" class="col-md-2 control-label">Domain</label>
  <div class="col-md-10">
    <select class="form-control" id="domain_id" name="domain_id" required="true">
      <option value="" style="display: none;"
              {{ old('domain_id', optional($cryptokey)->domain_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Select domain
      </option>
      @foreach ($domains as $key => $domain)
        <option value="{{ $key }}" {{ old('domain_id', optional($cryptokey)->domain_id) == $key ? 'selected' : '' }}>
          {{ $domain }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('domain_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('flags') ? 'has-error' : '' }}">
  <label for="flags" class="col-md-2 control-label">Flags</label>
  <div class="col-md-10">
    <input class="form-control" name="flags" type="number" id="flags"
           value="{{ old('flags', optional($cryptokey)->flags) }}" min="-2147483648" max="2147483647"
           required="true" placeholder="Enter flags here...">
    {!! $errors->first('flags', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('active') ? 'has-error' : '' }}">
  <label for="active" class="col-md-2 control-label">Active</label>
  <div class="col-md-10">
    <div class="checkbox">
      <label for="active_1">
        <input id="active_1" class="" name="active" type="checkbox"
               value="1" {{ old('active', optional($cryptokey)->active) == '1' ? 'checked' : '' }}>
        Yes
      </label>
    </div>

    {!! $errors->first('active', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
  <label for="content" class="col-md-2 control-label">Content</label>
  <div class="col-md-10">
        <textarea class="form-control" name="content" cols="50" rows="10" id="content"
                  placeholder="Enter content here...">{{ old('content', optional($cryptokey)->content) }}</textarea>
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
  </div>
</div>

