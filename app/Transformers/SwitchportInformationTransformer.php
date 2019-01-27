<?php

namespace App\Transformers;

use App\Models\Support\SwitchportInformation;
use Flugg\Responder\Transformers\Transformer;

class SwitchportInformationTransformer extends Transformer
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
     * @param  \App\Models\Support\SwitchportInformation $switchportInformation
     *
     * @return array
     */
    public function transform(SwitchportInformation $switchportInformation)
    {
        return [
            'id' => (int) $switchportInformation->id,
        ];
    }
}
