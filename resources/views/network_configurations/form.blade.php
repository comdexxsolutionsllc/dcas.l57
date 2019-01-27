<div class="form-group {{ $errors->has('switchport_information_id') ? 'has-error' : '' }}">
  <label for="switchport_information_id" class="col-md-2 control-label">Switchport Information</label>
  <div class="col-md-10">
    <select class="form-control" id="switchport_information_id" name="switchport_information_id" required="true">
      <option value="" style="display: none;"
              {{ old('switchport_information_id', optional($networkConfiguration)->switchport_information_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Select switchport information
      </option>
      @foreach ($switchportInformations as $key => $switchportInformation)
        <option
          value="{{ $key }}" {{ old('switchport_information_id', optional($networkConfiguration)->switchport_information_id) == $key ? 'selected' : '' }}>
          {{ $switchportInformation }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('switchport_information_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('configuration') ? 'has-error' : '' }}">
  <label for="configuration" class="col-md-2 control-label">Configuration</label>
  <div class="col-md-10">
    <input class="form-control" name="configuration" type="text" id="configuration"
           value="{{ old('configuration', optional($networkConfiguration)->configuration) }}" minlength="1"
           maxlength="4294967295" required="true" placeholder="Enter configuration here...">
    {!! $errors->first('configuration', '<p class="help-block">:message</p>') !!}
  </div>
</div>

