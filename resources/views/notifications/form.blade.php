<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
    <label for="type" class="col-md-2 control-label">Type</label>
    <div class="col-md-10">
        <input class="form-control" name="type" type="text" id="type"
               value="{{ old('type', optional($notification)->type) }}" minlength="1" maxlength="255" required="true"
               placeholder="Enter type here...">
        {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('data') ? 'has-error' : '' }}">
    <label for="data" class="col-md-2 control-label">Data</label>
    <div class="col-md-10">
        <textarea class="form-control" name="data" cols="50" rows="10" id="data" required="true"
                  placeholder="Enter data here...">{{ old('data', optional($notification)->data) }}</textarea>
        {!! $errors->first('data', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('read_at') ? 'has-error' : '' }}">
    <label for="read_at" class="col-md-2 control-label">Read At</label>
    <div class="col-md-10">
        <input class="form-control" name="read_at" type="text" id="read_at"
               value="{{ old('read_at', optional($notification)->read_at) }}" placeholder="Enter read at here...">
        {!! $errors->first('read_at', '<p class="help-block">:message</p>') !!}
    </div>
</div>

