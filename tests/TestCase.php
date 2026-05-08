<?php

namespace Pirulug\CrudGenerator\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Pirulug\CrudGenerator\CrudServiceProvider;

class TestCase extends Orchestra
{
  protected function getPackageProviders($app)
  {
    return [
      CrudServiceProvider::class,
    ];
  }

  protected function getEnvironmentSetUp($app)
  {
    $app['config']->set('database.default', 'sqlite');
    $app['config']->set('database.connections.sqlite', [
      'driver' => 'sqlite',
      'database' => ':memory:',
      'prefix' => '',
    ]);

    $app['config']->set('crud.layout', false);
  }
}
