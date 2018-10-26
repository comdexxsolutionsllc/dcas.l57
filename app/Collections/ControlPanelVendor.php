<?php

namespace App\Collections;

use Illuminate\Support\Collection;

class ControlPanelVendor extends Collection
{

    /**
     * @var array
     */
    protected $items = [
        'CentOS Web Panel',
        'cPanel',
        'DirectAdmin',
        'ISPConfig',
        'Plesk',
        'Sentora',
        'Webmin',
    ];

    /**
     * ControlPanelVendor constructor.
     *
     * @param array $items
     */
    public function __construct($items = [])
    {
        parent::__construct($items = $this->items);
    }
}
