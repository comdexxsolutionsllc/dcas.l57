<?php

namespace App\Transformers;

use App\Models\General\Asset;
use Flugg\Responder\Transformers\Transformer;

class AssetTransformer extends Transformer
{

    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [];

    /**
     * List of autoloaded default relations.
     *
     * @var array
     */
    protected $load = [];

    /**
     * Transform the model.
     *
     * @param  \App\Models\General\Asset $asset
     *
     * @return array
     */
    public function transform(Asset $asset)
    {
        return [
            'id'                      => (int) $asset->id,
            'serial_number'           => null,
            'hardware_id'             => null,
            'status'                  => null,
            'datacenter_id'           => null,
            'network_device_id'       => null,
            'switchport_id'           => null,
            'network_interface_cards' => null,
            'port_speed'              => null,
            'private_ip'              => null,
            'chassis'                 => null,
            'motherboard_type'        => null,
            'cpus'                    => null,
            'memory'                  => null,
            'disks'                   => null,
            'operating_system'        => null,
            'control_panel'           => null,
            'onhand_qty'              => null,
            'pending_testing_qty'     => null,
            'rma_qty'                 => null,
            'last_checkin'            => null,
        ];
    }
}
