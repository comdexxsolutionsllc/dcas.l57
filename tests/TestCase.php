<?php

namespace Tests;

use Drfraker\SnipeMigrations\Snipe;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{

    use CreatesApplication;

    public function setUpTraits()
    {
        $uses = parent::setUpTraits();

        if (isset($uses[DatabaseTransactions::class])) {
            (new Snipe())->importSnapshot();
        }
    }
}
