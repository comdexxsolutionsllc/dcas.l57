<?php

namespace App\Models\Support;

use App\Models\BaseModel;

/**
 * App\Models\Support\Motherboard
 *
 * @property int                             $id
 * @property string                          $vendor
 * @property string                          $model
 * @property int                             $cpu_id
 * @property string                          $chipset
 * @property string                          $socket_type
 * @property string                          $form_factor
 * @property string|null                     $dvi
 * @property string|null                     $hdmi
 * @property string|null                     $display_port
 * @property string                          $bios
 * @property string                          $graphics
 * @property string                          $audio
 * @property string                          $audio_chipset
 * @property string                          $lan
 * @property int                             $max_lan_speed
 * @property int                             $memory_slots
 * @property int                             $maximum_memory_supported
 * @property mixed                           $channels_supported
 * @property mixed                           $storage
 * @property mixed                           $connectors
 * @property mixed                           $supported_oses
 * @property string|null                     $notes
 * @property int                             $eol_announced
 * @property int                             $ipmi_enabled
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Motherboard newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Motherboard newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Motherboard query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Motherboard whereAudio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Motherboard whereAudioChipset($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Motherboard whereBios($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Motherboard whereChannelsSupported($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Motherboard whereChipset($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Motherboard whereConnectors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Motherboard whereCpuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Motherboard whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Motherboard whereDisplayPort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Motherboard whereDvi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Motherboard whereEolAnnounced($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Motherboard whereFormFactor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Motherboard whereGraphics($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Motherboard whereHdmi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Motherboard whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Motherboard whereIpmiEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Motherboard whereLan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Motherboard whereMaxLanSpeed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Motherboard whereMaximumMemorySupported($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Motherboard whereMemorySlots($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Motherboard whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Motherboard whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Motherboard whereSocketType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Motherboard whereStorage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Motherboard whereSupportedOses($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Motherboard whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\Motherboard whereVendor($value)
 * @mixin \Eloquent
 */
class Motherboard extends BaseModel
{

    /**
     * @var array
     */
    protected $fillable = [
        'vendor',
        'model',
        'cpu_id',
        'chipset',
        'socket_type',
        'form_factor',
        'dvi',
        'hdmi',
        'display_port',
        'bios',
        'graphics',
        'audio',
        'audio_chipset',
        'lan',
        'max_lan_speed',
        'memory_slots',
        'maximum_memory_supported',
        'channels_supported',
        'storage',
        'connectors',
        'supported_oses',
        'notes',
        'eol_announced',
        'ipmi_enabled',
    ];

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'motherboards_index';
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
