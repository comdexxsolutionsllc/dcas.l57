<?php

namespace App\Models\Support;

use App\Models\BaseModel;

/**
 * App\Models\Support\AvailabilityZone
 *
 * @property int                                                                             $id
 * @property mixed                                                                           $region_ids
 * @property string|null                                                                     $comments
 * @property \Illuminate\Support\Carbon|null                                                 $created_at
 * @property \Illuminate\Support\Carbon|null                                                 $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Altek\Accountant\Models\Ledger[] $ledgers
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\AvailabilityZone newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\AvailabilityZone newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\AvailabilityZone query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\AvailabilityZone whereComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\AvailabilityZone whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\AvailabilityZone whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\AvailabilityZone whereRegionIds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\AvailabilityZone whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AvailabilityZone extends BaseModel
{

    /**
     * @var array
     */
    protected $fillable = [
        'region_ids',
        'comments',
    ];

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'availability_zone_index';
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
