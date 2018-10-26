<?php

namespace App\GraphQL\Type;

use Folklore\GraphQL\Support\Type as GraphQLType;
use GraphQL;
use GraphQL\Type\Definition\Type;

/**
 * Class User
 *
 * @package App\GraphQL\Type
 */
class User extends GraphQLType
{

    /**
     * @var array
     */
    protected $attributes = [
        'name'        => 'User',
        'description' => 'A user',
    ];

    /*
    * Uncomment following line to make the type input object.
    * http://graphql.org/learn/schema/#input-types
    */
    // protected  = true;

    /**
     * @return array
     */
    public function fields(): array
    {
        return [
            'id'                => [
                'type'        => Type::nonNull(Type::string()),
                'description' => 'The id of the user',
            ],
            'name'              => [
                'type'        => Type::string(),
                'description' => 'The name of user',
            ],
            'username'          => [
                'type'        => Type::string(),
                'description' => 'The username of user',
            ],
            'email'             => [
                'type'        => Type::string(),
                'description' => 'The email of user',
            ],
            'avatar'            => [
                'type'        => Type::string(),
                'description' => 'The avatar of user',
            ],
            'email_verified_at' => [
                'type'        => Type::boolean(),
                'description' => 'If the email has been verified of user',
            ],
            'trial_ends_at'     => [
                'type'        => Type::string(),
                'description' => 'When the user trial ends',
            ],
            'tickets'           => [
                'type'        => Type::listOf(GraphQL::type('Ticket')),
                'description' => 'Tickets of user',
                'resolve'     => function ($data, $args) {
                    return $data->tickets()->get();
                },
            ],
        ];
    }

    /**
     * @param $root
     * @param $args
     *
     * @return string
     */
    protected function resolveEmailField($root, $args): string
    {
        return strtolower($root->email);
    }

    /**
     * @param $root
     * @param $args
     *
     * @return string
     */
    protected function resolveUsernameField($root, $args): string
    {
        return strtolower($root->username);
    }

    /**
     * @param $root
     * @param $args
     *
     * @return string
     */
    protected function resolveNameField($root, $args): string
    {
        return strtolower($root->name);
    }

    /**
     * @param $root
     * @param $args
     *
     * @return string
     */
    protected function resolveAvatarField($root, $args): string
    {
        return strtolower($root->avatar);
    }
}
