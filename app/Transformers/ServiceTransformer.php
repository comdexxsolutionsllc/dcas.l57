<?php

namespace App\Transformers;

use App\Models\General\Service;
use Flugg\Responder\Transformers\Transformer;

class ServiceTransformer extends Transformer
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
     * @param  \App\Models\General\Service $service
     *
     * @return array
     */
    public function transform(Service $service)
    {
        return [
            'id' => (int) $service->id,
        ];
    }
}
