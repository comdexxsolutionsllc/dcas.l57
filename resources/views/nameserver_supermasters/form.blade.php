<div class="form-group {{ $errors->has('ip') ? 'has-error' : '' }}">
  <label for="ip" class="col-md-2 control-label">Ip</label>
  <div class="col-md-10">
    <input class="form-control" name="ip" type="text" id="ip"
           value="{{ old('ip', optional($nameserverSupermaster)->ip) }}" minlength="1" maxlength="45"
           required="true" placeholder="Enter ip here...">
    {!! $errors->first('ip', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('nameserver') ? 'has-error' : '' }}">
  <label for="nameserver" class="col-md-2 control-label">Nameserver</label>
  <div class="col-md-10">
    <input class="form-control" name="nameserver" type="text" id="nameserver"
           value="{{ old('nameserver', optional($nameserverSupermaster)->nameserver) }}" minlength="1"
           maxlength="255" required="true" placeholder="Enter nameserver here...">
    {!! $errors->first('nameserver', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('account') ? 'has-error' : '' }}">
  <label for="account" class="col-md-2 control-label">Account</label>
  <div class="col-md-10">
    <input class="form-control" name="account" type="text" id="account"
           value="{{ old('account', optional($nameserverSupermaster)->account) }}" min="1" max="255" required="true"
           placeholder="Enter account here...">
    {!! $errors->first('account', '<p class="help-block">:message</p>') !!}
  </div>
</div>

