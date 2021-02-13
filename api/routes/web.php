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

$router->get('', 'ContactController@show');
$router->post('/contacts', 'ContactController@index');
$router->get('/contacts', 'ContactController@show');

//https://galib-rabib.medium.com/how-to-fix-cors-error-in-lumen-api-services-ba5a62d23507
