<?php

namespace App\Transformers;

use App\Models\General\Permission;
use Flugg\Responder\Transformers\Transformer;

class PermissionTransformer extends Transformer
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
     * @param  \App\Models\General\Permission $permission
     *
     * @return array
     */
    public function transform(Permission $permission)
    {
        return [
            'id' => (int) $permission->id,
        ];
    }
}
