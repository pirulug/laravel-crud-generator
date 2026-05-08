<?php

namespace Pirulug\CrudGenerator\Tests\Feature;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Pirulug\CrudGenerator\Tests\TestCase;

class CrudGeneratorTest extends TestCase
{
  protected function setUp(): void
  {
    parent::setUp();

    // Cleanup before each test
    $this->cleanup();

    // Create a dummy table for testing
    Schema::create('users', function ($table) {
      $table->id();
      $table->string('name');
      $table->string('email')->unique();
      $table->timestamp('email_verified_at')->nullable();
      $table->string('password');
      $table->rememberToken();
      $table->timestamps();
    });

    // Ensure directories exist
    File::ensureDirectoryExists(app_path('Models'));
    File::ensureDirectoryExists(app_path('Http/Controllers/Api'));
    File::ensureDirectoryExists(app_path('Http/Requests'));
    File::ensureDirectoryExists(app_path('Http/Resources'));
    File::ensureDirectoryExists(resource_path('views'));
  }

  protected function tearDown(): void
  {
    $this->cleanup();
    parent::tearDown();
  }

  protected function cleanup()
  {
    File::delete(app_path('Models/User.php'));
    File::delete(app_path('Http/Controllers/UserController.php'));
    File::delete(app_path('Http/Controllers/Api/UserController.php'));
    File::delete(app_path('Http/Requests/UserRequest.php'));
    File::delete(app_path('Http/Resources/UserResource.php'));
    File::deleteDirectory(resource_path('views/user'));
  }

  /** @test */
  public function it_generates_crud_files_for_bootstrap()
  {
    $this->artisan('make:crud users bootstrap')
      ->assertExitCode(0);

    $this->assertTrue(File::exists(app_path('Models/User.php')));
    $this->assertTrue(File::exists(app_path('Http/Controllers/UserController.php')));
    $this->assertTrue(File::exists(app_path('Http/Requests/UserRequest.php')));
    $this->assertTrue(File::exists(resource_path('views/user/index.blade.php')));
  }

  /** @test */
  public function it_generates_crud_files_for_tailwind()
  {
    $this->artisan('make:crud users tailwind')
      ->assertExitCode(0);

    $this->assertTrue(File::exists(app_path('Models/User.php')));
    $this->assertTrue(File::exists(app_path('Http/Controllers/UserController.php')));
    $this->assertTrue(File::exists(resource_path('views/user/index.blade.php')));
  }

  /** @test */
  public function it_generates_crud_files_for_api()
  {
    $this->artisan('make:crud users api')
      ->assertExitCode(0);

    $this->assertTrue(File::exists(app_path('Models/User.php')));
    $this->assertTrue(File::exists(app_path('Http/Controllers/Api/UserController.php')));
    $this->assertTrue(File::exists(app_path('Http/Resources/UserResource.php')));
  }
}
