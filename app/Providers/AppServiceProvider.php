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
    /**
     * @var \Dingo\Api\Exception\Handler $dingoExceptionHandler
     */
    $dingoExceptionHandler = app('Dingo\Api\Exception\Handler');

    /**
     * @var \Eos\Exceptions\Handler $eosExceptionHandler
     */
    $eosExceptionHandler = app('Eos\Exceptions\Handler');

    $dingoExceptionHandler->register(function (Exception $exception) use ($eosExceptionHandler) {
      return $eosExceptionHandler->handle($exception);
    });
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
