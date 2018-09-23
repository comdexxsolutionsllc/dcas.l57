<?php

namespace App\GraphQL\Type;

use Folklore\GraphQL\Support\Type as GraphQLType;

/**
 * Class Technician
 *
 * @package App\GraphQL\Type
 */
class Technician extends GraphQLType
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
