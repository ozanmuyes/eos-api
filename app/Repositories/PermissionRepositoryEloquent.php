<?php

namespace Eos\Repositories;

use Eos\Entities\Permission;
use Eos\Repository\Eloquent\BaseRepository;
use Eos\Repository\Criteria\RequestCriteria;

/**
 * Class PermissionRepositoryEloquent
 * @package namespace Eos\Repositories;
 */
class PermissionRepositoryEloquent extends BaseRepository implements PermissionRepository
{
  /**
   * Specify Model class name
   *
   * @return string
   */
  public function model()
  {
    return Permission::class;
  }

  /**
   * Boot up the repository, pushing criteria
   */
  public function boot()
  {
    $this->pushCriteria(app(RequestCriteria::class));
  }
}
