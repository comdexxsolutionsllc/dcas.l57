<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($status)->name) }}"
               minlength="1" maxlength="255" required="true" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">Description</label>
    <div class="col-md-10">
        <textarea class="form-control" name="description" cols="50" rows="10"
                  id="description">{{ old('description', optional($status)->description) }}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('hexcode') ? 'has-error' : '' }}">
    <label for="hexcode" class="col-md-2 control-label">Hexcode</label>
    <div class="col-md-10">
        <input class="form-control" name="hexcode" type="text" id="hexcode"
               value="{{ old('hexcode', optional($status)->hexcode) }}" minlength="1" maxlength="255" required="true"
               placeholder="Enter hexcode here...">
        {!! $errors->first('hexcode', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('visible') ? 'has-error' : '' }}">
    <label for="visible" class="col-md-2 control-label">Visible</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="visible_1">
                <input id="visible_1" class="" name="visible" type="checkbox"
                       value="1" {{ old('visible', optional($status)->visible) == '1' ? 'checked' : '' }}>
                Yes
            </label>
        </div>

        {!! $errors->first('visible', '<p class="help-block">:message</p>') !!}
    </div>
</div>

