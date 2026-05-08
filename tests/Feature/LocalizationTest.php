<?php

namespace Pirulug\CrudGenerator\Tests\Feature;

use Illuminate\Support\Facades\App;
use Pirulug\CrudGenerator\Tests\TestCase;

class LocalizationTest extends TestCase
{
  /** @test */
  public function it_translates_strings_to_spanish()
  {
    App::setLocale('es');

    $this->assertEquals('Crear', __('Create'));
    $this->assertEquals('Editar', __('Edit'));
    $this->assertEquals('Eliminar', __('Delete'));
    $this->assertEquals('Creado exitosamente.', __('Created successfully.'));
  }

  /** @test */
  public function it_translates_strings_to_english()
  {
    App::setLocale('en');

    $this->assertEquals('Create', __('Create'));
    $this->assertEquals('Edit', __('Edit'));
    $this->assertEquals('Delete', __('Delete'));
    $this->assertEquals('Created successfully.', __('Created successfully.'));
  }
}
