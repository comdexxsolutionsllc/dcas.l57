<?php

namespace App\Transformers;

use App\Models\Roles\Customer as User;
use Flugg\Responder\Transformers\Transformer;

/**
 * Class UserTransformer
 *
 * @package App\Transformers
 */
class UserTransformer extends Transformer
{

    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [];

    /**
     * A list of autoloaded default relations.
     *
     * @var array
     */
    protected $load = [];

    /**
     * Transform the model.
     *
     * @param \App\RoleModels\Customer $user
     *
     * @return array
     */
    public function transform(User $user): array
    {
        return [
            'id' => (int) $user->id,
        ];
    }
}
