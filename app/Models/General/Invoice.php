<?php

namespace App\Models\General;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\General\Invoice
 *
 * @property int                                                                             $id
 * @property int                                                                             $account_id
 * @property string                                                                          $account_type
 * @property string                                                                          $subtotal
 * @property string                                                                          $payment_option
 * @property string                                                                          $transaction_id
 * @property string|null                                                                     $paypal_email
 * @property int                                                                             $billing_info_id
 * @property string|null                                                                     $date
 * @property string|null                                                                     $date_due
 * @property string|null                                                                     $date_paid
 * @property \Illuminate\Support\Carbon|null                                                 $created_at
 * @property \Illuminate\Support\Carbon|null                                                 $updated_at
 * @property-read \App\Models\General\BillingInfo                                            $billingInfo
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\General\InvoiceItem[] $invoiceItems
 * @property-read \Illuminate\Database\Eloquent\Collection|\Altek\Accountant\Models\Ledger[] $ledgers
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Invoice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Invoice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Invoice query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Invoice whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Invoice whereAccountType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Invoice whereBillingInfoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Invoice whereCreatedAt($value)
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
class Invoice extends BaseModel
{

    /**
     * @var array
     */
    protected $fillable = [
        'account_id',
        'account_type',
        'subtotal',
        'payment_option',
        'transaction_id',
        'paypal_email',
        'billing_info_id',
        'date',
        'date_due',
        'date_paid',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function billingInfo(): HasOne
    {
        return $this->hasOne(BillingInfo::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoiceItems(): HasMany
    {
        return $this->hasMany(InvoiceItem::class);
    }

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'invoice_index';
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray(): array
    {
        $array = $this->toArray();

        // Customize array...

        return $array;
    }
}
