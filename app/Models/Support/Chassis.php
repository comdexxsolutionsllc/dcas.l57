<?php

namespace App\Models\Support;

use App\Models\BaseModel;

/**
 * App\Models\Support\Chassis
 *
 * @property int                                                                             $id
 * @property int|null                                                                        $asset_owner
 * @property string|null                                                                     $accountable_type
 * @property int|null                                                                        $accountable_id
 * @property string                                                                          $vendor
 * @property string                                                                          $model
 * @property string|null                                                                     $serial_number
 * @property string                                                                          $form_factor_in_u
 * @property string                                                                          $chassis_type
 * @property string                                                                          $power_supply
 * @property int                                                                             $hot_swap_drive_bays
 * @property int                                                                             $internal_drive_bays
 * @property int                                                                             $expansion_slots
 * @property string                                                                          $expansion_slot_information
 * @property \Illuminate\Support\Carbon|null                                                 $created_at
 * @property \Illuminate\Support\Carbon|null                                                 $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Altek\Accountant\Models\Ledger[] $ledgers
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Chassis newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Chassis newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Chassis query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Chassis whereAccountableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Chassis whereAccountableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Chassis whereAssetOwner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Chassis whereChassisType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Chassis whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Chassis whereExpansionSlotInformation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Chassis whereExpansionSlots($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Chassis whereFormFactorInU($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Chassis whereHotSwapDriveBays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Chassis whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Chassis whereInternalDriveBays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Chassis whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Chassis wherePowerSupply($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Chassis whereSerialNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Chassis whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Chassis whereVendor($value)
 * @mixin \Eloquent
 */
class Chassis extends BaseModel
{

    /**
     * @var array
     */
    protected $fillable = [
        'asset_owner',
        'accountable_id',
        'accountable_type',
        'vendor',
        'model',
        'serial_number',
        'form_factor_in_u',
        'chassis_type',
        'power_supply',
        'hot_swap_drive_bays',
        'expansion_slots',
        'expansion_slot_information',
    ];

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'chassis_index';
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
