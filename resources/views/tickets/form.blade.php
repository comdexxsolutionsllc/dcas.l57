<div class="form-group {{ $errors->has('ticket_id') ? 'has-error' : '' }}">
    <label for="ticket_id" class="col-md-2 control-label">Ticket</label>
    <div class="col-md-10">
        <select class="form-control" id="ticket_id" name="ticket_id" required="true">
            <option value="" style="display: none;"
                    {{ old('ticket_id', optional($ticket)->ticket_id ?: '') == '' ? 'selected' : '' }} disabled
                    selected>Select ticket
            </option>
            @foreach ($tickets as $key => $ticket)
                <option value="{{ $key }}" {{ old('ticket_id', optional($ticket)->ticket_id) == $key ? 'selected' : '' }}>
                    {{ $ticket }}
                </option>
            @endforeach
        </select>

        {!! $errors->first('ticket_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
    <label for="title" class="col-md-2 control-label">Title</label>
    <div class="col-md-10">
        <input class="form-control" name="title" type="text" id="title"
               value="{{ old('title', optional($ticket)->title) }}" minlength="1" maxlength="255" required="true"
               placeholder="Enter title here...">
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
    <label for="body" class="col-md-2 control-label">Body</label>
    <div class="col-md-10">
        <textarea class="form-control" name="body" cols="50" rows="10" id="body" required="true"
                  placeholder="Enter body here...">{{ old('body', optional($ticket)->body) }}</textarea>
        {!! $errors->first('body', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('status_id') ? 'has-error' : '' }}">
    <label for="status_id" class="col-md-2 control-label">Status</label>
    <div class="col-md-10">
        <select class="form-control" id="status_id" name="status_id" required="true">
            <option value="" style="display: none;"
                    {{ old('status_id', optional($ticket)->status_id ?: '') == '' ? 'selected' : '' }} disabled
                    selected>Select status
            </option>
            @foreach ($statuses as $key => $status)
                <option value="{{ $key }}" {{ old('status_id', optional($ticket)->status_id) == $key ? 'selected' : '' }}>
                    {{ $status }}
                </option>
            @endforeach
        </select>

        {!! $errors->first('status_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('department_id') ? 'has-error' : '' }}">
    <label for="department_id" class="col-md-2 control-label">Department</label>
    <div class="col-md-10">
        <select class="form-control" id="department_id" name="department_id" required="true">
            <option value="" style="display: none;"
                    {{ old('department_id', optional($ticket)->department_id ?: '') == '' ? 'selected' : '' }} disabled
                    selected>Select department
            </option>
            @foreach ($departments as $key => $department)
                <option value="{{ $key }}" {{ old('department_id', optional($ticket)->department_id) == $key ? 'selected' : '' }}>
                    {{ $department }}
                </option>
            @endforeach
        </select>

        {!! $errors->first('department_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('is_resolved') ? 'has-error' : '' }}">
    <label for="is_resolved" class="col-md-2 control-label">Is Resolved</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="is_resolved_1">
                <input id="is_resolved_1" class="" name="is_resolved" type="checkbox"
                       value="1" {{ old('is_resolved', optional($ticket)->is_resolved) == '1' ? 'checked' : '' }}>
                Yes
            </label>
        </div>

        {!! $errors->first('is_resolved', '<p class="help-block">:message</p>') !!}
    </div>
</div>

