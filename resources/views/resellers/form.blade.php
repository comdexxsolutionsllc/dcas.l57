<div class="form-group {{ $errors->has('account_id') ? 'has-error' : '' }}">
  <label for="account_id" class="col-md-2 control-label">Account</label>
  <div class="col-md-10">
    <select class="form-control" id="account_id" name="account_id" required="true">
      <option value="" style="display: none;"
              {{ old('account_id', optional($reseller)->account_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Enter account here...
      </option>
      @foreach ($accounts as $key => $account)
        <option value="{{ $key }}" {{ old('account_id', optional($reseller)->account_id) == $key ? 'selected' : '' }}>
          {{ $account }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('account_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('company_id') ? 'has-error' : '' }}">
  <label for="company_id" class="col-md-2 control-label">Company</label>
  <div class="col-md-10">
    <select class="form-control" id="company_id" name="company_id" required="true">
      <option value="" style="display: none;"
              {{ old('company_id', optional($reseller)->company_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Select company
      </option>
      @foreach ($companies as $key => $company)
        <option value="{{ $key }}" {{ old('company_id', optional($reseller)->company_id) == $key ? 'selected' : '' }}>
          {{ $company }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('company_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('expiry_date') ? 'has-error' : '' }}">
  <label for="expiry_date" class="col-md-2 control-label">Expiry Date</label>
  <div class="col-md-10">
    <input class="form-control" name="expiry_date" type="text" id="expiry_date"
           value="{{ old('expiry_date', optional($reseller)->expiry_date) }}"
           placeholder="Enter expiry date here...">
    {!! $errors->first('expiry_date', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('salesrep_id') ? 'has-error' : '' }}">
  <label for="salesrep_id" class="col-md-2 control-label">Salesrep</label>
  <div class="col-md-10">
    <select class="form-control" id="salesrep_id" name="salesrep_id" required="true">
      <option value="" style="display: none;"
              {{ old('salesrep_id', optional($reseller)->salesrep_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Select salesrep
      </option>
      @foreach ($salesreps as $key => $salesrep)
        <option value="{{ $key }}" {{ old('salesrep_id', optional($reseller)->salesrep_id) == $key ? 'selected' : '' }}>
          {{ $salesrep }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('salesrep_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

