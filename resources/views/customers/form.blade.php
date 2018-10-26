<div class="form-group {{ $errors->has('account_id') ? 'has-error' : '' }}">
  <label for="account_id" class="col-md-2 control-label">Account</label>
  <div class="col-md-10">
    <select class="form-control" id="account_id" name="account_id" required="true">
      <option value="" style="display: none;"
              {{ old('account_id', optional($customer)->account_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Enter account here...
      </option>
      @foreach ($accounts as $key => $account)
        <option value="{{ $key }}" {{ old('account_id', optional($customer)->account_id) == $key ? 'selected' : '' }}>
          {{ $account }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('account_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
  <label for="name" class="col-md-2 control-label">Name</label>
  <div class="col-md-10">
    <input class="form-control" name="name" type="text" id="name"
           value="{{ old('name', optional($customer)->name) }}" minlength="1" maxlength="255" required="true"
           placeholder="Enter name here...">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
  <label for="username" class="col-md-2 control-label">Username</label>
  <div class="col-md-10">
    <input class="form-control" name="username" type="text" id="username"
           value="{{ old('username', optional($customer)->username) }}" minlength="1" maxlength="255"
           required="true" placeholder="Enter username here...">
    {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
  <label for="email" class="col-md-2 control-label">Email</label>
  <div class="col-md-10">
    <input class="form-control" name="email" type="text" id="email"
           value="{{ old('email', optional($customer)->email) }}" minlength="1" maxlength="255" required="true"
           placeholder="Enter email here...">
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('email_verified_at') ? 'has-error' : '' }}">
  <label for="email_verified_at" class="col-md-2 control-label">Email Verified At</label>
  <div class="col-md-10">
    <input class="form-control" name="email_verified_at" type="text" id="email_verified_at"
           value="{{ old('email_verified_at', optional($customer)->email_verified_at) }}"
           placeholder="Enter email verified at here...">
    {!! $errors->first('email_verified_at', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
  <label for="password" class="col-md-2 control-label">Password</label>
  <div class="col-md-10">
    <input class="form-control" name="password" type="text" id="password"
           value="{{ old('password', optional($customer)->password) }}" minlength="1" maxlength="255"
           required="true" placeholder="Enter password here...">
    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('stripe_id') ? 'has-error' : '' }}">
  <label for="stripe_id" class="col-md-2 control-label">Stripe</label>
  <div class="col-md-10">
    <select class="form-control" id="stripe_id" name="stripe_id">
      <option value="" style="display: none;"
              {{ old('stripe_id', optional($customer)->stripe_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Select stripe
      </option>
      @foreach ($stripes as $key => $stripe)
        <option value="{{ $key }}" {{ old('stripe_id', optional($customer)->stripe_id) == $key ? 'selected' : '' }}>
          {{ $stripe }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('stripe_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('card_brand') ? 'has-error' : '' }}">
  <label for="card_brand" class="col-md-2 control-label">Card Brand</label>
  <div class="col-md-10">
    <input class="form-control" name="card_brand" type="text" id="card_brand"
           value="{{ old('card_brand', optional($customer)->card_brand) }}" maxlength="255"
           placeholder="Enter card brand here...">
    {!! $errors->first('card_brand', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('card_last_four') ? 'has-error' : '' }}">
  <label for="card_last_four" class="col-md-2 control-label">Card Last Four</label>
  <div class="col-md-10">
    <input class="form-control" name="card_last_four" type="text" id="card_last_four"
           value="{{ old('card_last_four', optional($customer)->card_last_four) }}" maxlength="255"
           placeholder="Enter card last four here...">
    {!! $errors->first('card_last_four', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('trial_ends_at') ? 'has-error' : '' }}">
  <label for="trial_ends_at" class="col-md-2 control-label">Trial Ends At</label>
  <div class="col-md-10">
    <input class="form-control" name="trial_ends_at" type="text" id="trial_ends_at"
           value="{{ old('trial_ends_at', optional($customer)->trial_ends_at) }}"
           placeholder="Enter trial ends at here...">
    {!! $errors->first('trial_ends_at', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('cover') ? 'has-error' : '' }}">
  <label for="cover" class="col-md-2 control-label">Cover</label>
  <div class="col-md-10">
    <input class="form-control" name="cover" type="text" id="cover"
           value="{{ old('cover', optional($customer)->cover) }}" maxlength="255" placeholder="Enter cover here...">
    {!! $errors->first('cover', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
  <label for="avatar" class="col-md-2 control-label">Avatar</label>
  <div class="col-md-10">
    <input class="form-control" name="avatar" type="text" id="avatar"
           value="{{ old('avatar', optional($customer)->avatar) }}" maxlength="255">
    {!! $errors->first('avatar', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('remember_token') ? 'has-error' : '' }}">
  <label for="remember_token" class="col-md-2 control-label">Remember Token</label>
  <div class="col-md-10">
    <input class="form-control" name="remember_token" type="text" id="remember_token"
           value="{{ old('remember_token', optional($customer)->remember_token) }}" maxlength="100"
           placeholder="Enter remember token here...">
    {!! $errors->first('remember_token', '<p class="help-block">:message</p>') !!}
  </div>
</div>

