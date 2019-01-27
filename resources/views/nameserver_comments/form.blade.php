<div class="form-group {{ $errors->has('domain_id') ? 'has-error' : '' }}">
  <label for="domain_id" class="col-md-2 control-label">Domain</label>
  <div class="col-md-10">
    <select class="form-control" id="domain_id" name="domain_id" required="true">
      <option value="" style="display: none;"
              {{ old('domain_id', optional($nameserverComment)->domain_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Select domain
      </option>
      @foreach ($domains as $key => $domain)
        <option
          value="{{ $key }}" {{ old('domain_id', optional($nameserverComment)->domain_id) == $key ? 'selected' : '' }}>
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
    <input class="form-control" name="name" type="text" id="name"
           value="{{ old('name', optional($nameserverComment)->name) }}" minlength="1" maxlength="255"
           required="true" placeholder="Enter name here...">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
  <label for="type" class="col-md-2 control-label">Type</label>
  <div class="col-md-10">
    <input class="form-control" name="type" type="text" id="type"
           value="{{ old('type', optional($nameserverComment)->type) }}" minlength="1" maxlength="255"
           required="true" placeholder="Enter type here...">
    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('modified_at') ? 'has-error' : '' }}">
  <label for="modified_at" class="col-md-2 control-label">Modified At</label>
  <div class="col-md-10">
    <input class="form-control" name="modified_at" type="number" id="modified_at"
           value="{{ old('modified_at', optional($nameserverComment)->modified_at) }}" min="-2147483648"
           max="2147483647" required="true" placeholder="Enter modified at here...">
    {!! $errors->first('modified_at', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('account') ? 'has-error' : '' }}">
  <label for="account" class="col-md-2 control-label">Account</label>
  <div class="col-md-10">
    <input class="form-control" name="account" type="text" id="account"
           value="{{ old('account', optional($nameserverComment)->account) }}" min="1" max="255" required="true"
           placeholder="Enter account here...">
    {!! $errors->first('account', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('comment') ? 'has-error' : '' }}">
  <label for="comment" class="col-md-2 control-label">Comment</label>
  <div class="col-md-10">
    <input class="form-control" name="comment" type="text" id="comment"
           value="{{ old('comment', optional($nameserverComment)->comment) }}" minlength="1" maxlength="255"
           required="true" placeholder="Enter comment here...">
    {!! $errors->first('comment', '<p class="help-block">:message</p>') !!}
  </div>
</div>

