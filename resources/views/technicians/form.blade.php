<div class="form-group {{ $errors->has('department_id') ? 'has-error' : '' }}">
  <label for="department_id" class="col-md-2 control-label">Department</label>
  <div class="col-md-10">
    <select class="form-control" id="department_id" name="department_id" required="true">
      <option value="" style="display: none;"
              {{ old('department_id', optional($technician)->department_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Select department
      </option>
      @foreach ($departments as $key => $department)
        <option
          value="{{ $key }}" {{ old('department_id', optional($technician)->department_id) == $key ? 'selected' : '' }}>
          {{ $department }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('department_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
  <label for="user_id" class="col-md-2 control-label">User</label>
  <div class="col-md-10">
    <select class="form-control" id="user_id" name="user_id" required="true">
      <option value="" style="display: none;"
              {{ old('user_id', optional($technician)->user_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Select user
      </option>
      @foreach ($users as $key => $user)
        <option value="{{ $key }}" {{ old('user_id', optional($technician)->user_id) == $key ? 'selected' : '' }}>
          {{ $user }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

