<?php

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
/** @var \Laravel\Lumen\Routing\Router $router */
$router->get('/', function () use ($router) {
    return response()->make(include 'socket.html', 200);
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->group(['prefix' => 'auth'], function () use ($router) {
        $router->post('login', 'AuthController@login');

        $router->post('register', 'AuthController@register');

        $router->get('idCheck', 'AuthController@idCheck');
    });

    $router->group(['prefix' => 'morzana'], function () use ($router) {
        $router->get('joinedUser', 'MorzanaController@joinedUser');

        $router->post('sendMessage', 'MorzanaController@sendMessage');

        $router->get('receiveMessageList', 'MorzanaController@receiveMessageList');

        $router->get('sendMessageList', 'MorzanaController@sendMessageList');
    });
});