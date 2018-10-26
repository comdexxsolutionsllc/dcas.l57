<?php

namespace App\GraphQL\Type;

use Folklore\GraphQL\Support\Type as GraphQLType;

/**
 * Class Department
 *
 * @package App\GraphQL\Type
 */
class Department extends GraphQLType
{

    /**
     * @var array
     */
    protected $attributes = [];

    /**
     * @return array
     */
    public function fields(): array
    {
        return [];
    }
}
