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


$api = app('Dingo\Api\Routing\Router');

Route::get('/', function () {
    return view('welcome');
});

$api->version('v1', function ($api) {
    $api->post('register', 'App\Http\Controllers\Auth\AuthController@register');
    $api->post('authenticate', 'App\Http\Controllers\Auth\AuthController@authenticate');
    $api->get('getauthuser', 'App\Http\Controllers\Auth\AuthController@getAuthenticatedUser');
    $api->get('token', 'App\Http\Controllers\Auth\AuthController@getToken');
    $api->resource('users', 'App\Http\Controllers\UserController');
    $api->resource('biens', 'App\Http\Controllers\BienController');
});

//$api->version('v1',['middleware' => 'jwt.auth'], function ($api) {
//    $api->resource('users', 'App\Http\Controllers\UserController');
//    $api->resource('biens', 'App\Http\Controllers\BienController');
//});
