<?php

namespace App\GraphQL\Type;

use Folklore\GraphQL\Support\Type as GraphQLType;

/**
 * Class Role
 *
 * @package App\GraphQL\Type
 */
class Role extends GraphQLType
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
