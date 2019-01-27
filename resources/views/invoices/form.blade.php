<div class="form-group {{ $errors->has('customer_id') ? 'has-error' : '' }}">
  <label for="customer_id" class="col-md-2 control-label">Customer</label>
  <div class="col-md-10">
    <select class="form-control" id="customer_id" name="customer_id" required="true">
      <option value="" style="display: none;"
              {{ old('customer_id', optional($invoice)->customer_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Select customer
      </option>
      @foreach ($customers as $key => $customer)
        <option value="{{ $key }}" {{ old('customer_id', optional($invoice)->customer_id) == $key ? 'selected' : '' }}>
          {{ $customer }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('customer_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('subtotal') ? 'has-error' : '' }}">
  <label for="subtotal" class="col-md-2 control-label">Subtotal</label>
  <div class="col-md-10">
    <input class="form-control" name="subtotal" type="text" id="subtotal"
           value="{{ old('subtotal', optional($invoice)->subtotal) }}" minlength="1" maxlength="255" required="true"
           placeholder="Enter subtotal here...">
    {!! $errors->first('subtotal', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('payment_option') ? 'has-error' : '' }}">
  <label for="payment_option" class="col-md-2 control-label">Payment Option</label>
  <div class="col-md-10">
    <select class="form-control" id="payment_option" name="payment_option" required="true">
      <option value="" style="display: none;"
              {{ old('payment_option', optional($invoice)->payment_option ?: '') == '' ? 'selected' : '' }} disabled
              selected>Enter payment option here...
      </option>
      @foreach (['check' => 'Check',
'credit card' => 'Credit Card',
'free' => 'Free',
'mail' => 'Mail',
'NET 30' => 'NET 30',
'NET 90' => 'NET 90',
'paypal' => 'Paypal'] as $key => $text)
        <option
          value="{{ $key }}" {{ old('payment_option', optional($invoice)->payment_option) == $key ? 'selected' : '' }}>
          {{ $text }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('payment_option', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('transaction_id') ? 'has-error' : '' }}">
  <label for="transaction_id" class="col-md-2 control-label">Transaction</label>
  <div class="col-md-10">
    <select class="form-control" id="transaction_id" name="transaction_id" required="true">
      <option value="" style="display: none;"
              {{ old('transaction_id', optional($invoice)->transaction_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Select transaction
      </option>
      @foreach ($transactions as $key => $transaction)
        <option
          value="{{ $key }}" {{ old('transaction_id', optional($invoice)->transaction_id) == $key ? 'selected' : '' }}>
          {{ $transaction }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('transaction_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('paypal_email') ? 'has-error' : '' }}">
  <label for="paypal_email" class="col-md-2 control-label">Paypal Email</label>
  <div class="col-md-10">
    <input class="form-control" name="paypal_email" type="text" id="paypal_email"
           value="{{ old('paypal_email', optional($invoice)->paypal_email) }}" maxlength="255"
           placeholder="Enter paypal email here...">
    {!! $errors->first('paypal_email', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('billing_info_id') ? 'has-error' : '' }}">
  <label for="billing_info_id" class="col-md-2 control-label">Billing Info</label>
  <div class="col-md-10">
    <select class="form-control" id="billing_info_id" name="billing_info_id" required="true">
      <option value="" style="display: none;"
              {{ old('billing_info_id', optional($invoice)->billing_info_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Select billing info
      </option>
      @foreach ($billingInfos as $key => $billingInfo)
        <option
          value="{{ $key }}" {{ old('billing_info_id', optional($invoice)->billing_info_id) == $key ? 'selected' : '' }}>
          {{ $billingInfo }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('billing_info_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
  <label for="date" class="col-md-2 control-label">Date</label>
  <div class="col-md-10">
    <input class="form-control" name="date" type="text" id="date"
           value="{{ old('date', optional($invoice)->date) }}" placeholder="Enter date here...">
    {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('date_due') ? 'has-error' : '' }}">
  <label for="date_due" class="col-md-2 control-label">Date Due</label>
  <div class="col-md-10">
    <input class="form-control" name="date_due" type="text" id="date_due"
           value="{{ old('date_due', optional($invoice)->date_due) }}" placeholder="Enter date due here...">
    {!! $errors->first('date_due', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('date_paid') ? 'has-error' : '' }}">
  <label for="date_paid" class="col-md-2 control-label">Date Paid</label>
  <div class="col-md-10">
    <input class="form-control" name="date_paid" type="text" id="date_paid"
           value="{{ old('date_paid', optional($invoice)->date_paid) }}" placeholder="Enter date paid here...">
    {!! $errors->first('date_paid', '<p class="help-block">:message</p>') !!}
  </div>
</div>

