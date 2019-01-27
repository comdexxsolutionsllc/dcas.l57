<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
  <label for="type" class="col-md-2 control-label">Type</label>
  <div class="col-md-10">
    <select class="form-control" id="type" name="type" required="true">
      <option value="" style="display: none;"
              {{ old('type', optional($coupon)->type ?: '') == '' ? 'selected' : '' }} disabled selected>Enter
        type here...
      </option>
      @foreach (['fixed' => 'Fixed',
'percentage' => 'Percentage'] as $key => $text)
        <option value="{{ $key }}" {{ old('type', optional($coupon)->type) == $key ? 'selected' : '' }}>
          {{ $text }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
  <label for="code" class="col-md-2 control-label">Code</label>
  <div class="col-md-10">
    <input class="form-control" name="code" type="text" id="code" value="{{ old('code', optional($coupon)->code) }}"
           minlength="1" maxlength="255" required="true" placeholder="Enter code here...">
    {!! $errors->first('code', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('value') ? 'has-error' : '' }}">
  <label for="value" class="col-md-2 control-label">Value</label>
  <div class="col-md-10">
    <input class="form-control" name="value" type="text" id="value"
           value="{{ old('value', optional($coupon)->value) }}" minlength="1" maxlength="255" required="true"
           placeholder="Enter value here...">
    {!! $errors->first('value', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('minimum_amount') ? 'has-error' : '' }}">
  <label for="minimum_amount" class="col-md-2 control-label">Minimum Amount</label>
  <div class="col-md-10">
    <input class="form-control" name="minimum_amount" type="text" id="minimum_amount"
           value="{{ old('minimum_amount', optional($coupon)->minimum_amount) }}" minlength="1" maxlength="255"
           required="true" placeholder="Enter minimum amount here...">
    {!! $errors->first('minimum_amount', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('maximum_discount') ? 'has-error' : '' }}">
  <label for="maximum_discount" class="col-md-2 control-label">Maximum Discount</label>
  <div class="col-md-10">
    <input class="form-control" name="maximum_discount" type="text" id="maximum_discount"
           value="{{ old('maximum_discount', optional($coupon)->maximum_discount) }}" min="1" max="255"
           required="true" placeholder="Enter maximum discount here...">
    {!! $errors->first('maximum_discount', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('valid_start_time') ? 'has-error' : '' }}">
  <label for="valid_start_time" class="col-md-2 control-label">Valid Start Time</label>
  <div class="col-md-10">
    <input class="form-control" name="valid_start_time" type="text" id="valid_start_time"
           value="{{ old('valid_start_time', optional($coupon)->valid_start_time) }}" minlength="1" required="true"
           placeholder="Enter valid start time here...">
    {!! $errors->first('valid_start_time', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('valid_end_time') ? 'has-error' : '' }}">
  <label for="valid_end_time" class="col-md-2 control-label">Valid End Time</label>
  <div class="col-md-10">
    <input class="form-control" name="valid_end_time" type="text" id="valid_end_time"
           value="{{ old('valid_end_time', optional($coupon)->valid_end_time) }}" minlength="1" required="true"
           placeholder="Enter valid end time here...">
    {!! $errors->first('valid_end_time', '<p class="help-block">:message</p>') !!}
  </div>
</div>

