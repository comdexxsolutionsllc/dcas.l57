<?php

namespace App\Transformers;

use App\Models\Support\NetworkConfiguration;
use Flugg\Responder\Transformers\Transformer;

class NetworkConfigurationTransformer extends Transformer
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
     * @param  \App\Models\Support\NetworkConfiguration $networkConfiguration
     *
     * @return array
     */
    public function transform(NetworkConfiguration $networkConfiguration)
    {
        return [
            'id' => (int) $networkConfiguration->id,
        ];
    }
}
