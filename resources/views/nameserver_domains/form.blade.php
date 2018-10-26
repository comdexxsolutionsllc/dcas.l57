<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
  <label for="name" class="col-md-2 control-label">Name</label>
  <div class="col-md-10">
    <input class="form-control" name="name" type="text" id="name"
           value="{{ old('name', optional($nameserverDomain)->name) }}" minlength="1" maxlength="255"
           required="true" placeholder="Enter name here...">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('master') ? 'has-error' : '' }}">
  <label for="master" class="col-md-2 control-label">Master</label>
  <div class="col-md-10">
    <input class="form-control" name="master" type="text" id="master"
           value="{{ old('master', optional($nameserverDomain)->master) }}" maxlength="255"
           placeholder="Enter master here...">
    {!! $errors->first('master', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('last_check') ? 'has-error' : '' }}">
  <label for="last_check" class="col-md-2 control-label">Last Check</label>
  <div class="col-md-10">
    <input class="form-control" name="last_check" type="number" id="last_check"
           value="{{ old('last_check', optional($nameserverDomain)->last_check) }}" min="-2147483648"
           max="2147483647" placeholder="Enter last check here...">
    {!! $errors->first('last_check', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
  <label for="type" class="col-md-2 control-label">Type</label>
  <div class="col-md-10">
    <input class="form-control" name="type" type="text" id="type"
           value="{{ old('type', optional($nameserverDomain)->type) }}" minlength="1" maxlength="255"
           required="true" placeholder="Enter type here...">
    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('notified_serial') ? 'has-error' : '' }}">
  <label for="notified_serial" class="col-md-2 control-label">Notified Serial</label>
  <div class="col-md-10">
    <input class="form-control" name="notified_serial" type="number" id="notified_serial"
           value="{{ old('notified_serial', optional($nameserverDomain)->notified_serial) }}" min="-2147483648"
           max="2147483647" placeholder="Enter notified serial here...">
    {!! $errors->first('notified_serial', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('account') ? 'has-error' : '' }}">
  <label for="account" class="col-md-2 control-label">Account</label>
  <div class="col-md-10">
    <input class="form-control" name="account" type="text" id="account"
           value="{{ old('account', optional($nameserverDomain)->account) }}" min="0" max="255"
           placeholder="Enter account here...">
    {!! $errors->first('account', '<p class="help-block">:message</p>') !!}
  </div>
</div>

