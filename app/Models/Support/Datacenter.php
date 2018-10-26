<?php

namespace App\Models\Support;

use App\Models\BaseModel;
use App\Models\General\Asset;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Support\Datacenter
 *
 * @property int                                                                             $id
 * @property string                                                                          $code
 * @property string                                                                          $location
 * @property string                                                                          $status
 * @property string                                                                          $opening_date
 * @property \Illuminate\Support\Carbon|null                                                 $created_at
 * @property \Illuminate\Support\Carbon|null                                                 $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\General\Asset[]       $assets
 * @property-read \Illuminate\Database\Eloquent\Collection|\Altek\Accountant\Models\Ledger[] $ledgers
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Datacenter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Datacenter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Datacenter query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Datacenter whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Datacenter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Datacenter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Datacenter whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Datacenter whereOpeningDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Datacenter whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Datacenter whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Datacenter extends BaseModel
{

    /**
     * @var array
     */
    protected $fillable = [
        'code',
        'location',
        'status',
        'opening_date',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function assets(): HasMany
    {
        return $this->hasMany(Asset::class);
    }

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'datacenter_index';
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
