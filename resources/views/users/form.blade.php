<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
  <label for="name" class="col-md-2 control-label">Name</label>
  <div class="col-md-10">
    <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($user)->name) }}"
           minlength="1" maxlength="255" required="true" placeholder="Enter name here...">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
  <label for="username" class="col-md-2 control-label">Username</label>
  <div class="col-md-10">
    <input class="form-control" name="username" type="text" id="username"
           value="{{ old('username', optional($user)->username) }}" minlength="1" maxlength="255" required="true"
           placeholder="Enter username here...">
    {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
  <label for="email" class="col-md-2 control-label">Email</label>
  <div class="col-md-10">
    <input class="form-control" name="email" type="text" id="email"
           value="{{ old('email', optional($user)->email) }}" minlength="1" maxlength="255" required="true"
           placeholder="Enter email here...">
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('stripe_id') ? 'has-error' : '' }}">
  <label for="stripe_id" class="col-md-2 control-label">Stripe</label>
  <div class="col-md-10">
    <select class="form-control" id="stripe_id" name="stripe_id">
      <option value="" style="display: none;"
              {{ old('stripe_id', optional($user)->stripe_id ?: '') == '' ? 'selected' : '' }} disabled selected>
        Select stripe
      </option>
      @foreach ($stripes as $key => $stripe)
        <option value="{{ $key }}" {{ old('stripe_id', optional($user)->stripe_id) == $key ? 'selected' : '' }}>
          {{ $stripe }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('stripe_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('trial_ends_at') ? 'has-error' : '' }}">
  <label for="trial_ends_at" class="col-md-2 control-label">Trial Ends At</label>
  <div class="col-md-10">
    <input class="form-control" name="trial_ends_at" type="text" id="trial_ends_at"
           value="{{ old('trial_ends_at', optional($user)->trial_ends_at) }}"
           placeholder="Enter trial ends at here...">
    {!! $errors->first('trial_ends_at', '<p class="help-block">:message</p>') !!}
  </div>
</div>
