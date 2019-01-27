<?php

namespace App\Transformers;

use App\Models\General\Notification;
use Flugg\Responder\Transformers\Transformer;

class NotificationTransformer extends Transformer
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
     * @param  \App\Models\General\Notification $notification
     *
     * @return array
     */
    public function transform(Notification $notification)
    {
        return [
            'id' => (int) $notification->id,
        ];
    }
}
