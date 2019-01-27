<?php

namespace App\Models\General;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\General\BillingInfo
 *
 * @property int                              $id
 * @property string                           $first_name
 * @property string                           $last_name
 * @property string|null                      $company
 * @property string                           $address_1
 * @property string|null                      $address_2
 * @property string                           $city
 * @property string                           $state
 * @property string                           $postal_code
 * @property string                           $country
 * @property string                           $phone_number
 * @property string                           $phone_type
 * @property \Illuminate\Support\Carbon|null  $created_at
 * @property \Illuminate\Support\Carbon|null  $updated_at
 * @property-read \App\Models\General\Invoice $invoice
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\BillingInfo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\BillingInfo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\BillingInfo query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\BillingInfo whereAddress1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\BillingInfo whereAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\BillingInfo whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\BillingInfo whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\BillingInfo whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\BillingInfo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\BillingInfo whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\BillingInfo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\BillingInfo whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\BillingInfo wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\BillingInfo wherePhoneType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\BillingInfo wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\BillingInfo whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\BillingInfo whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BillingInfo extends BaseModel
{

    /**
     * @var string
     */
    protected $table = 'billing_info';

    /**
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'company',
        'address_1',
        'address_2',
        'city',
        'state',
        'postal_code',
        'country',
        'phone_number',
        'phone_type',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'billinginfo_index';
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
