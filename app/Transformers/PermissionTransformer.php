<?php

namespace Eos\Transformers;

use Eos\Entities\UserGroup;
use Eos\Entities\Permission;
use League\Fractal\TransformerAbstract;

class PermissionTransformer extends TransformerAbstract
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
   * @param Permission $permission
   * @return array
   */
  public function transform(Permission $permission)
  {
    return [
      "id" => strval($permission->id),
      "name" => $permission->name,
      "title" => $permission->title,
      "created-at" => $permission->created_at->toIso8601String(),
      "updated-at" => $permission->updated_at->toIso8601String(),
    ];
  }

  /**
   * Include user group(s) for individual user.
   *
   * @param \Eos\Entities\UserGroup $permission
   * @return \League\Fractal\Resource\Collection
   */
  public function includeUserGroups(UserGroup $permission)
  {
    return $this->collection($permission->userGroups(), new UserGroupTransformer, "user-groups");
  }
}