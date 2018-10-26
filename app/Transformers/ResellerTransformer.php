<?php

namespace App\Transformers;

use App\Models\General\Reseller;
use Flugg\Responder\Transformers\Transformer;

class ResellerTransformer extends Transformer
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
     * @param  \App\Models\General\Reseller $reseller
     *
     * @return array
     */
    public function transform(Reseller $reseller)
    {
        return [
            'id' => (int) $reseller->id,
        ];
    }
}
