<?php

namespace App\Models\Support;

use App\Models\BaseModel;
use App\Models\General\Company;
use App\Models\General\Reseller;
use App\Models\Roles\Employee;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Support\SalesRep
 *
 * @property int                                                                         $id
 * @property int                                                                         $employee_id
 * @property int                                                                         $company_id
 * @property \Illuminate\Support\Carbon|null                                             $created_at
 * @property \Illuminate\Support\Carbon|null                                             $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\General\Company[] $company
 * @property-read \App\Models\Roles\Employee                                             $employee
 * @property-read \App\Models\General\Reseller                                           $reseller
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\SalesRep newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\SalesRep newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\SalesRep query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\SalesRep whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\SalesRep whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\SalesRep whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\SalesRep whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\SalesRep whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SalesRep extends BaseModel
{

    /**
     * @var array
     */
    protected $fillable = ['employee_id', 'company_id',];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function company(): HasMany
    {
        return $this->hasMany(Company::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reseller(): BelongsTo
    {
        return $this->belongsTo(Reseller::class);
    }

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'salesrep_index';
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
