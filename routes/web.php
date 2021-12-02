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

$router->group(['prefix' => 'api/v1'], function () use ($router) {

    // cms
    $router->group(['prefix' => 'cms'], function () use ($router) {

        // auth
        $router->group(['prefix' => 'auth'], function () use ($router) {
            $router->post('login', function () {
                return response(['message' => 'login']);
            });
            $router->post('register', function () {
                return response(['message' => 'register']);
            });
        });

        // jwt required
        $router->group([], function () use ($router) {

            // store
            $router->group(['prefix' => 'store'], function () use ($router) {
                $router->get('', function () {
                    return response(['message' => 'get store']);
                });
                $router->post('', function () {
                    return response(['message' => 'post store']);
                });
                $router->get('{id}', function ($id) {
                    return response(['message' => 'store id: '.$id]);
                });
                $router->put('{id}', function ($id) {
                    return response(['message' => 'edit store id: '.$id]);
                });
                $router->delete('{id}', function ($id) {
                    return response(['message' => 'delete store id: '.$id]);
                });
            });

            // sales
            $router->group(['prefix' => 'sales'], function () use ($router) {
                $router->get('', function () {
                    return response(['message' => 'get sales']);
                });
                $router->post('', function () {
                    return response(['message' => 'post sales']);
                });
                $router->get('{id}', function ($id) {
                    return response(['message' => 'sales id: '.$id]);
                });
                $router->put('{id}', function ($id) {
                    return response(['message' => 'edit sales id: '.$id]);
                });
                $router->delete('{id}', function ($id) {
                    return response(['message' => 'delete sales id: '.$id]);
                });
            });

            // activity sales
            $router->get('activity', function () {
                return response(['message' => 'get activity']);
            });
        });
    });

    // mobile
});
