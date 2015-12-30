<?php

namespace Eos\Http\Controllers\v1;

use Eos\Http\Requests;
use Illuminate\Http\Request;
use Eos\Http\Controllers\Controller;
use Eos\Transformers\UserTransformer;
use Eos\Repositories\UserRepositoryEloquent;

class UsersController extends Controller
{
  /**
   * @var \Eos\Repositories\UserRepositoryEloquent $repository
   */
  protected $repository;

  /**
   * UsersController constructor.
   * @param \Eos\Repositories\UserRepositoryEloquent $repository
   */
  public function __construct(UserRepositoryEloquent $repository)
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
    $users = $this->repository->all();

    return $this->response->collection($users, new UserTransformer);
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
