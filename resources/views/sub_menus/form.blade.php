<div class="form-group {{ $errors->has('text') ? 'has-error' : '' }}">
  <label for="text" class="col-md-2 control-label">Text</label>
  <div class="col-md-10">
        <textarea class="form-control" name="text" cols="50" rows="10" id="text" required="true"
                  placeholder="Enter text here...">{{ old('text', optional($subMenu)->text) }}</textarea>
    {!! $errors->first('text', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('url') ? 'has-error' : '' }}">
  <label for="url" class="col-md-2 control-label">Url</label>
  <div class="col-md-10">
    <input class="form-control" name="url" type="text" id="url" value="{{ old('url', optional($subMenu)->url) }}"
           minlength="1" maxlength="255" required="true" placeholder="Enter url here...">
    {!! $errors->first('url', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('target') ? 'has-error' : '' }}">
  <label for="target" class="col-md-2 control-label">Target</label>
  <div class="col-md-10">
    <input class="form-control" name="target" type="text" id="target"
           value="{{ old('target', optional($subMenu)->target) }}" maxlength="255"
           placeholder="Enter target here...">
    {!! $errors->first('target', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('route') ? 'has-error' : '' }}">
  <label for="route" class="col-md-2 control-label">Route</label>
  <div class="col-md-10">
    <input class="form-control" name="route" type="text" id="route"
           value="{{ old('route', optional($subMenu)->route) }}" maxlength="255" placeholder="Enter route here...">
    {!! $errors->first('route', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('icon') ? 'has-error' : '' }}">
  <label for="icon" class="col-md-2 control-label">Icon</label>
  <div class="col-md-10">
    <input class="form-control" name="icon" type="text" id="icon"
           value="{{ old('icon', optional($subMenu)->icon) }}" maxlength="255" placeholder="Enter icon here...">
    {!! $errors->first('icon', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('level') ? 'has-error' : '' }}">
  <label for="level" class="col-md-2 control-label">Level</label>
  <div class="col-md-10">
    <input class="form-control" name="level" type="number" id="level"
           value="{{ old('level', optional($subMenu)->level) }}" min="0" max="4294967295" required="true"
           placeholder="Enter level here...">
    {!! $errors->first('level', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('can') ? 'has-error' : '' }}">
  <label for="can" class="col-md-2 control-label">Can</label>
  <div class="col-md-10">
    <input class="form-control" name="can" type="text" id="can" value="{{ old('can', optional($subMenu)->can) }}"
           maxlength="255" placeholder="Enter can here...">
    {!! $errors->first('can', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('menu_id') ? 'has-error' : '' }}">
  <label for="menu_id" class="col-md-2 control-label">Menu</label>
  <div class="col-md-10">
    <select class="form-control" id="menu_id" name="menu_id">
      <option value="" style="display: none;"
              {{ old('menu_id', optional($subMenu)->menu_id ?: '') == '' ? 'selected' : '' }} disabled selected>
        Select menu
      </option>
      @foreach ($menus as $key => $menu)
        <option value="{{ $key }}" {{ old('menu_id', optional($subMenu)->menu_id) == $key ? 'selected' : '' }}>
          {{ $menu }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('menu_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('submenu_id') ? 'has-error' : '' }}">
  <label for="submenu_id" class="col-md-2 control-label">Submenu</label>
  <div class="col-md-10">
    <select class="form-control" id="submenu_id" name="submenu_id">
      <option value="" style="display: none;"
              {{ old('submenu_id', optional($subMenu)->submenu_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Select submenu
      </option>
      @foreach ($submenus as $key => $submenu)
        <option value="{{ $key }}" {{ old('submenu_id', optional($subMenu)->submenu_id) == $key ? 'selected' : '' }}>
          {{ $submenu }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('submenu_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

