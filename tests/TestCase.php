<?php

namespace Webfucktory\PackageName\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Webfucktory\PackageName\ServiceProvider;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            ServiceProvider::class,
        ];
    }
}
