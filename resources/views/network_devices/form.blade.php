<div class="form-group {{ $errors->has('asset_number') ? 'has-error' : '' }}">
  <label for="asset_number" class="col-md-2 control-label">Asset Number</label>
  <div class="col-md-10">
    <input class="form-control" name="asset_number" type="text" id="asset_number"
           value="{{ old('asset_number', optional($networkDevice)->asset_number) }}" min="1" max="255"
           required="true" placeholder="Enter asset number here...">
    {!! $errors->first('asset_number', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('serial_number') ? 'has-error' : '' }}">
  <label for="serial_number" class="col-md-2 control-label">Serial Number</label>
  <div class="col-md-10">
    <input class="form-control" name="serial_number" type="text" id="serial_number"
           value="{{ old('serial_number', optional($networkDevice)->serial_number) }}" min="0" max="255"
           placeholder="Enter serial number here...">
    {!! $errors->first('serial_number', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('network_device_type_id') ? 'has-error' : '' }}">
  <label for="network_device_type_id" class="col-md-2 control-label">Network Device Type</label>
  <div class="col-md-10">
    <select class="form-control" id="network_device_type_id" name="network_device_type_id" required="true">
      <option value="" style="display: none;"
              {{ old('network_device_type_id', optional($networkDevice)->network_device_type_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Select network device type
      </option>
      @foreach ($networkDeviceTypes as $key => $networkDeviceType)
        <option
          value="{{ $key }}" {{ old('network_device_type_id', optional($networkDevice)->network_device_type_id) == $key ? 'selected' : '' }}>
          {{ $networkDeviceType }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('network_device_type_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('hostname') ? 'has-error' : '' }}">
  <label for="hostname" class="col-md-2 control-label">Hostname</label>
  <div class="col-md-10">
    <input class="form-control" name="hostname" type="text" id="hostname"
           value="{{ old('hostname', optional($networkDevice)->hostname) }}" minlength="1" maxlength="255"
           required="true" placeholder="Enter hostname here...">
    {!! $errors->first('hostname', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('ip_address') ? 'has-error' : '' }}">
  <label for="ip_address" class="col-md-2 control-label">Ip Address</label>
  <div class="col-md-10">
    <input class="form-control" name="ip_address" type="text" id="ip_address"
           value="{{ old('ip_address', optional($networkDevice)->ip_address) }}" minlength="1" maxlength="45"
           required="true" placeholder="Enter ip address here...">
    {!! $errors->first('ip_address', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('ip_address_alt') ? 'has-error' : '' }}">
  <label for="ip_address_alt" class="col-md-2 control-label">Ip Address Alt</label>
  <div class="col-md-10">
    <input class="form-control" name="ip_address_alt" type="text" id="ip_address_alt"
           value="{{ old('ip_address_alt', optional($networkDevice)->ip_address_alt) }}" maxlength="45"
           placeholder="Enter ip address alt here...">
    {!! $errors->first('ip_address_alt', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('hardware_maker') ? 'has-error' : '' }}">
  <label for="hardware_maker" class="col-md-2 control-label">Hardware Maker</label>
  <div class="col-md-10">
    <input class="form-control" name="hardware_maker" type="text" id="hardware_maker"
           value="{{ old('hardware_maker', optional($networkDevice)->hardware_maker) }}" minlength="1"
           maxlength="255" required="true" placeholder="Enter hardware maker here...">
    {!! $errors->first('hardware_maker', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('hardware_version') ? 'has-error' : '' }}">
  <label for="hardware_version" class="col-md-2 control-label">Hardware Version</label>
  <div class="col-md-10">
    <input class="form-control" name="hardware_version" type="text" id="hardware_version"
           value="{{ old('hardware_version', optional($networkDevice)->hardware_version) }}" minlength="1"
           maxlength="255" required="true" placeholder="Enter hardware version here...">
    {!! $errors->first('hardware_version', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('device_os_version') ? 'has-error' : '' }}">
  <label for="device_os_version" class="col-md-2 control-label">Device Os Version</label>
  <div class="col-md-10">
    <input class="form-control" name="device_os_version" type="text" id="device_os_version"
           value="{{ old('device_os_version', optional($networkDevice)->device_os_version) }}" minlength="1"
           maxlength="255" required="true" placeholder="Enter device os version here...">
    {!! $errors->first('device_os_version', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('total_ports') ? 'has-error' : '' }}">
  <label for="total_ports" class="col-md-2 control-label">Total Ports</label>
  <div class="col-md-10">
    <input class="form-control" name="total_ports" type="number" id="total_ports"
           value="{{ old('total_ports', optional($networkDevice)->total_ports) }}" min="0" max="4294967295"
           required="true" placeholder="Enter total ports here...">
    {!! $errors->first('total_ports', '<p class="help-block">:message</p>') !!}
  </div>
</div>

