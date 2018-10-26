<?php

namespace App\Transformers;

use App\Models\Support\SalesRep;
use Flugg\Responder\Transformers\Transformer;

class SalesRepTransformer extends Transformer
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
     * @param  \App\Models\Support\SalesRep $salesRep
     *
     * @return array
     */
    public function transform(SalesRep $salesRep)
    {
        return [
            'id' => (int) $salesRep->id,
        ];
    }
}
