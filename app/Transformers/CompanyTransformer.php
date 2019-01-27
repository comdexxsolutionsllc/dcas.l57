<?php

namespace App\Transformers;

use App\Models\General\Company;
use Flugg\Responder\Transformers\Transformer;

class CompanyTransformer extends Transformer
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
     * @param  \App\Models\General\Company $company
     *
     * @return array
     */
    public function transform(Company $company)
    {
        return [
            'id' => (int) $company->id,
        ];
    }
}
