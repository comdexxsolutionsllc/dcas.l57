<div class="form-group {{ $errors->has('network_device_id') ? 'has-error' : '' }}">
  <label for="network_device_id" class="col-md-2 control-label">Network Device</label>
  <div class="col-md-10">
    <select class="form-control" id="network_device_id" name="network_device_id" required="true">
      <option value="" style="display: none;"
              {{ old('network_device_id', optional($switchportInformation)->network_device_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Select network device
      </option>
      @foreach ($networkDevices as $key => $networkDevice)
        <option
          value="{{ $key }}" {{ old('network_device_id', optional($switchportInformation)->network_device_id) == $key ? 'selected' : '' }}>
          {{ $networkDevice }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('network_device_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('switchport_number') ? 'has-error' : '' }}">
  <label for="switchport_number" class="col-md-2 control-label">Switchport Number</label>
  <div class="col-md-10">
    <input class="form-control" name="switchport_number" type="number" id="switchport_number"
           value="{{ old('switchport_number', optional($switchportInformation)->switchport_number) }}"
           min="-2147483648" max="2147483647" required="true" placeholder="Enter switchport number here...">
    {!! $errors->first('switchport_number', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
  <label for="category" class="col-md-2 control-label">Category</label>
  <div class="col-md-10">
    <select class="form-control" id="category" name="category" required="true">
      <option value="" style="display: none;"
              {{ old('category', optional($switchportInformation)->category ?: '') == '' ? 'selected' : '' }} disabled
              selected>Enter category here...
      </option>
      @foreach (['managed' => 'Managed',
'hybrid/smart' => 'Hybrid/smart',
'unmanaged' => 'Unmanaged'] as $key => $text)
        <option
          value="{{ $key }}" {{ old('category', optional($switchportInformation)->category) == $key ? 'selected' : '' }}>
          {{ $text }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('port_speed') ? 'has-error' : '' }}">
  <label for="port_speed" class="col-md-2 control-label">Port Speed</label>
  <div class="col-md-10">
    <select class="form-control" id="port_speed" name="port_speed" required="true">
      <option value="" style="display: none;"
              {{ old('port_speed', optional($switchportInformation)->port_speed ?: '') == '' ? 'selected' : '' }} disabled
              selected>Enter port speed here...
      </option>
      @foreach (['10' => '10',
'100' => '100',
'1000' => '1000',
'10000' => '10000',
'40000' => '40000',
'100000' => '100000'] as $key => $text)
        <option
          value="{{ $key }}" {{ old('port_speed', optional($switchportInformation)->port_speed) == $key ? 'selected' : '' }}>
          {{ $text }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('port_speed', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('connection_type') ? 'has-error' : '' }}">
  <label for="connection_type" class="col-md-2 control-label">Connection Type</label>
  <div class="col-md-10">
    <select class="form-control" id="connection_type" name="connection_type" required="true">
      <option value="" style="display: none;"
              {{ old('connection_type', optional($switchportInformation)->connection_type ?: '') == '' ? 'selected' : '' }} disabled
              selected>Enter connection type here...
      </option>
      @foreach (['ethernet/cat-5e' => 'Ethernet/cat-5e',
'ethernet/cat-6' => 'Ethernet/cat-6',
'ethernet/cat-6a' => 'Ethernet/cat-6a',
'ethernet/cat-7' => 'Ethernet/cat-7',
'fiber-channel/infiniband' => 'Fiber-channel/infiniband',
'fiber-channel/osfp' => 'Fiber-channel/osfp',
'fiber-channel/sfp+' => 'Fiber-channel/sfp+',
'fiber-channel/10g-cx4' => 'Fiber-channel/10g-cx4',
'fiber-channel/lc' => 'Fiber-channel/lc',
'fiber-channel/sc' => 'Fiber-channel/sc',
'fiber-channel/st' => 'Fiber-channel/st',
'fiber-optic/st' => 'Fiber-optic/st',
'fiber-optic/sc' => 'Fiber-optic/sc',
'fiber-optic/fc' => 'Fiber-optic/fc',
'fiber-optic/mt-rj' => 'Fiber-optic/mt-rj',
'fiber-optic/lc' => 'Fiber-optic/lc',
'coaxial' => 'Coaxial'] as $key => $text)
        <option
          value="{{ $key }}" {{ old('connection_type', optional($switchportInformation)->connection_type) == $key ? 'selected' : '' }}>
          {{ $text }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('connection_type', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('poe_status') ? 'has-error' : '' }}">
  <label for="poe_status" class="col-md-2 control-label">Poe Status</label>
  <div class="col-md-10">
    <select class="form-control" id="poe_status" name="poe_status" required="true">
      <option value="" style="display: none;"
              {{ old('poe_status', optional($switchportInformation)->poe_status ?: '') == '' ? 'selected' : '' }} disabled
              selected>Enter poe status here...
      </option>
      @foreach (['POE' => 'POE',
'Non-POE' => 'Non-POE'] as $key => $text)
        <option
          value="{{ $key }}" {{ old('poe_status', optional($switchportInformation)->poe_status) == $key ? 'selected' : '' }}>
          {{ $text }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('poe_status', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('stackable_status') ? 'has-error' : '' }}">
  <label for="stackable_status" class="col-md-2 control-label">Stackable Status</label>
  <div class="col-md-10">
    <select class="form-control" id="stackable_status" name="stackable_status" required="true">
      <option value="" style="display: none;"
              {{ old('stackable_status', optional($switchportInformation)->stackable_status ?: '') == '' ? 'selected' : '' }} disabled
              selected>Enter stackable status here...
      </option>
      @foreach (['stackable' => 'Stackable',
'standalone' => 'Standalone'] as $key => $text)
        <option
          value="{{ $key }}" {{ old('stackable_status', optional($switchportInformation)->stackable_status) == $key ? 'selected' : '' }}>
          {{ $text }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('stackable_status', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('duplex_type') ? 'has-error' : '' }}">
  <label for="duplex_type" class="col-md-2 control-label">Duplex Type</label>
  <div class="col-md-10">
    <select class="form-control" id="duplex_type" name="duplex_type" required="true">
      <option value="" style="display: none;"
              {{ old('duplex_type', optional($switchportInformation)->duplex_type ?: '') == '' ? 'selected' : '' }} disabled
              selected>Enter duplex type here...
      </option>
      @foreach (['simplex' => 'Simplex',
'half-duplex' => 'Half-duplex',
'full-duplex' => 'Full-duplex'] as $key => $text)
        <option
          value="{{ $key }}" {{ old('duplex_type', optional($switchportInformation)->duplex_type) == $key ? 'selected' : '' }}>
          {{ $text }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('duplex_type', '<p class="help-block">:message</p>') !!}
  </div>
</div>

