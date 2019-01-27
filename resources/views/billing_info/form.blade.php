<div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
  <label for="first_name" class="col-md-2 control-label">First Name</label>
  <div class="col-md-10">
    <input class="form-control" name="first_name" type="text" id="first_name"
           value="{{ old('first_name', optional($billingInfo)->first_name) }}" minlength="1" maxlength="255"
           required="true" placeholder="Enter first name here...">
    {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
  <label for="last_name" class="col-md-2 control-label">Last Name</label>
  <div class="col-md-10">
    <input class="form-control" name="last_name" type="text" id="last_name"
           value="{{ old('last_name', optional($billingInfo)->last_name) }}" minlength="1" maxlength="255"
           required="true" placeholder="Enter last name here...">
    {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('company') ? 'has-error' : '' }}">
  <label for="company" class="col-md-2 control-label">Company</label>
  <div class="col-md-10">
    <input class="form-control" name="company" type="text" id="company"
           value="{{ old('company', optional($billingInfo)->company) }}" maxlength="255"
           placeholder="Enter company here...">
    {!! $errors->first('company', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('address_1') ? 'has-error' : '' }}">
  <label for="address_1" class="col-md-2 control-label">Address 1</label>
  <div class="col-md-10">
    <input class="form-control" name="address_1" type="text" id="address_1"
           value="{{ old('address_1', optional($billingInfo)->address_1) }}" minlength="1" maxlength="255"
           required="true" placeholder="Enter address 1 here...">
    {!! $errors->first('address_1', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('address_2') ? 'has-error' : '' }}">
  <label for="address_2" class="col-md-2 control-label">Address 2</label>
  <div class="col-md-10">
    <input class="form-control" name="address_2" type="text" id="address_2"
           value="{{ old('address_2', optional($billingInfo)->address_2) }}" maxlength="255"
           placeholder="Enter address 2 here...">
    {!! $errors->first('address_2', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
  <label for="city" class="col-md-2 control-label">City</label>
  <div class="col-md-10">
    <input class="form-control" name="city" type="text" id="city"
           value="{{ old('city', optional($billingInfo)->city) }}" minlength="1" maxlength="255" required="true"
           placeholder="Enter city here...">
    {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('state') ? 'has-error' : '' }}">
  <label for="state" class="col-md-2 control-label">State</label>
  <div class="col-md-10">
    <input class="form-control" name="state" type="text" id="state"
           value="{{ old('state', optional($billingInfo)->state) }}" minlength="1" maxlength="255" required="true"
           placeholder="Enter state here...">
    {!! $errors->first('state', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('postal_code') ? 'has-error' : '' }}">
  <label for="postal_code" class="col-md-2 control-label">Postal Code</label>
  <div class="col-md-10">
    <input class="form-control" name="postal_code" type="text" id="postal_code"
           value="{{ old('postal_code', optional($billingInfo)->postal_code) }}" minlength="1" maxlength="255"
           required="true" placeholder="Enter postal code here...">
    {!! $errors->first('postal_code', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('country') ? 'has-error' : '' }}">
  <label for="country" class="col-md-2 control-label">Country</label>
  <div class="col-md-10">
    <input class="form-control" name="country" type="text" id="country"
           value="{{ old('country', optional($billingInfo)->country) }}" min="1" max="255" required="true"
           placeholder="Enter country here...">
    {!! $errors->first('country', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('phone_number') ? 'has-error' : '' }}">
  <label for="phone_number" class="col-md-2 control-label">Phone Number</label>
  <div class="col-md-10">
    <input class="form-control" name="phone_number" type="text" id="phone_number"
           value="{{ old('phone_number', optional($billingInfo)->phone_number) }}" min="1" max="255" required="true"
           placeholder="Enter phone number here...">
    {!! $errors->first('phone_number', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('phone_type') ? 'has-error' : '' }}">
  <label for="phone_type" class="col-md-2 control-label">Phone Type</label>
  <div class="col-md-10">
    <select class="form-control" id="phone_type" name="phone_type" required="true">
      <option value="" style="display: none;"
              {{ old('phone_type', optional($billingInfo)->phone_type ?: '') == '' ? 'selected' : '' }} disabled
              selected>Enter phone type here...
      </option>
      @foreach (['home' => 'Home',
'mobile' => 'Mobile',
'office' => 'Office',
'work' => 'Work',
'other' => 'Other'] as $key => $text)
        <option
          value="{{ $key }}" {{ old('phone_type', optional($billingInfo)->phone_type) == $key ? 'selected' : '' }}>
          {{ $text }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('phone_type', '<p class="help-block">:message</p>') !!}
  </div>
</div>

