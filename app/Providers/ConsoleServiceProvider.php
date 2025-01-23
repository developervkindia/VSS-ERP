<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ConsoleServiceProvider extends ServiceProvider
{
  /**
   * The console commands provided by your application.
   *
   * @var array
   */
  protected $commands = [
    \App\Console\Commands\HandleGitWorkflow::class,
  ];
  /**
   * Register any application services.
   */
  public function register(): void
  {
    $this->commands($this->commands);
  }
}
