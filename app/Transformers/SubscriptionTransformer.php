<?php

namespace App\Transformers;

use App\Models\General\Subscription;
use Flugg\Responder\Transformers\Transformer;

class SubscriptionTransformer extends Transformer
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
     * @param  \App\Models\General\Subscription $subscription
     *
     * @return array
     */
    public function transform(Subscription $subscription)
    {
        return [
            'id' => (int) $subscription->id,
        ];
    }
}
