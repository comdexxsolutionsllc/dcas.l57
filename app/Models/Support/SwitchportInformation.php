<?php

namespace App\Models\Support;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Support\SwitchportInformation
 *
 * @property int                                           $id
 * @property int                                           $network_device_id
 * @property int                                           $switchport_number
 * @property string                                        $category
 * @property string                                        $port_speed
 * @property string                                        $connection_type
 * @property string                                        $poe_status
 * @property string                                        $stackable_status
 * @property string                                        $duplex_type
 * @property \Illuminate\Support\Carbon|null               $created_at
 * @property \Illuminate\Support\Carbon|null               $updated_at
 * @property-read \App\Models\Support\NetworkConfiguration $networkConfiguration
 * @property-read \App\Models\Support\NetworkDevice        $networkDevice
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\SwitchportInformation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\SwitchportInformation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\SwitchportInformation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\SwitchportInformation whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\SwitchportInformation whereConnectionType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\SwitchportInformation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\SwitchportInformation whereDuplexType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\SwitchportInformation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\SwitchportInformation whereNetworkDeviceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\SwitchportInformation wherePoeStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\SwitchportInformation wherePortSpeed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\SwitchportInformation whereStackableStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\SwitchportInformation whereSwitchportNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\SwitchportInformation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SwitchportInformation extends BaseModel
{

    /**
     * @var string
     */
    protected $table = 'switchport_information';

    /**
     * @var array
     */
    protected $fillable = [
        'network_device_id',
        'switchport_number',
        'category',
        'port_speed',
        'connection_type',
        'poe_status',
        'stackable_status',
        'duplex_type',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function networkDevice(): BelongsTo
    {
        return $this->belongsTo(NetworkDevice::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function networkConfiguration(): BelongsTo
    {
        return $this->belongsTo(NetworkConfiguration::class);
    }

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'switchportinformation_index';
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
