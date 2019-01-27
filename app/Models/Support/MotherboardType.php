<?php

namespace App\Models\Support;

use App\Models\BaseModel;

/**
 * App\Models\Support\MotherboardType
 *
 * @property int                             $id
 * @property string                          $vendor
 * @property string                          $model
 * @property string                          $form_factor
 * @property int|null                        $assigned_chassis
 * @property mixed                           $assigned_hdds
 * @property mixed                           $assigned_memory
 * @property mixed                           $assigned_networking_cards
 * @property mixed                           $assigned_raid_cards
 * @property string                          $bios_features
 * @property string                          $chipset
 * @property string                          $expansion_slots
 * @property string                          $front_side_bus
 * @property string                          $hdd_connection_type
 * @property mixed                           $processor_information
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\MotherboardType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\MotherboardType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\MotherboardType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\MotherboardType whereAssignedChassis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\MotherboardType whereAssignedHdds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\MotherboardType whereAssignedMemory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\MotherboardType whereAssignedNetworkingCards($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\MotherboardType whereAssignedRaidCards($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\MotherboardType whereBiosFeatures($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\MotherboardType whereChipset($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\MotherboardType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\MotherboardType whereExpansionSlots($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\MotherboardType whereFormFactor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\MotherboardType whereFrontSideBus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\MotherboardType whereHddConnectionType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\MotherboardType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\MotherboardType whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\MotherboardType whereProcessorInformation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\MotherboardType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\MotherboardType whereVendor($value)
 * @mixin \Eloquent
 */
class MotherboardType extends BaseModel
{

    /**
     * @var array
     */
    protected $fillable = [
        'vendor',
        'model',
        'form_factor',
        'assigned_chassis',
        'assigned_hdds',
        'assigned_memory',
        'assigned_networking_cards',
        'assigned_raid_cards',
        'bios_features',
        'chipset',
        'expansion_slots',
        'front_side_bus',
        'hdd_connection_type',
        'processor_information',
    ];

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'motherboardtypes_index';
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
