<?php

namespace App\Transformers;

use App\Models\General\BillingInfo;
use Flugg\Responder\Transformers\Transformer;

class BillingInfoTransformer extends Transformer
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
     * @param  \App\Models\General\BillingInfo $billingInfo
     *
     * @return array
     */
    public function transform(BillingInfo $billingInfo)
    {
        return [
            'id' => (int) $billingInfo->id,
        ];
    }
}
