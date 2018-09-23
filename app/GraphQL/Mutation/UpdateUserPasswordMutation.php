<?php

namespace App\GraphQL\Mutation;

use App\Models\Roles\Customer as User;
use Folklore\GraphQL\Support\Mutation;
use GraphQL;
use GraphQL\Type\Definition\Type;

/**
 * Class UpdateUserPasswordMutation
 *
 * @package App\GraphQL\Mutation
 */
class UpdateUserPasswordMutation extends Mutation
{

    /**
     * @var array
     */
    protected $attributes = [
        'name' => 'updateUserPassword',
    ];

    /**
     * @return array
     */
    public function args(): array
    {
        return [
            'id'       => [
                'name'  => 'id',
                'type'  => Type::nonNull(Type::string()),
                'rules' => ['required'],
            ],
            'password' => [
                'name'  => 'password',
                'type'  => Type::nonNull(Type::string()),
                'rules' => ['required'],
            ],
        ];
    }

    /**
     * @return \GraphQL\Type\Definition\ObjectType|mixed|null
     */
    public function type()
    {
        return GraphQL::type('User');
    }

    /**
     * @param $root
     * @param $args
     *
     * @return \App\Models\Roles\Customer|\App\Models\Roles\Customer[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function resolve($root, $args)
    {
        $user = User::find($args['id']);

        if (! $user) {
            return null;
        }

        $user->password = bcrypt($args['password']);
        $user->save();

        return $user;
    }
}
