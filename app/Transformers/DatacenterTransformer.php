<?php

namespace App\Transformers;

use App\Models\Support\Datacenter;
use Flugg\Responder\Transformers\Transformer;

class DatacenterTransformer extends Transformer
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
     * @param  \App\Models\Support\Datacenter $datacenter
     *
     * @return array
     */
    public function transform(Datacenter $datacenter)
    {
        return [
            'id' => (int) $datacenter->id,
        ];
    }
}
