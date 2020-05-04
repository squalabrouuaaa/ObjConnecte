<?php

header('Access-Control-Allow-Origin: *');

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

use \Illuminate\Http\Request;

$app->get('/', function () use ($app) {
    return $app->app->version();
});

$app->post('/login','UserController@login');

$app->post('/refresh','UserController@refresh');

$app->post('/getConfig','UserController@getConfig');

$app->post('/test','UserController@test');

$app->post('/setConfig','UserController@setConfig');

$app->post('/getstats','UserController@getstats');

