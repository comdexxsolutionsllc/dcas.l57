<?php

namespace App\Models\Support;

use App\Models\BaseModel;

/**
 * App\Models\Support\ServiceNamespace
 *
 * @property int                             $id
 * @property int                             $services_id
 * @property string                          $namespace
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ServiceNamespace newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ServiceNamespace newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ServiceNamespace query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ServiceNamespace whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ServiceNamespace whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ServiceNamespace whereNamespace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ServiceNamespace whereServicesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ServiceNamespace whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ServiceNamespace extends BaseModel
{

    /**
     * @var array
     */
    protected $fillable = [
        'services_id',
        'namespace',
    ];

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'service_namespace_index';
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
