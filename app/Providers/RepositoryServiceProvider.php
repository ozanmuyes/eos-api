<?php

namespace Eos\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider {
  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register()
  {
    app()->bind('\Eos\Repositories\UserRepository', '\Eos\Repositories\UserRepositoryEloquent');
    app()->bind('\Eos\Repositories\UserGroupRepository', '\Eos\Repositories\UserGroupRepositoryEloquent');
  }
}