<div class="form-group {{ $errors->has('serial_number') ? 'has-error' : '' }}">
  <label for="serial_number" class="col-md-2 control-label">Serial Number</label>
  <div class="col-md-10">
    <input class="form-control" name="serial_number" type="text" id="serial_number"
           value="{{ old('serial_number', optional($asset)->serial_number) }}" min="1" max="255" required="true"
           placeholder="Enter serial number here...">
    {!! $errors->first('serial_number', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('hardware_id') ? 'has-error' : '' }}">
  <label for="hardware_id" class="col-md-2 control-label">Hardware</label>
  <div class="col-md-10">
    <select class="form-control" id="hardware_id" name="hardware_id" required="true">
      <option value="" style="display: none;"
              {{ old('hardware_id', optional($asset)->hardware_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Select hardware
      </option>
      @foreach ($hardware as $key => $hardware)
        <option value="{{ $key }}" {{ old('hardware_id', optional($asset)->hardware_id) == $key ? 'selected' : '' }}>
          {{ $hardware }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('hardware_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
  <label for="status" class="col-md-2 control-label">Status</label>
  <div class="col-md-10">
    <input class="form-control" name="status" type="text" id="status"
           value="{{ old('status', optional($asset)->status) }}" minlength="1" maxlength="255" required="true"
           placeholder="Enter status here...">
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('datacenter_id') ? 'has-error' : '' }}">
  <label for="datacenter_id" class="col-md-2 control-label">Datacenter</label>
  <div class="col-md-10">
    <select class="form-control" id="datacenter_id" name="datacenter_id">
      <option value="" style="display: none;"
              {{ old('datacenter_id', optional($asset)->datacenter_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Select datacenter
      </option>
      @foreach ($datacenters as $key => $datacenter)
        <option
          value="{{ $key }}" {{ old('datacenter_id', optional($asset)->datacenter_id) == $key ? 'selected' : '' }}>
          {{ $datacenter }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('datacenter_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('switch_id') ? 'has-error' : '' }}">
  <label for="switch_id" class="col-md-2 control-label">Switch</label>
  <div class="col-md-10">
    <select class="form-control" id="switch_id" name="switch_id">
      <option value="" style="display: none;"
              {{ old('switch_id', optional($asset)->switch_id ?: '') == '' ? 'selected' : '' }} disabled selected>
        Select switch
      </option>
      @foreach ($switches as $key => $switch)
        <option value="{{ $key }}" {{ old('switch_id', optional($asset)->switch_id) == $key ? 'selected' : '' }}>
          {{ $switch }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('switch_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('switchport_id') ? 'has-error' : '' }}">
  <label for="switchport_id" class="col-md-2 control-label">Switchport</label>
  <div class="col-md-10">
    <select class="form-control" id="switchport_id" name="switchport_id">
      <option value="" style="display: none;"
              {{ old('switchport_id', optional($asset)->switchport_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Select switchport
      </option>
      @foreach ($switchports as $key => $switchport)
        <option
          value="{{ $key }}" {{ old('switchport_id', optional($asset)->switchport_id) == $key ? 'selected' : '' }}>
          {{ $switchport }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('switchport_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('network_interface_cards') ? 'has-error' : '' }}">
  <label for="network_interface_cards" class="col-md-2 control-label">Network Interface Cards</label>
  <div class="col-md-10">
        <textarea class="form-control" name="network_interface_cards" cols="50" rows="10" id="network_interface_cards"
                  required="true"
                  placeholder="Enter network interface cards here...">{{ old('network_interface_cards', optional($asset)->network_interface_cards) }}</textarea>
    {!! $errors->first('network_interface_cards', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('port_speed') ? 'has-error' : '' }}">
  <label for="port_speed" class="col-md-2 control-label">Port Speed</label>
  <div class="col-md-10">
    <input class="form-control" name="port_speed" type="text" id="port_speed"
           value="{{ old('port_speed', optional($asset)->port_speed) }}" maxlength="255"
           placeholder="Enter port speed here...">
    {!! $errors->first('port_speed', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('private_ip') ? 'has-error' : '' }}">
  <label for="private_ip" class="col-md-2 control-label">Private Ip</label>
  <div class="col-md-10">
    <input class="form-control" name="private_ip" type="text" id="private_ip"
           value="{{ old('private_ip', optional($asset)->private_ip) }}" maxlength="45"
           placeholder="Enter private ip here...">
    {!! $errors->first('private_ip', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('chassis') ? 'has-error' : '' }}">
  <label for="chassis" class="col-md-2 control-label">Chassis</label>
  <div class="col-md-10">
    <input class="form-control" name="chassis" type="text" id="chassis"
           value="{{ old('chassis', optional($asset)->chassis) }}" minlength="1" maxlength="255" required="true"
           placeholder="Enter chassis here...">
    {!! $errors->first('chassis', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('motherboard_type') ? 'has-error' : '' }}">
  <label for="motherboard_type" class="col-md-2 control-label">Motherboard Type</label>
  <div class="col-md-10">
    <input class="form-control" name="motherboard_type" type="text" id="motherboard_type"
           value="{{ old('motherboard_type', optional($asset)->motherboard_type) }}" minlength="1" maxlength="255"
           required="true" placeholder="Enter motherboard type here...">
    {!! $errors->first('motherboard_type', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('cpus') ? 'has-error' : '' }}">
  <label for="cpus" class="col-md-2 control-label">Cpus</label>
  <div class="col-md-10">
        <textarea class="form-control" name="cpus" cols="50" rows="10" id="cpus" required="true"
                  placeholder="Enter cpus here...">{{ old('cpus', optional($asset)->cpus) }}</textarea>
    {!! $errors->first('cpus', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('memory') ? 'has-error' : '' }}">
  <label for="memory" class="col-md-2 control-label">Memory</label>
  <div class="col-md-10">
        <textarea class="form-control" name="memory" cols="50" rows="10" id="memory" required="true"
                  placeholder="Enter memory here...">{{ old('memory', optional($asset)->memory) }}</textarea>
    {!! $errors->first('memory', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('disks') ? 'has-error' : '' }}">
  <label for="disks" class="col-md-2 control-label">Disks</label>
  <div class="col-md-10">
        <textarea class="form-control" name="disks" cols="50" rows="10" id="disks" required="true"
                  placeholder="Enter disks here...">{{ old('disks', optional($asset)->disks) }}</textarea>
    {!! $errors->first('disks', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('operating_system') ? 'has-error' : '' }}">
  <label for="operating_system" class="col-md-2 control-label">Operating System</label>
  <div class="col-md-10">
    <input class="form-control" name="operating_system" type="text" id="operating_system"
           value="{{ old('operating_system', optional($asset)->operating_system) }}" maxlength="255"
           placeholder="Enter operating system here...">
    {!! $errors->first('operating_system', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('control_panel') ? 'has-error' : '' }}">
  <label for="control_panel" class="col-md-2 control-label">Control Panel</label>
  <div class="col-md-10">
    <input class="form-control" name="control_panel" type="text" id="control_panel"
           value="{{ old('control_panel', optional($asset)->control_panel) }}" maxlength="255"
           placeholder="Enter control panel here...">
    {!! $errors->first('control_panel', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('administrator_password') ? 'has-error' : '' }}">
  <label for="administrator_password" class="col-md-2 control-label">Administrator Password</label>
  <div class="col-md-10">
    <input class="form-control" name="administrator_password" type="text" id="administrator_password"
           value="{{ old('administrator_password', optional($asset)->administrator_password) }}" maxlength="255"
           placeholder="Enter administrator password here...">
    {!! $errors->first('administrator_password', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('onhand_qty') ? 'has-error' : '' }}">
  <label for="onhand_qty" class="col-md-2 control-label">Onhand Qty</label>
  <div class="col-md-10">
    <input class="form-control" name="onhand_qty" type="number" id="onhand_qty"
           value="{{ old('onhand_qty', optional($asset)->onhand_qty) }}" min="0" max="4294967295" required="true"
           placeholder="Enter onhand qty here...">
    {!! $errors->first('onhand_qty', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('pending_testing_qty') ? 'has-error' : '' }}">
  <label for="pending_testing_qty" class="col-md-2 control-label">Pending Testing Qty</label>
  <div class="col-md-10">
    <input class="form-control" name="pending_testing_qty" type="number" id="pending_testing_qty"
           value="{{ old('pending_testing_qty', optional($asset)->pending_testing_qty) }}" min="0" max="4294967295"
           required="true" placeholder="Enter pending testing qty here...">
    {!! $errors->first('pending_testing_qty', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('rma_qty') ? 'has-error' : '' }}">
  <label for="rma_qty" class="col-md-2 control-label">Rma Qty</label>
  <div class="col-md-10">
    <input class="form-control" name="rma_qty" type="number" id="rma_qty"
           value="{{ old('rma_qty', optional($asset)->rma_qty) }}" min="0" max="4294967295" required="true"
           placeholder="Enter rma qty here...">
    {!! $errors->first('rma_qty', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('last_checkin') ? 'has-error' : '' }}">
  <label for="last_checkin" class="col-md-2 control-label">Last Checkin</label>
  <div class="col-md-10">
    <input class="form-control" name="last_checkin" type="text" id="last_checkin"
           value="{{ old('last_checkin', optional($asset)->last_checkin) }}"
           placeholder="Enter last checkin here...">
    {!! $errors->first('last_checkin', '<p class="help-block">:message</p>') !!}
  </div>
</div>

