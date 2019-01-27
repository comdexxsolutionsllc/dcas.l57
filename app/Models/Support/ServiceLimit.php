<?php

namespace App\Models\Support;

use App\Models\BaseModel;

/**
 * App\Models\Support\ServiceLimit
 *
 * @property int                             $id
 * @property string                          $resource_operation_name
 * @property int                             $default_limit
 * @property int                             $min_limit
 * @property int                             $max_limit
 * @property int|null                        $burst_capacity
 * @property int                             $is_calls_per_second
 * @property string|null                     $is_adjustable
 * @property string|null                     $comments
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ServiceLimit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ServiceLimit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ServiceLimit query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ServiceLimit whereBurstCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ServiceLimit whereComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ServiceLimit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ServiceLimit whereDefaultLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ServiceLimit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ServiceLimit whereIsAdjustable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ServiceLimit whereIsCallsPerSecond($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ServiceLimit whereMaxLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ServiceLimit whereMinLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ServiceLimit whereResourceOperationName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ServiceLimit whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ServiceLimit extends BaseModel
{

    /**
     * @var array
     */
    protected $fillable = [
        'resource_operation_name',
        'default_limit',
        'min_limit',
        'max_limit',
        'burst_capacity',
        'is_calls_per_second',
        'is_adjustable',
        'comments',
    ];

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'service_limit_index';
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
