<?php

namespace App\Transformers;

use App\Models\Support\Technician;
use Flugg\Responder\Transformers\Transformer;

class TechnicianTransformer extends Transformer
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
     * @param  \App\Models\Support\Technician $technician
     *
     * @return array
     */
    public function transform(Technician $technician)
    {
        return [
            'id' => (int) $technician->id,
        ];
    }
}
