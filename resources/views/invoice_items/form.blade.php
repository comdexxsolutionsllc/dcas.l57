<div class="form-group {{ $errors->has('invoice_id') ? 'has-error' : '' }}">
  <label for="invoice_id" class="col-md-2 control-label">Invoice</label>
  <div class="col-md-10">
    <select class="form-control" id="invoice_id" name="invoice_id" required="true">
      <option value="" style="display: none;"
              {{ old('invoice_id', optional($invoiceItem)->invoice_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Select invoice
      </option>
      @foreach ($invoices as $key => $invoice)
        <option
          value="{{ $key }}" {{ old('invoice_id', optional($invoiceItem)->invoice_id) == $key ? 'selected' : '' }}>
          {{ $invoice }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('invoice_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('service_id') ? 'has-error' : '' }}">
  <label for="service_id" class="col-md-2 control-label">Service</label>
  <div class="col-md-10">
    <select class="form-control" id="service_id" name="service_id" required="true">
      <option value="" style="display: none;"
              {{ old('service_id', optional($invoiceItem)->service_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Select service
      </option>
      @foreach ($services as $key => $service)
        <option
          value="{{ $key }}" {{ old('service_id', optional($invoiceItem)->service_id) == $key ? 'selected' : '' }}>
          {{ $service }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('service_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
  <label for="description" class="col-md-2 control-label">Description</label>
  <div class="col-md-10">
        <textarea class="form-control" name="description" cols="50" rows="10" id="description"
                  required="true">{{ old('description', optional($invoiceItem)->description) }}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
  <label for="price" class="col-md-2 control-label">Price</label>
  <div class="col-md-10">
    <input class="form-control" name="price" type="text" id="price"
           value="{{ old('price', optional($invoiceItem)->price) }}" minlength="1" maxlength="255" required="true"
           placeholder="Enter price here...">
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
  </div>
</div>

