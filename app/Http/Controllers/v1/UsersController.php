<?php

namespace Eos\Http\Controllers\v1;

use Eos\Http\Requests;
use Gate;
use Illuminate\Http\Request;
use Eos\Http\Controllers\Controller;
use Eos\Repositories\UserRepository;
use Eos\Transformers\UserTransformer;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class UsersController extends Controller
{
  /**
   * @var \Eos\Repositories\UserRepository $repository
   */
  protected $repository;

  /**
   * UsersController constructor.
   * @param \Eos\Repositories\UserRepository $repository
   */
  public function __construct(UserRepository $repository)
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
    if (policy($user)->canSeeAll($user)) {
      throw new UnauthorizedHttpException("Bearer", "You are not authorized to see all users.", null, 0x00C00301);
    }

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
     // TODO Determine Request class name and set proper use stmt
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
