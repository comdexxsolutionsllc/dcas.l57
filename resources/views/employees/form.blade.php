<div class="form-group {{ $errors->has('employee_id') ? 'has-error' : '' }}">
  <label for="employee_id" class="col-md-2 control-label">Employee</label>
  <div class="col-md-10">
    <select class="form-control" id="employee_id" name="employee_id" required="true">
      <option value="" style="display: none;"
              {{ old('employee_id', optional($employee)->employee_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Select employee
      </option>
      @foreach ($employees as $key => $employee)
        <option value="{{ $key }}" {{ old('employee_id', optional($employee)->employee_id) == $key ? 'selected' : '' }}>
          {{ $employee }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('employee_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
  <label for="name" class="col-md-2 control-label">Name</label>
  <div class="col-md-10">
    <input class="form-control" name="name" type="text" id="name"
           value="{{ old('name', optional($employee)->name) }}" minlength="1" maxlength="255" required="true"
           placeholder="Enter name here...">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
  <label for="username" class="col-md-2 control-label">Username</label>
  <div class="col-md-10">
    <input class="form-control" name="username" type="text" id="username"
           value="{{ old('username', optional($employee)->username) }}" minlength="1" maxlength="255"
           required="true" placeholder="Enter username here...">
    {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
  <label for="email" class="col-md-2 control-label">Email</label>
  <div class="col-md-10">
    <input class="form-control" name="email" type="text" id="email"
           value="{{ old('email', optional($employee)->email) }}" minlength="1" maxlength="255" required="true"
           placeholder="Enter email here...">
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('email_verified_at') ? 'has-error' : '' }}">
  <label for="email_verified_at" class="col-md-2 control-label">Email Verified At</label>
  <div class="col-md-10">
    <input class="form-control" name="email_verified_at" type="text" id="email_verified_at"
           value="{{ old('email_verified_at', optional($employee)->email_verified_at) }}"
           placeholder="Enter email verified at here...">
    {!! $errors->first('email_verified_at', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
  <label for="password" class="col-md-2 control-label">Password</label>
  <div class="col-md-10">
    <input class="form-control" name="password" type="text" id="password"
           value="{{ old('password', optional($employee)->password) }}" minlength="1" maxlength="255"
           required="true" placeholder="Enter password here...">
    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('cover') ? 'has-error' : '' }}">
  <label for="cover" class="col-md-2 control-label">Cover</label>
  <div class="col-md-10">
    <input class="form-control" name="cover" type="text" id="cover"
           value="{{ old('cover', optional($employee)->cover) }}" maxlength="255" placeholder="Enter cover here...">
    {!! $errors->first('cover', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
  <label for="avatar" class="col-md-2 control-label">Avatar</label>
  <div class="col-md-10">
    <input class="form-control" name="avatar" type="text" id="avatar"
           value="{{ old('avatar', optional($employee)->avatar) }}" maxlength="255">
    {!! $errors->first('avatar', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('remember_token') ? 'has-error' : '' }}">
  <label for="remember_token" class="col-md-2 control-label">Remember Token</label>
  <div class="col-md-10">
    <input class="form-control" name="remember_token" type="text" id="remember_token"
           value="{{ old('remember_token', optional($employee)->remember_token) }}" maxlength="100"
           placeholder="Enter remember token here...">
    {!! $errors->first('remember_token', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('google2fa_secret') ? 'has-error' : '' }}">
  <label for="google2fa_secret" class="col-md-2 control-label">Google2Fa Secret</label>
  <div class="col-md-10">
        <textarea class="form-control" name="google2fa_secret" cols="50" rows="10" id="google2fa_secret"
                  placeholder="Enter google2fa secret here...">{{ old('google2fa_secret', optional($employee)->google2fa_secret) }}</textarea>
    {!! $errors->first('google2fa_secret', '<p class="help-block">:message</p>') !!}
  </div>
</div>

