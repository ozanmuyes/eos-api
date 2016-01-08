<?php

namespace Eos\Http\Controllers\v1;

use Eos\Http\Requests;
use Illuminate\Http\Request;
use Eos\Http\Controllers\Controller;
use Eos\Repositories\UserGroupRepository;
use Eos\Transformers\UserGroupTransformer;

class UserGroupsController extends Controller
{
  /**
   * @var \Eos\Repositories\UserGroupRepository $repository
   */
  protected $repository;

  /**
   * UsersController constructor.
   * @param \Eos\Repositories\UserGroupRepository $repository
   */
  public function __construct(UserGroupRepository $repository)
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
    $userGroups = $this->repository->all();

    return $this->response->collection($userGroups, new UserGroupTransformer, ["key" => "user-groups"]);
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
    $userGroup = $this->repository->find($id);

    return $this->response->item($userGroup, new UserGroupTransformer, ["key" => "user-groups"]);
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
