<?php

namespace App\Transformers;

use App\Models\Support\Note;
use Flugg\Responder\Transformers\Transformer;

class NoteTransformer extends Transformer
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
     * @param  \App\Models\Support\Note $note
     *
     * @return array
     */
    public function transform(Note $note)
    {
        return [
            'id' => (int) $note->id,
        ];
    }
}
