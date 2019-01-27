<?php

namespace App\GraphQL\Type;

use Folklore\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

/**
 * Class Ticket
 *
 * @package App\GraphQL\Type
 */
class Ticket extends GraphQLType
{

    /**
     * @var array
     */
    protected $attributes = [
        'name'        => 'Ticket',
        'description' => 'A ticket',
    ];

    /**
     * @return array
     */
    public function fields(): array
    {
        return [
            'id'                     => [
                'type'        => Type::nonNull(Type::string()),
                'description' => 'The id of the ticket',
            ],
            'ticket_id'              => [
                'type'        => Type::nonNull(Type::string()),
                'description' => 'The ticket_id of the ticket',
            ],
            'title'                  => [
                'type'        => Type::string(),
                'description' => 'The ticket_id of the ticket',
            ],
            'body'                   => [
                'type'        => Type::string(),
                'description' => 'The ticket_id of the ticket',
            ],
            'status'                 => [
                'type'        => Type::nonNull(Type::string()),
                'description' => 'The status_id name of the ticket',
                'resolve'     => function ($data, $args) {
                    return $data->status->name;
                },
            ],
            'department_id'          => [
                'type'        => Type::nonNull(Type::string()),
                'description' => 'The department_id of the ticket',
                'resolve'     => function ($data, $args) {
                    return $data->department;
                },
            ],
            'user_id'                => [
                'type'        => Type::nonNull(Type::string()),
                'description' => 'The user_id that owns the ticket',
                'resolve'     => function ($data, $args) {
                    return $data->user;
                },
            ],
            'technician_assigned_id' => [
                'type'        => Type::nonNull(Type::string()),
                'description' => 'The technician_assigned_id to the ticket',
                'resolve'     => function ($data, $args) {
                    return $data->technicianAssigned->user;
                },
            ],
            'is_resolved'            => [
                'type'        => Type::boolean(),
                'description' => 'The ticket resolution state',
            ],
        ];
    }
}
