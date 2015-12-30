<?php

namespace Eos\Policies\v1;

use Eos\Entities\User;

class UserPolicy
{
  /**
   * Create a new policy instance.
   *
   * @return void
   */
  public function __construct()
  {
    //
  }

  public function canSeeAll(User $user)
  {
    foreach ($user->userGroups as $userGroup) {
      if (in_array("users.index", $userGroup->permissions->toArray())) {
        return true;
      }
    }

    return false;
  }
}
