<?php

namespace App\Transformers;

use App\Models\Support\OperatingSystem;
use Flugg\Responder\Transformers\Transformer;

class OperatingSystemTransformer extends Transformer
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
     * @param  \App\Models\Support\OperatingSystem $operatingSystem
     *
     * @return array
     */
    public function transform(OperatingSystem $operatingSystem)
    {
        return [
            'id' => (int) $operatingSystem->id,
        ];
    }
}
