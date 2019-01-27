<?php

namespace App\Models\Support;

use App\Models\BaseModel;

/**
 * App\Models\Support\NetworkInterfaceCard
 *
 * @property int                             $id
 * @property string                          $speed
 * @property string                          $duplex
 * @property string|null                     $mac_address
 * @property string|null                     $serial_number
 * @property int                             $number_of_ports
 * @property string                          $vendor
 * @property string                          $model
 * @property string                          $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\NetworkInterfaceCard newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\NetworkInterfaceCard newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\NetworkInterfaceCard query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\NetworkInterfaceCard whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\NetworkInterfaceCard whereDuplex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\NetworkInterfaceCard whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\NetworkInterfaceCard whereMacAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\NetworkInterfaceCard whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\NetworkInterfaceCard whereNumberOfPorts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\NetworkInterfaceCard whereSerialNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\NetworkInterfaceCard whereSpeed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\NetworkInterfaceCard whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\NetworkInterfaceCard whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\NetworkInterfaceCard whereVendor($value)
 * @mixin \Eloquent
 */
class NetworkInterfaceCard extends BaseModel
{

    /**
     * @var array
     */
    protected $fillable = [];

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'networkinterfacecards_index';
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
