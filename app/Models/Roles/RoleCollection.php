<?php

namespace App\Models\Roles;

use Illuminate\Support\Collection;

class RoleCollection extends Collection
{

    /**
     * @var string
     */
    protected static $default = 'customer';

    /**
     * @var array
     */
    protected $items = [
        'customer'    => 'customer',
        'employee'    => 'employee',
        'vendor'      => 'vendor',
        'whitegloves' => 'whitegloves',
    ];

    /**
     * RoleCollection constructor.
     *
     * @param array $items
     */
    public function __construct($items = [])
    {
        $items = $this->items;

        parent::__construct($items);
    }

    /**
     * @return \App\Models\Roles\RoleCollection
     */
    public static function factory()
    {
        return new RoleCollection;
    }

    /**
     * @return string
     */
    public static function default()
    {
        return self::$default;
    }

    /**
     * Get the keys of the collection items.
     *
     * @return array|\Illuminate\Support\Collection
     */
    public function keys()
    {
        return array_keys(self::all());
    }

    /**
     * Reset the keys on the underlying array.
     *
     * @return array|\Illuminate\Support\Collection
     */
    public function values()
    {
        return array_values(self::all());
    }
}
