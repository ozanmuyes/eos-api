<?php

namespace Eos\Transformers;

use Eos\Entities\UserGroup;
use League\Fractal\TransformerAbstract;

class UserGroupTransformer extends TransformerAbstract
{
  /**
   * List of resources possible to include.
   *
   * @var array
   */
  protected $availableIncludes = [
    "users"
  ];

  /**
   * Turn this item object into a generic array.
   *
   * @param \Eos\Entities\UserGroup $userGroup
   * @return array
   */
  public function transform(UserGroup $userGroup)
  {
    return [
      "id" => strval($userGroup->id),
      "name" => $userGroup->name,
      "title" => $userGroup->title,
      "created-at" => $userGroup->created_at->toIso8601String(),
      "updated-at" => $userGroup->updated_at->toIso8601String(),
    ];
  }

  /**
   * Include user(s) for individual user group.
   *
   * @param \Eos\Entities\UserGroup $userGroup
   * @return \League\Fractal\Resource\Collection
   */
  public function includeUsers(UserGroup $userGroup)
  {
    return $this->collection($userGroup->users, new UserTransformer, "users");
  }
}
