<?php

namespace App\GraphQL\Query;

use App\Models\Roles\Customer as User;
use Folklore\GraphQL\Support\Query;
use GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;

/**
 * Class UserQuery
 *
 * @package App\GraphQL\Query
 */
class UserQuery extends Query
{

    /**
     * @var array
     */
    protected $attributes = [
        'name' => 'users',
    ];

    /**
     * @return array
     */
    public function args(): array
    {
        return [
            'id'                => ['name' => 'id', 'type' => Type::string()],
            'name'              => ['name' => 'name', 'type' => Type::string()],
            'username'          => ['name' => 'username', 'type' => Type::string()],
            'email'             => ['name' => 'email', 'type' => Type::string()],
            'email_verified_at' => ['name' => 'email_verified_at', 'type' => Type::boolean()],
            'trial_ends_at'     => ['name' => 'trial_ends_at', 'type' => Type::string()],
        ];
    }

    /**
     * @return \GraphQL\Type\Definition\ListOfType|null
     */
    public function type()
    {
        return Type::listOf(GraphQL::type('User'));
    }

    /**
     * @param                                      $root
     * @param                                      $args
     * @param                                      $context
     * @param \GraphQL\Type\Definition\ResolveInfo $info
     *
     * @return \App\Models\Roles\Customer[]|\Illuminate\Database\Eloquent\Collection
     */
    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        if (isset($args['id'])) {
            return User::where('id', $args['id'])->get();
        }

        if (isset($args['name'])) {
            return User::whereName($args['name'])->get();
        } elseif (isset($args['username'])) {
            return User::whereUsername($args['username'])->get();
        } elseif (isset($args['email'])) {
            return User::whereEmail($args['email'])->get();
        } elseif (isset($args['email_verified_at'])) {
            return User::whereEmailVerifiedAt($args['email_verified_at'])->get();
        } elseif (isset($args['trial_ends_at'])) {
            return User::whereTrialEndsAt($args['trial_ends_at'])->get();
        }

        return User::all();
    }
}
