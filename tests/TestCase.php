<?php

namespace Veldman\Agora\Tests;

use Veldman\Agora\AgoraServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            AgoraServiceProvider::class
        ];
    }
}