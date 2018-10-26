<div class="form-group {{ $errors->has('account_id') ? 'has-error' : '' }}">
  <label for="account_id" class="col-md-2 control-label">Account</label>
  <div class="col-md-10">
    <select class="form-control" id="account_id" name="account_id" required="true">
      <option value="" style="display: none;"
              {{ old('account_id', optional($service)->account_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Enter account here...
      </option>
      @foreach ($accounts as $key => $account)
        <option value="{{ $key }}" {{ old('account_id', optional($service)->account_id) == $key ? 'selected' : '' }}>
          {{ $account }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('account_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('service_type') ? 'has-error' : '' }}">
  <label for="service_type" class="col-md-2 control-label">Service Type</label>
  <div class="col-md-10">
    <input class="form-control" name="service_type" type="text" id="service_type"
           value="{{ old('service_type', optional($service)->service_type) }}" minlength="1" maxlength="255"
           required="true" placeholder="Enter service type here...">
    {!! $errors->first('service_type', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
  <label for="status" class="col-md-2 control-label">Status</label>
  <div class="col-md-10">
    <input class="form-control" name="status" type="text" id="status"
           value="{{ old('status', optional($service)->status) }}" minlength="1" maxlength="255" required="true"
           placeholder="Enter status here...">
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('last_payment') ? 'has-error' : '' }}">
  <label for="last_payment" class="col-md-2 control-label">Last Payment</label>
  <div class="col-md-10">
    <input class="form-control" name="last_payment" type="text" id="last_payment"
           value="{{ old('last_payment', optional($service)->last_payment) }}"
           placeholder="Enter last payment here...">
    {!! $errors->first('last_payment', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('last_invoice') ? 'has-error' : '' }}">
  <label for="last_invoice" class="col-md-2 control-label">Last Invoice</label>
  <div class="col-md-10">
    <input class="form-control" name="last_invoice" type="text" id="last_invoice"
           value="{{ old('last_invoice', optional($service)->last_invoice) }}"
           placeholder="Enter last invoice here...">
    {!! $errors->first('last_invoice', '<p class="help-block">:message</p>') !!}
  </div>
</div>

