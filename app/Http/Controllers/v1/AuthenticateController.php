<?php

namespace Eos\Http\Controllers\v1;

use Hash;
use JWTAuth;
use Dingo\Api\Http\Request;
use Eos\Http\Controllers\Controller;
use Eos\Repositories\UserRepository;
use Tymon\JWTAuth\Facades\JWTFactory;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AuthenticateController extends Controller
{
  public function authenticate(Request $request, UserRepository $userRepository)
  {
    // grab credentials from the request
    $credentials = $request->only('email', 'password');

    $previousException = null;
    if ($credentials["email"] === null) {
      $previousException = new NotFoundHttpException("User not found.", null, 0x00C00201);
    }

    if ($credentials["password"] === null) {
      // TODO Test after code \Eos\Exceptions\Factory::collection()
      throw new NotFoundHttpException("User not found.", $previousException, 0x00C00202);
    } else if ($previousException !== null) {
      throw $previousException;
    }

    // Try to find user by email
    $user = $userRepository->findWhere(["email" => $credentials["email"]]);
    if (count($user) === 0) {
      // The user could not found by that email
      throw new NotFoundHttpException("User not found.", null, 0x00C00203);
    }

    /**
     * @var \Eos\Entities\User $user
     */
    $user = $user[0];

    if (!Hash::check($credentials["password"], $user->password)) {
      // Password mismatch
      throw new NotFoundHttpException("User not found.", null, 0x00C00204);
    }

    $customClaims = [
      "sub" => $user->id,
      "fnm" => $user->first_name,
      "lnm" => $user->last_name
    ];

    try {
      $payload = JWTFactory::make($customClaims);
    } catch (JWTException $exception) {
      throw new \Exception("Couldn't create token", 0x00C00205);
    }

    try {
      /**
       * @var \Tymon\JWTAuth\Token $token
       */
      $token = JWTAuth::encode($payload);
    } catch (JWTException $exception) {
      throw new \Exception("Couldn't create token", 0x00C00206);
    }

    return response()->json(["token" => $token->get()]);
  }
}
