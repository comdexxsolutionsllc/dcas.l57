<?php

namespace App\Models\Support;

use App\Models\BaseModel;

/**
 * App\Models\Support\ResourceName
 *
 * @property int                             $id
 * @property string                          $partition
 * @property int                             $service_namespace_id
 * @property int                             $service_region_id
 * @property string                          $accountable_type
 * @property int                             $accountable_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ResourceName newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ResourceName newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ResourceName query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ResourceName whereAccountableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ResourceName whereAccountableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ResourceName whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ResourceName whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ResourceName wherePartition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ResourceName whereServiceNamespaceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ResourceName whereServiceRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ResourceName whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ResourceName extends BaseModel
{

    /**
     * @var array
     */
    protected $fillable = [
        'partition',
        'service_namespace_id',
        'service_region_id',
        'accountable_id',
        'accountable_type',
    ];

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'resource_name_index';
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
