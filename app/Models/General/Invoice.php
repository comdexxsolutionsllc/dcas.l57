<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\Invoice
 *
 * @property int $id
 * @property int $customer_id
 * @property string $subtotal
 * @property string $payment_option
 * @property string $transaction_id
 * @property string|null $paypal_email
 * @property int $billing_info_id
 * @property string|null $date
 * @property string|null $date_due
 * @property string|null $date_paid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Invoice whereBillingInfoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Invoice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Invoice whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Invoice whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Invoice whereDateDue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Invoice whereDatePaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Invoice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Invoice wherePaymentOption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Invoice wherePaypalEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Invoice whereSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Invoice whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Invoice whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Invoice extends Model
{

    //
}
