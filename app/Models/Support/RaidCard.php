<?php

namespace App\Models\Support;

use App\Models\BaseModel;

/**
 * App\Models\Support\RaidCard
 *
 * @property int                                                                             $id
 * @property string                                                                          $vendor
 * @property string                                                                          $model
 * @property string                                                                          $launch_date
 * @property string|null                                                                     $expected_discontinuance
 * @property int                                                                             $data_transfer_rate
 * @property mixed                                                                           $supported_devices
 * @property mixed                                                                           $supported_raid_levels
 * @property int                                                                             $jbod_mode
 * @property int                                                                             $number_of_internal_ports
 * @property int                                                                             $number_of_supported_devices
 * @property int                                                                             $embedded_memory
 * @property mixed                                                                           $supported_oses
 * @property \Illuminate\Support\Carbon|null                                                 $created_at
 * @property \Illuminate\Support\Carbon|null                                                 $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Altek\Accountant\Models\Ledger[] $ledgers
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\RaidCard newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\RaidCard newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\RaidCard query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\RaidCard whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\RaidCard whereDataTransferRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\RaidCard whereEmbeddedMemory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\RaidCard whereExpectedDiscontinuance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\RaidCard whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\RaidCard whereJbodMode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\RaidCard whereLaunchDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\RaidCard whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\RaidCard whereNumberOfInternalPorts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\RaidCard whereNumberOfSupportedDevices($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\RaidCard whereSupportedDevices($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\RaidCard whereSupportedOses($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\RaidCard whereSupportedRaidLevels($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\RaidCard whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\RaidCard whereVendor($value)
 * @mixin \Eloquent
 */
class RaidCard extends BaseModel
{

    /**
     * @var array
     */
    protected $fillable = [
        'vendor',
        'model',
        'launch_date',
        'expected_discontinuance',
        'data_transfer_rate',
        'supported_devices',
        'supported_raid_levels',
        'jbod_mode',
        'number_of_internal_ports',
        'number_of_supported_devices',
        'embedded_memory',
        'supported_oses',
    ];

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'raidcards_index';
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
