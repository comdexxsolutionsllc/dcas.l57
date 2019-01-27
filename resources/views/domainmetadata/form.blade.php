<div class="form-group {{ $errors->has('domain_id') ? 'has-error' : '' }}">
  <label for="domain_id" class="col-md-2 control-label">Domain</label>
  <div class="col-md-10">
    <select class="form-control" id="domain_id" name="domain_id" required="true">
      <option value="" style="display: none;"
              {{ old('domain_id', optional($domainmetadata)->domain_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Select domain
      </option>
      @foreach ($domains as $key => $domain)
        <option
          value="{{ $key }}" {{ old('domain_id', optional($domainmetadata)->domain_id) == $key ? 'selected' : '' }}>
          {{ $domain }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('domain_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('kind') ? 'has-error' : '' }}">
  <label for="kind" class="col-md-2 control-label">Kind</label>
  <div class="col-md-10">
    <input class="form-control" name="kind" type="text" id="kind"
           value="{{ old('kind', optional($domainmetadata)->kind) }}" maxlength="255"
           placeholder="Enter kind here...">
    {!! $errors->first('kind', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
  <label for="content" class="col-md-2 control-label">Content</label>
  <div class="col-md-10">
        <textarea class="form-control" name="content" cols="50" rows="10" id="content"
                  placeholder="Enter content here...">{{ old('content', optional($domainmetadata)->content) }}</textarea>
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
  </div>
</div>

