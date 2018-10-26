<?php

namespace App\Transformers;

use App\Models\Roles\Customer;
use Flugg\Responder\Transformers\Transformer;

class CustomerTransformer extends Transformer
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
     * @param  \App\Models\Roles\Customer $customer
     *
     * @return array
     */
    public function transform(Customer $customer)
    {
        return [
            'id' => (int) $customer->id,
        ];
    }
}
