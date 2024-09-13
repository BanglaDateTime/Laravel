<?php

namespace BanglaDateTime\Laravel\Tests;

use BanglaDateTime\Laravel\BanglaDateTimeServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    /**
     * Load the service provider for the package.
     *
     * @param  \Illuminate\Foundation\Application  $app
     */
    protected function getPackageProviders($app): array
    {
        return [
            BanglaDateTimeServiceProvider::class,
        ];
    }
}
