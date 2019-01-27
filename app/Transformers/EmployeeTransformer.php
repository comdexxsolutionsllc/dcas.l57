<?php

namespace App\Transformers;

use App\Models\Roles\Employee;
use Flugg\Responder\Transformers\Transformer;

class EmployeeTransformer extends Transformer
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
     * @param  \App\Models\Roles\Employee $employee
     *
     * @return array
     */
    public function transform(Employee $employee)
    {
        return [
            'id' => (int) $employee->id,
        ];
    }
}
