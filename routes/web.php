<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/auth', function (\Illuminate\Http\Request $request) {
    $request->session()->put('auth_user', \App\Models\User::find(1)->toArray());

    return 'session authenticated';
});

$router->group(['middleware' => 'auth'], function () use ($router) {
    $router->get('/protected', function () use ($router) {
        return $router->app->version();
    });
});
