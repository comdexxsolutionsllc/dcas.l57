<?php

namespace App\Transformers;

use App\Models\Roles\Vendor;
use Flugg\Responder\Transformers\Transformer;

class VendorTransformer extends Transformer
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
     * @param  \App\Models\Roles\Vendor $vendor
     *
     * @return array
     */
    public function transform(Vendor $vendor)
    {
        return [
            'id' => (int) $vendor->id,
        ];
    }
}
