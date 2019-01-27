<?php

namespace App\Traits;

use Carbon\Carbon;

/**
 * Trait ActiveStatus
 *
 * @package App\Traits
 */
trait ActiveStatus
{

    /**
     * @return bool
     */
    public function isIdle(): bool
    {
        return ! $this->isActive();
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        $lastActive = Carbon::parse($this->last_active);

        $now = Carbon::parse(Carbon::now());

        $maxActiveInMinutes = 15;

        return ($lastActive->diffInMinutes($now) <= $maxActiveInMinutes) ? true : false;
    }
}
