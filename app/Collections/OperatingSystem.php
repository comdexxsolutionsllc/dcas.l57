<?php

namespace App\Collections;

use Illuminate\Support\Collection;

class OperatingSystem extends Collection
{

    /**
     * @var array
     */
    protected $items = [
        'linux'   => [
            'Arch Linux',
            'Debian',
            'Deepin',
            'Fedora',
            'Linux Mint',
            'openSUSE',
            'Ubuntu Linux',
        ],
        'mac'     => [
            'OS X 10.9 - Mavericks (Cabernet)',
            'OS X 10.10 - Yosemite (Syrah)',
            'OS X 10.11 - El Capitan (Gala)',
            'macOS 10.12 - Sierra (Fuji)',
            'macOS 10.13 - High Sierra (Lobo)',
            'macOS 10.14 - Mojave (Liberty)',
        ],
        'windows' => [
            'Windows Server 2012 (August 2012)',
            'Windows Server 2012 R2 (October 2013)',
            'Windows Server 2016 (September 2016)',
            'Windows Server 2019 (October 2018)',
        ],
    ];

    /**
     * OperatingSystem constructor.
     *
     * @param array $items
     */
    public function __construct($items = [])
    {
        parent::__construct($items = $this->items);
    }
}
