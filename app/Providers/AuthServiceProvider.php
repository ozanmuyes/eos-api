<?php

namespace Eos\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
  /**
   * The policy mappings for the application.
   *
   * @var array
   */
  protected $policies = [
    'Eos\Model' => 'Eos\Policies\ModelPolicy',
    \Eos\Entities\User::class => \Eos\Policies\v1\UserPolicy::class,
  ];

  /**
   * Register any application authentication / authorization services.
   *
   * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
   * @return void
   */
  public function boot(GateContract $gate)
  {
    parent::registerPolicies($gate);

    //
  }
}
