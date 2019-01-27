<?php

return [

    // The prefix for routes
    'prefix'          => 'graphql',

    // The routes to make GraphQL request. Either a string that will apply
    // to both query and mutation or an array containing the key 'query' and/or
    // 'mutation' with the according Route
    //
    // Example:
    //
    // Same route for both query and mutation
    //
    // 'routes' => 'path/to/query/{graphql_schema?}',
    //
    // or define each routes
    //
    // 'routes' => [
    //     'query' => 'query/{graphql_schema?}',
    //     'mutation' => 'mutation/{graphql_schema?}'
    // ]
    //
    // you can also disable routes by setting routes to null
    //
    // 'routes' => null,
    //
    'routes'          => '{graphql_schema?}',

    // The controller to use in GraphQL request. Either a string that will apply
    // to both query and mutation or an array containing the key 'query' and/or
    // 'mutation' with the according Controller and method
    //
    // Example:
    //
    // 'controllers' => [
    //     'query' => '\Folklore\GraphQL\GraphQLController@query',
    //     'mutation' => '\Folklore\GraphQL\GraphQLController@mutation'
    // ]
    //
    'controllers'     => '\Folklore\GraphQL\GraphQLController@query',

    // Any middleware for the graphql route group
    'middleware'      => ['auth.basic'],

    // The name of the default schema used when no argument is provided
    // to GraphQL::schema() or when the route is used without the graphql_schema
    // parameter.
    'schema'          => 'default',

    // The schemas for query and/or mutation. It expects an array to provide
    // both the 'query' fields and the 'mutation' fields. You can also
    // provide directly an object GraphQL\Schema
    'schemas'         => [
        'default' => [
            'query'    => [
                'users' => 'App\GraphQL\Query\UserQuery',
            ],
            'mutation' => [
                'updateUserPassword' => 'App\GraphQL\Mutation\UpdateUserPasswordMutation',
            ],
        ],
    ],

    // The types available in the application. You can then access it from the
    // facade like this: GraphQL::type('user')
    'types'           => [
        'Comment'    => 'App\GraphQL\Type\Comment',
        'Department' => 'App\GraphQL\Type\Department',
        'Note'       => 'App\GraphQL\Type\Note',
        'Permission' => 'App\GraphQL\Type\Permission',
        'Role'       => 'App\GraphQL\Type\Role',
        'Status'     => 'App\GraphQL\Type\Status',
        'Technician' => 'App\GraphQL\Type\Technician',
        'Ticket'     => 'App\GraphQL\Type\Ticket',
        'User'       => 'App\GraphQL\Type\User',
    ],

    // This callable will received every Error objects for each errors GraphQL catch.
    // The method should return an array representing the error.
    'error_formatter' => ['\Folklore\GraphQL\GraphQL', 'formatError'],

];
