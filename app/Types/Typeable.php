<?php

namespace App\Types;

use Illuminate\Support\Collection;
use ReflectionClass;

/**
 * Trait Typeable
 *
 * @package App\Types
 */
trait Typeable
{

    /**
     * @return \Illuminate\Support\Collection
     *
     * @throws \ReflectionException
     */
    public function all(): Collection
    {
        return collect(self::getConstants());
    }

    /**
     * @return array
     *
     * @throws \ReflectionException
     */
    protected static function getConstants(): array
    {
        return (new ReflectionClass(__CLASS__))->getConstants();
    }
}
