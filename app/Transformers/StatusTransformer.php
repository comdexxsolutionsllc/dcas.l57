<?php

namespace App\Transformers;

use App\Models\Support\Status;
use Flugg\Responder\Transformers\Transformer;

class StatusTransformer extends Transformer
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
     * @param  \App\Models\Support\Status $status
     *
     * @return array
     */
    public function transform(Status $status)
    {
        return [
            'id' => (int) $status->id,
        ];
    }
}
