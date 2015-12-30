<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * @var \Dingo\Api\Routing\Router $api
 */
$api = app('Dingo\Api\Routing\Router');

$api->version("v1", function () use ($api) {
  $api->group(["prefix" => "users", "middleware" => "api.auth"], function () use ($api) {
    $api->get('/', '\Eos\Http\Controllers\v1\UsersController@index');
  });
});

Route::get('/', function () {
  return view('welcome');
});
