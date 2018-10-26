<?php

namespace App\Transformers;

use App\Models\General\Domain;
use Flugg\Responder\Transformers\Transformer;

class DomainTransformer extends Transformer
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
     * @param  \App\Models\General\Domain $domain
     *
     * @return array
     */
    public function transform(Domain $domain)
    {
        return [
            'id' => (int) $domain->id,
        ];
    }
}
