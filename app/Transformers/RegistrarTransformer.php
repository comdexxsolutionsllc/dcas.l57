<?php

namespace App\Transformers;

use App\Models\General\Registrar;
use Flugg\Responder\Transformers\Transformer;

class RegistrarTransformer extends Transformer
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
     * @param  \App\Models\General\Registrar $registrar
     *
     * @return array
     */
    public function transform(Registrar $registrar)
    {
        return [
            'id' => (int) $registrar->id,
        ];
    }
}
