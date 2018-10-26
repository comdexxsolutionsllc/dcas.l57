<div class="form-group {{ $errors->has('employee_id') ? 'has-error' : '' }}">
  <label for="employee_id" class="col-md-2 control-label">Employee</label>
  <div class="col-md-10">
    <select class="form-control" id="employee_id" name="employee_id" required="true">
      <option value="" style="display: none;"
              {{ old('employee_id', optional($salesRep)->employee_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Select employee
      </option>
      @foreach ($employees as $key => $employee)
        <option value="{{ $key }}" {{ old('employee_id', optional($salesRep)->employee_id) == $key ? 'selected' : '' }}>
          {{ $employee }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('employee_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('company_id') ? 'has-error' : '' }}">
  <label for="company_id" class="col-md-2 control-label">Company</label>
  <div class="col-md-10">
    <select class="form-control" id="company_id" name="company_id" required="true">
      <option value="" style="display: none;"
              {{ old('company_id', optional($salesRep)->company_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Select company
      </option>
      @foreach ($companies as $key => $company)
        <option value="{{ $key }}" {{ old('company_id', optional($salesRep)->company_id) == $key ? 'selected' : '' }}>
          {{ $company }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('company_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

