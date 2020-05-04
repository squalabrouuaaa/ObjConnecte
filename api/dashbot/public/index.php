<?php

date_default_timezone_set('Europe/Paris');
ini_set("log_errors", 1);
ini_set("error_log", "./php-error");
error_reporting(E_ALL);

header('Access-Control-Allow-Origin: *');

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| First we need to get an application instance. This creates an instance
| of the application / container and bootstraps the application so it
| is ready to receive HTTP / Console requests from the environment.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/
$app->run($app->request);
//echo "</br>hello there </br>-Général kenobi";
