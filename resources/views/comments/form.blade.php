<div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
  <label for="body" class="col-md-2 control-label">Body</label>
  <div class="col-md-10">
        <textarea class="form-control" name="body" cols="50" rows="10" id="body" required="true"
                  placeholder="Enter body here...">{{ old('body', optional($comment)->body) }}</textarea>
    {!! $errors->first('body', '<p class="help-block">:message</p>') !!}
  </div>
</div>
