<?php

namespace App\Transformers;

use App\Models\Support\Queue;
use Flugg\Responder\Transformers\Transformer;

class QueueTransformer extends Transformer
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
     * @param  \App\Models\Support\Queue $queue
     *
     * @return array
     */
    public function transform(Queue $queue)
    {
        return [
            'id' => (int) $queue->id,
        ];
    }
}
