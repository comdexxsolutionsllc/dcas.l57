<?php

namespace App\Models\General;

use App\Models\BaseModel;
use App\Models\Support\SalesRep;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\General\Reseller
 *
 * @property int                                                                             $id
 * @property string                                                                          $account_id
 * @property int                                                                             $company_id
 * @property string|null                                                                     $expiry_date
 * @property int                                                                             $salesrep_id
 * @property \Illuminate\Support\Carbon|null                                                 $created_at
 * @property \Illuminate\Support\Carbon|null                                                 $updated_at
 * @property-read \App\Models\General\Company                                                $company
 * @property-read \Illuminate\Database\Eloquent\Collection|\Altek\Accountant\Models\Ledger[] $ledgers
 * @property-read \App\Models\Support\SalesRep                                               $salesRep
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Reseller newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Reseller newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Reseller query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Reseller whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Reseller whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Reseller whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Reseller whereExpiryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Reseller whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Reseller whereSalesrepId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Reseller whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Reseller extends BaseModel
{

    /**
     * @var array
     */
    protected $fillable = [
        'account_id',
        'company_id',
        'expiry_date',
        'salesrep_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function company(): HasOne
    {
        return $this->hasOne(Company::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function salesRep(): HasOne
    {
        return $this->hasOne(SalesRep::class);
    }

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'reseller_index';
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
