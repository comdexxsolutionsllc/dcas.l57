<?php

namespace App\Transformers;

use App\Models\Roles\Whiteglove;
use Flugg\Responder\Transformers\Transformer;

class WhiteGloveTransformer extends Transformer
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
     * @param  \App\Models\Roles\Whiteglove $whiteGlove
     *
     * @return array
     */
    public function transform(Whiteglove $whiteGlove)
    {
        return [
            'id' => (int) $whiteGlove->id,
        ];
    }
}
