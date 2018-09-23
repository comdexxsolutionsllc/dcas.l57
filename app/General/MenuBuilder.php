<?php

namespace App\General;

/**
 * Class MenuBuilder
 *
 * @package App\General
 */
class MenuBuilder
{

    /**
     * @var static
     */
    public static $collection;

    /**
     * @return array
     */
    public static function factory(): array
    {
        //$menu = Menu::all()->toArray();

        //self::$collection = new MenuBuilder;
        //
        //foreach ($menus = Menu::all() as $menu) {
        //    self::$collection->push('topLevelMenus', collect([$menu->id => $menu->name]));
        //    foreach ($menu->menuItems as $menuItem) {
        //        self::$collection->push('menuItems', collect([$menuItem->name => $menuItem->parent_id]));
        //        foreach ($menuItem->menuItems as $menuSubItem) {
        //            self::$collection->push('menuSubItems', collect([$menuSubItem->name => $menuSubItem->parent_id]));
        //        }
        //    }
        //}

        self::$collection = [
            'ACCOUNT SETTINGS',
            [
                'text' => 'Profile',
                'url'  => 'admin/settings',
                'icon' => 'user',
            ],
            [
                'text' => 'Change Password',
                'url'  => 'admin/settings',
                'icon' => 'lock',
            ],

            [
                'text' => 'MOO Password',
                'url'  => 'admin/settings',
                'icon' => 'lock',
            ],

            [
                'text'    => 'Multilevel',
                'icon'    => 'share',
                'submenu' => [
                    [
                        'text' => 'Level One',
                        'url'  => '#',
                    ],
                    [
                        'text'    => 'Level One',
                        'url'     => '#',
                        'submenu' => [
                            [
                                'text' => 'Level Two',
                                'url'  => '#',
                            ],
                            [
                                'text'    => 'Level Two',
                                'url'     => '#',
                                'submenu' => [
                                    [
                                        'text' => 'Level Three',
                                        'url'  => '#',
                                    ],
                                    [
                                        'text' => 'Level Three',
                                        'url'  => '#',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'text' => 'Level One',
                        'url'  => '#',
                    ],
                ],
            ],
        ];

        return self::$collection;
    }
}
