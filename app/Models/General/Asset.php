<?php

namespace App\Models\General;

use App\Models\BaseModel;
use App\Models\Support\Datacenter;
use App\Models\Support\OperatingSystem;
use App\Models\Support\SwitchportInformation;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\General\Asset
 *
 * @property int                                                 $id
 * @property string                                              $serial_number
 * @property string                                              $hardware_id
 * @property string                                              $status
 * @property int|null                                            $datacenter_id
 * @property int|null                                            $network_device_id
 * @property int|null                                            $switchport_id
 * @property string                                              $network_interface_cards
 * @property string|null                                         $port_speed
 * @property string|null                                         $private_ip
 * @property string                                              $chassis
 * @property string                                              $motherboard_type
 * @property string                                              $cpus
 * @property string                                              $memory
 * @property string                                              $disks
 * @property int|null                                            $operating_system_id
 * @property string|null                                         $control_panel
 * @property string|null                                         $administrator_password
 * @property int                                                 $onhand_qty
 * @property int                                                 $pending_testing_qty
 * @property int                                                 $rma_qty
 * @property string|null                                         $last_checkin
 * @property \Illuminate\Support\Carbon|null                     $created_at
 * @property \Illuminate\Support\Carbon|null                     $updated_at
 * @property-read \App\Models\Support\Datacenter|null            $datacenter
 * @property-read \App\Models\General\Asset|null                 $networkDevice
 * @property-read \App\Models\Support\OperatingSystem|null       $operatingSystem
 * @property-read \App\Models\Support\SwitchportInformation|null $switchport
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereAdministratorPassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereChassis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereControlPanel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereCpus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereDatacenterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereDisks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereHardwareId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereLastCheckin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereMemory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereMotherboardType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereNetworkDeviceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereNetworkInterfaceCards($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereOnhandQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereOperatingSystemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset wherePendingTestingQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset wherePortSpeed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset wherePrivateIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereRmaQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereSerialNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereSwitchportId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\Asset whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Asset extends BaseModel
{

    /**
     * @var array
     */
    protected $fillable = [
        'serial_number',
        'hardware_id',
        'status',
        'datacenter_id',
        'network_device_id',
        'switchport_id',
        'network_interface_cards',
        'port_speed',
        'private_ip',
        'chassis',
        'motherboard_type',
        'cpus',
        'memory',
        'disks',
        'operating_system_id',
        'control_panel',
        'administrator_password',
        'onhand_qty',
        'pending_testing_qty',
        'rma_qty',
        'last_checkin',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function datacenter(): BelongsTo
    {
        return $this->belongsTo(Datacenter::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function networkDevice(): BelongsTo
    {
        return $this->belongsTo(Asset::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function operatingSystem(): BelongsTo
    {
        return $this->belongsTo(OperatingSystem::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function switchport(): BelongsTo
    {
        return $this->belongsTo(SwitchportInformation::class);
    }

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'asset_index';
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
