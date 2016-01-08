<?php

namespace Eos\Providers;

use Exception;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
//    app('Dingo\Api\Exception\Handler')->register(function (Exception $exception) {
//      return app('Eos\Exceptions\Handler')->handle($exception);
//    });
  }

  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    //
  }
}
