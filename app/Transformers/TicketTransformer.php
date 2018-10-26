<?php

namespace App\Transformers;

use App\Models\Support\Ticket;
use Flugg\Responder\Transformers\Transformer;

class TicketTransformer extends Transformer
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
     * @param  \App\Models\Support\Ticket $ticket
     *
     * @return array
     */
    public function transform(Ticket $ticket)
    {
        return [
            'id' => (int) $ticket->id,
        ];
    }
}
