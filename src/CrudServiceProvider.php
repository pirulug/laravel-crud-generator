<?php

namespace Pirulug\CrudGenerator;

use Pirulug\CrudGenerator\Commands\CrudGenerator;
use Illuminate\Support\ServiceProvider;

/**
 * Class CrudServiceProvider.
 */
class CrudServiceProvider extends ServiceProvider
{
  /**
   * Bootstrap services.
   *
   * @return void
   */
  public function boot()
  {
    if ($this->app->runningInConsole()) {
      $this->commands([
        CrudGenerator::class,
      ]);
    }

    $this->loadJsonTranslationsFrom(__DIR__ . '/lang');

    $this->publishes([
      __DIR__ . '/config/crud.php' => config_path('crud.php'),
    ], 'crud');

    $this->publishes([
      __DIR__ . '/lang' => lang_path('vendor/crud-generator'),
    ], 'crud-lang');

    $this->publishes([
      __DIR__ . '/stubs' => resource_path('stubs/crud/'),
    ], 'stubs-crud');
  }

  /**
   * Register services.
   *
   * @return void
   */
  public function register()
  {
    $this->mergeConfigFrom(__DIR__ . '/config/crud.php', 'crud');
  }
}
