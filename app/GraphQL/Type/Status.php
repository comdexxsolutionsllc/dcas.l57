<?php

namespace App\GraphQL\Type;

use Folklore\GraphQL\Support\Type as GraphQLType;

/**
 * Class Status
 *
 * @package App\GraphQL\Type
 */
class Status extends GraphQLType
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
