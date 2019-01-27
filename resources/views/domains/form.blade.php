<div class="form-group {{ $errors->has('account_id') ? 'has-error' : '' }}">
  <label for="account_id" class="col-md-2 control-label">Account</label>
  <div class="col-md-10">
    <select class="form-control" id="account_id" name="account_id" required="true">
      <option value="" style="display: none;"
              {{ old('account_id', optional($domain)->account_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Enter account here...
      </option>
      @foreach ($accounts as $key => $account)
        <option value="{{ $key }}" {{ old('account_id', optional($domain)->account_id) == $key ? 'selected' : '' }}>
          {{ $account }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('account_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('registrar_id') ? 'has-error' : '' }}">
  <label for="registrar_id" class="col-md-2 control-label">Registrar</label>
  <div class="col-md-10">
    <select class="form-control" id="registrar_id" name="registrar_id" required="true">
      <option value="" style="display: none;"
              {{ old('registrar_id', optional($domain)->registrar_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Select registrar
      </option>
      @foreach ($registrars as $key => $registrar)
        <option value="{{ $key }}" {{ old('registrar_id', optional($domain)->registrar_id) == $key ? 'selected' : '' }}>
          {{ $registrar }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('registrar_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('domain_name') ? 'has-error' : '' }}">
  <label for="domain_name" class="col-md-2 control-label">Domain Name</label>
  <div class="col-md-10">
    <input class="form-control" name="domain_name" type="text" id="domain_name"
           value="{{ old('domain_name', optional($domain)->domain_name) }}" minlength="1" maxlength="255"
           required="true" placeholder="Enter domain name here...">
    {!! $errors->first('domain_name', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('active') ? 'has-error' : '' }}">
  <label for="active" class="col-md-2 control-label">Active</label>
  <div class="col-md-10">
    <div class="checkbox">
      <label for="active_1">
        <input id="active_1" class="" name="active" type="checkbox"
               value="1" {{ old('active', optional($domain)->active) == '1' ? 'checked' : '' }}>
        Yes
      </label>
    </div>

    {!! $errors->first('active', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('monitor') ? 'has-error' : '' }}">
  <label for="monitor" class="col-md-2 control-label">Monitor</label>
  <div class="col-md-10">
    <div class="checkbox">
      <label for="monitor_1">
        <input id="monitor_1" class="" name="monitor" type="checkbox"
               value="1" {{ old('monitor', optional($domain)->monitor) == '1' ? 'checked' : '' }}>
        Yes
      </label>
    </div>

    {!! $errors->first('monitor', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('whois_record_updated') ? 'has-error' : '' }}">
  <label for="whois_record_updated" class="col-md-2 control-label">Whois Record Updated</label>
  <div class="col-md-10">
    <input class="form-control" name="whois_record_updated" type="text" id="whois_record_updated"
           value="{{ old('whois_record_updated', optional($domain)->whois_record_updated) }}"
           placeholder="Enter whois record updated here...">
    {!! $errors->first('whois_record_updated', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('whois_record_created') ? 'has-error' : '' }}">
  <label for="whois_record_created" class="col-md-2 control-label">Whois Record Created</label>
  <div class="col-md-10">
    <input class="form-control" name="whois_record_created" type="text" id="whois_record_created"
           value="{{ old('whois_record_created', optional($domain)->whois_record_created) }}"
           placeholder="Enter whois record created here...">
    {!! $errors->first('whois_record_created', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('whois_record_expiry') ? 'has-error' : '' }}">
  <label for="whois_record_expiry" class="col-md-2 control-label">Whois Record Expiry</label>
  <div class="col-md-10">
    <input class="form-control" name="whois_record_expiry" type="text" id="whois_record_expiry"
           value="{{ old('whois_record_expiry', optional($domain)->whois_record_expiry) }}"
           placeholder="Enter whois record expiry here...">
    {!! $errors->first('whois_record_expiry', '<p class="help-block">:message</p>') !!}
  </div>
</div>

