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

$app->get('/', function () use ($app) {
    return $app->welcome();
});
$app->group(['prefix' => 'api/v1','namespace' => 'App\Http\Controllers','middleware' => 'cors'], function($app)
{
    // header('Access-Control-Allow-Origin: http://belajar.dev');
    // header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
    

    $app->get('book','BookController@index');
  
    // Get
    $app->get('book/{id}','BookController@getbook');
      
    // Insert  
    $app->post('book','BookController@createBook');
    
    // Update  
    $app->post('book/{id}','BookController@updateBook');
      
    // Delete  
    $app->delete('book/{id}','BookController@deleteBook');
});