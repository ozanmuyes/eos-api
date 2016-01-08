<?php

namespace Eos\Policies\v1;

use Eos\Entities\User;

class UserPolicy
{
  public function canSeeAll(User $user)
  {
    foreach ($user->userGroups as $userGroup) {
      if ($userGroup->permissions->contains("name", "users.index")) {
        return true;
      }
    }

    return false;
  }
}
