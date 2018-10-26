<?php

namespace App\Transformers;

use App\Models\Support\Department;
use Flugg\Responder\Transformers\Transformer;

class DepartmentTransformer extends Transformer
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
     * @param  \App\Models\Support\Department $department
     *
     * @return array
     */
    public function transform(Department $department)
    {
        return [
            'id' => (int) $department->id,
        ];
    }
}
