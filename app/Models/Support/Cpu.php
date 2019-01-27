<?php

namespace App\Models\Support;

use App\Models\BaseModel;

/**
 * App\Models\Support\Cpu
 *
 * @property int                             $id
 * @property string                          $architecture
 * @property string                          $vendor
 * @property string                          $family
 * @property string                          $model
 * @property string                          $speed
 * @property string                          $cache_size
 * @property int                             $number_of_cores
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Cpu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Cpu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Cpu query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Cpu whereArchitecture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Cpu whereCacheSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Cpu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Cpu whereFamily($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Cpu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Cpu whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Cpu whereNumberOfCores($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Cpu whereSpeed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Cpu whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Cpu whereVendor($value)
 * @mixin \Eloquent
 */
class Cpu extends BaseModel
{

    /**
     * @var array
     */
    protected $fillable = [
        'architecture',
        'vendor',
        'family',
        'model',
        'speed',
        'cache_size',
        'number_of_cores',
    ];

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'cpu_index';
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
