<?php

namespace App\Models\Support;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Support\NetworkDeviceType
 *
 * @property int                                    $id
 * @property string                                 $name
 * @property string|null                            $description
 * @property int                                    $active
 * @property \Illuminate\Support\Carbon|null        $created_at
 * @property \Illuminate\Support\Carbon|null        $updated_at
 * @property-read \App\Models\Support\NetworkDevice $networkDevice
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\NetworkDeviceType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\NetworkDeviceType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\NetworkDeviceType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\NetworkDeviceType whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\NetworkDeviceType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\NetworkDeviceType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\NetworkDeviceType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\NetworkDeviceType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\NetworkDeviceType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class NetworkDeviceType extends BaseModel
{

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'active',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function networkDevice(): BelongsTo
    {
        return $this->belongsTo(NetworkDevice::class);
    }

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'networkdevicetype_index';
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
