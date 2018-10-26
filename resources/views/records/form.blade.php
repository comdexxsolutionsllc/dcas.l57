<div class="form-group {{ $errors->has('domain_id') ? 'has-error' : '' }}">
  <label for="domain_id" class="col-md-2 control-label">Domain</label>
  <div class="col-md-10">
    <select class="form-control" id="domain_id" name="domain_id" required="true">
      <option value="" style="display: none;"
              {{ old('domain_id', optional($record)->domain_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Select domain
      </option>
      @foreach ($domains as $key => $domain)
        <option value="{{ $key }}" {{ old('domain_id', optional($record)->domain_id) == $key ? 'selected' : '' }}>
          {{ $domain }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('domain_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
  <label for="name" class="col-md-2 control-label">Name</label>
  <div class="col-md-10">
    <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($record)->name) }}"
           maxlength="255" placeholder="Enter name here...">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
  <label for="type" class="col-md-2 control-label">Type</label>
  <div class="col-md-10">
    <input class="form-control" name="type" type="text" id="type" value="{{ old('type', optional($record)->type) }}"
           maxlength="255" placeholder="Enter type here...">
    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
  <label for="content" class="col-md-2 control-label">Content</label>
  <div class="col-md-10">
    <input class="form-control" name="content" type="text" id="content"
           value="{{ old('content', optional($record)->content) }}" maxlength="255"
           placeholder="Enter content here...">
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('ttl') ? 'has-error' : '' }}">
  <label for="ttl" class="col-md-2 control-label">Ttl</label>
  <div class="col-md-10">
    <input class="form-control" name="ttl" type="number" id="ttl" value="{{ old('ttl', optional($record)->ttl) }}"
           min="-2147483648" max="2147483647" placeholder="Enter ttl here...">
    {!! $errors->first('ttl', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('priority') ? 'has-error' : '' }}">
  <label for="priority" class="col-md-2 control-label">Priority</label>
  <div class="col-md-10">
    <input class="form-control" name="priority" type="number" id="priority"
           value="{{ old('priority', optional($record)->priority) }}" min="-2147483648" max="2147483647"
           placeholder="Enter priority here...">
    {!! $errors->first('priority', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('change_date') ? 'has-error' : '' }}">
  <label for="change_date" class="col-md-2 control-label">Change Date</label>
  <div class="col-md-10">
    <input class="form-control" name="change_date" type="number" id="change_date"
           value="{{ old('change_date', optional($record)->change_date) }}" min="-2147483648" max="2147483647"
           placeholder="Enter change date here...">
    {!! $errors->first('change_date', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('disabled') ? 'has-error' : '' }}">
  <label for="disabled" class="col-md-2 control-label">Disabled</label>
  <div class="col-md-10">
    <input class="form-control" name="disabled" type="text" id="disabled"
           value="{{ old('disabled', optional($record)->disabled) }}" minlength="1" required="true"
           placeholder="Enter disabled here...">
    {!! $errors->first('disabled', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('ordername') ? 'has-error' : '' }}">
  <label for="ordername" class="col-md-2 control-label">Ordername</label>
  <div class="col-md-10">
    <input class="form-control" name="ordername" type="text" id="ordername"
           value="{{ old('ordername', optional($record)->ordername) }}" maxlength="255"
           placeholder="Enter ordername here...">
    {!! $errors->first('ordername', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('auth') ? 'has-error' : '' }}">
  <label for="auth" class="col-md-2 control-label">Auth</label>
  <div class="col-md-10">
    <input class="form-control" name="auth" type="text" id="auth" value="{{ old('auth', optional($record)->auth) }}"
           minlength="1" required="true" placeholder="Enter auth here...">
    {!! $errors->first('auth', '<p class="help-block">:message</p>') !!}
  </div>
</div>

