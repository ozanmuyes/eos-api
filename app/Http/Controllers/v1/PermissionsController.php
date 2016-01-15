<?php

namespace Eos\Http\Controllers\v1;

use Eos\Entities\Permission;
use Eos\Http\Requests;
use Illuminate\Http\Request;
use Eos\Http\Controllers\Controller;
use Eos\Repositories\PermissionRepository;
use Eos\Transformers\PermissionTransformer;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class PermissionsController extends Controller
{
  /**
   * @var \Eos\Repositories\UserRepository $repository
   */
  protected $repository;

  /**
   * PermissionsController constructor.
   * @param \Eos\Repositories\PermissionRepository $repository
   */
  public function __construct(PermissionRepository $repository)
  {
    $this->repository = $repository;
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Eos\Http\Response\Format\JsonApi
   */
  public function index()
  {
    $user = $this->user();

    if ($user == null) {
      throw new UnauthorizedHttpException("Bearer", "You are not authorized to see all permissions.", null, 0x00C00401);
    }

    if (!policy(Permission::class)->canSeeAll($user)) {
      throw new HttpException(403, "You are not authorized to see all permissions.", null, [], 0x00C00402);
    }

    $permissions = $this->repository->all();

    return $this->response->collection($permissions, new PermissionTransformer, ["key" => "permissions"]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Eos\Http\Response\Format\JsonApi
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  Request  $request
   * @return \Eos\Http\Response\Format\JsonApi
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Eos\Http\Response\Format\JsonApi
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Eos\Http\Response\Format\JsonApi
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  Request  $request
   * @param  int  $id
   * @return \Eos\Http\Response\Format\JsonApi
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Eos\Http\Response\Format\JsonApi
   */
  public function destroy($id)
  {
    //
  }
}
