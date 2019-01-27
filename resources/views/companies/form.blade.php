<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
  <label for="name" class="col-md-2 control-label">Name</label>
  <div class="col-md-10">
    <input class="form-control" name="name" type="text" id="name"
           value="{{ old('name', optional($company)->name) }}" minlength="1" maxlength="255" required="true"
           placeholder="Enter name here...">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('contact_name') ? 'has-error' : '' }}">
  <label for="contact_name" class="col-md-2 control-label">Contact Name</label>
  <div class="col-md-10">
    <input class="form-control" name="contact_name" type="text" id="contact_name"
           value="{{ old('contact_name', optional($company)->contact_name) }}" minlength="1" maxlength="255"
           required="true" placeholder="Enter contact name here...">
    {!! $errors->first('contact_name', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('contact_email') ? 'has-error' : '' }}">
  <label for="contact_email" class="col-md-2 control-label">Contact Email</label>
  <div class="col-md-10">
    <input class="form-control" name="contact_email" type="text" id="contact_email"
           value="{{ old('contact_email', optional($company)->contact_email) }}" maxlength="255"
           placeholder="Enter contact email here...">
    {!! $errors->first('contact_email', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('contact_phone') ? 'has-error' : '' }}">
  <label for="contact_phone" class="col-md-2 control-label">Contact Phone</label>
  <div class="col-md-10">
    <input class="form-control" name="contact_phone" type="text" id="contact_phone"
           value="{{ old('contact_phone', optional($company)->contact_phone) }}" maxlength="255"
           placeholder="Enter contact phone here...">
    {!! $errors->first('contact_phone', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('phone_type') ? 'has-error' : '' }}">
  <label for="phone_type" class="col-md-2 control-label">Phone Type</label>
  <div class="col-md-10">
    <select class="form-control" id="phone_type" name="phone_type" required="true">
      <option value="" style="display: none;"
              {{ old('phone_type', optional($company)->phone_type ?: '') == '' ? 'selected' : '' }} disabled
              selected>Enter phone type here...
      </option>
      @foreach (['home' => 'Home',
'mobile' => 'Mobile',
'office' => 'Office',
'work' => 'Work',
'other' => 'Other'] as $key => $text)
        <option value="{{ $key }}" {{ old('phone_type', optional($company)->phone_type) == $key ? 'selected' : '' }}>
          {{ $text }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('phone_type', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('active') ? 'has-error' : '' }}">
  <label for="active" class="col-md-2 control-label">Active</label>
  <div class="col-md-10">
    <div class="checkbox">
      <label for="active_1">
        <input id="active_1" class="" name="active" type="checkbox"
               value="1" {{ old('active', optional($company)->active) == '1' ? 'checked' : '' }}>
        Yes
      </label>
    </div>

    {!! $errors->first('active', '<p class="help-block">:message</p>') !!}
  </div>
</div>

