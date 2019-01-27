<?php

namespace App\Transformers;

use App\Models\General\Coupon;
use Flugg\Responder\Transformers\Transformer;

class CouponTransformer extends Transformer
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
     * @param  \App\Models\General\Coupon $coupon
     *
     * @return array
     */
    public function transform(Coupon $coupon)
    {
        return [
            'id' => (int) $coupon->id,
        ];
    }
}
