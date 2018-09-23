<?php

namespace App\GraphQL\Type;

use Folklore\GraphQL\Support\Type as GraphQLType;

/**
 * Class Note
 *
 * @package App\GraphQL\Type
 */
class Note extends GraphQLType
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
