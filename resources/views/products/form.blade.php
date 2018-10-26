<div class="form-group {{ $errors->has('qty') ? 'has-error' : '' }}">
  <label for="qty" class="col-md-2 control-label">Qty</label>
  <div class="col-md-10">
        <textarea class="form-control" name="qty" cols="50" rows="10" id="qty" required="true"
                  placeholder="Enter qty here...">{{ old('qty', optional($product)->qty) }}</textarea>
    {!! $errors->first('qty', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
  <label for="name" class="col-md-2 control-label">Name</label>
  <div class="col-md-10">
        <textarea class="form-control" name="name" cols="50" rows="10" id="name" required="true"
                  placeholder="Enter name here...">{{ old('name', optional($product)->name) }}</textarea>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('taxable') ? 'has-error' : '' }}">
  <label for="taxable" class="col-md-2 control-label">Taxable</label>
  <div class="col-md-10">
    <div class="checkbox">
      <label for="taxable_1">
        <input id="taxable_1" class="" name="taxable" type="checkbox"
               value="1" {{ old('taxable', optional($product)->taxable) == '1' ? 'checked' : '' }}>
        Yes
      </label>
    </div>

    {!! $errors->first('taxable', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('lineItem') ? 'has-error' : '' }}">
  <label for="lineItem" class="col-md-2 control-label">Line Item</label>
  <div class="col-md-10">
    <div class="checkbox">
      <label for="lineItem_1">
        <input id="lineItem_1" class="" name="lineItem" type="checkbox"
               value="1" {{ old('lineItem', optional($product)->lineItem) == '1' ? 'checked' : '' }}>
        Yes
      </label>
    </div>

    {!! $errors->first('lineItem', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
  <label for="price" class="col-md-2 control-label">Price</label>
  <div class="col-md-10">
        <textarea class="form-control" name="price" cols="50" rows="10" id="price" required="true"
                  placeholder="Enter price here...">{{ old('price', optional($product)->price) }}</textarea>
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
  </div>
</div>

