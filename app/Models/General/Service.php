<?php

namespace App\Models\General;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\General\Service
 *
 * @property int                                                                             $id
 * @property int                                                                             $account_id
 * @property string                                                                          $account_type
 * @property string                                                                          $service_type
 * @property string                                                                          $status
 * @property string|null                                                                     $last_payment
 * @property string|null                                                                     $last_invoice
 * @property \Illuminate\Support\Carbon|null                                                 $created_at
 * @property \Illuminate\Support\Carbon|null                                                 $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\General\InvoiceItem[] $invoiceItems
 * @property-read \Illuminate\Database\Eloquent\Collection|\Altek\Accountant\Models\Ledger[] $ledgers
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Service whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Service whereAccountType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Service whereLastInvoice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Service whereLastPayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Service whereServiceType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Service whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Service whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Service extends BaseModel
{

    /**
     * @var array
     */
    protected $fillable = [
        'account_id',
        'account_type',
        'service_type',
        'status',
        'last_payment',
        'last_invoice',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function invoiceItems(): BelongsToMany
    {
        return $this->belongsToMany(InvoiceItem::class);
    }

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'service_index';
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
