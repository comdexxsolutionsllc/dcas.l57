<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
  <label for="name" class="col-md-2 control-label">Name</label>
  <div class="col-md-10">
    <input class="form-control" name="name" type="text" id="name"
           value="{{ old('name', optional($tsigkey)->name) }}" minlength="1" maxlength="255" required="true"
           placeholder="Enter name here...">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('algorithm') ? 'has-error' : '' }}">
  <label for="algorithm" class="col-md-2 control-label">Algorithm</label>
  <div class="col-md-10">
    <input class="form-control" name="algorithm" type="text" id="algorithm"
           value="{{ old('algorithm', optional($tsigkey)->algorithm) }}" minlength="1" maxlength="255"
           required="true" placeholder="Enter algorithm here...">
    {!! $errors->first('algorithm', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('secret') ? 'has-error' : '' }}">
  <label for="secret" class="col-md-2 control-label">Secret</label>
  <div class="col-md-10">
    <input class="form-control" name="secret" type="text" id="secret"
           value="{{ old('secret', optional($tsigkey)->secret) }}" minlength="1" maxlength="255" required="true"
           placeholder="Enter secret here...">
    {!! $errors->first('secret', '<p class="help-block">:message</p>') !!}
  </div>
</div>

