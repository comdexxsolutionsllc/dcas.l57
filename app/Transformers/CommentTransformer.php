<?php

namespace App\Transformers;

use App\Models\Support\Comment;
use Flugg\Responder\Transformers\Transformer;

class CommentTransformer extends Transformer
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
     * @param  \App\Models\Support\Comment $comment
     *
     * @return array
     */
    public function transform(Comment $comment)
    {
        return [
            'id' => (int) $comment->id,
        ];
    }
}
