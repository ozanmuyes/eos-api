<?php

namespace Eos\Transformers;

use Eos\Entities\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
  /**
   * List of resources possible to include.
   *
   * @var array
   */
  protected $availableIncludes = [
    "user-groups"
  ];

  /**
   * Turn this item object into a generic array.
   *
   * @param User $user
   * @return array
   */
  public function transform(User $user)
  {
    return [
      "id" => strval($user->id),
      "first-name" => $user->first_name,
      "last-name" => $user->last_name,
      "email" => $user->email,
      "created-at" => $user->created_at->toIso8601String(),
      "updated-at" => $user->updated_at->toIso8601String(),
    ];
  }

  /**
   * Include user group(s) for individual user.
   *
   * @param \Eos\Entities\User $user
   * @return \League\Fractal\Resource\Collection
   */
  public function includeUserGroups(User $user)
  {
    return $this->collection($user->userGroups(), new UserGroupTransformer, "user-groups");
  }
}
