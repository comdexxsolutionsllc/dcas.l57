<?php

namespace App\Transformers;

use App\Models\Support\NetworkDeviceType;
use Flugg\Responder\Transformers\Transformer;

class NetworkDeviceTypeTransformer extends Transformer
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
     * @param  \App\Models\Support\NetworkDeviceType $networkDeviceType
     *
     * @return array
     */
    public function transform(NetworkDeviceType $networkDeviceType)
    {
        return [
            'id' => (int) $networkDeviceType->id,
        ];
    }
}
