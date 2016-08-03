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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::resource('services', 'ServicesController');
Route::get('/home', 'HomeController@index');

Route::get('/new_message/{id}', ['as' => 'new_message', 'uses' => 'MessagesController@new_message']);
Route::post('/message', ['as' => 'create_message', 'uses' => 'MessagesController@send']);

Route::get('/incoming', ['as' => 'incoming', 'uses' => 'MessagesController@incoming']);
Route::get('/outcoming', ['as' => 'outcoming', 'uses' => 'MessagesController@outcoming']);

Route::get('/details/{id}', ['as' => 'details', 'uses' => 'MessagesController@details']);

Route::get('/google', ['as' => 'login_google', 'uses' => 'OAuthController@loginWithGoogle']);

Route::put('/users/update', ['as' => 'update', 'uses' => 'UsersController@update']);

Route::get('/search/service', ['as' => 'search.service', 'uses' => 'ServicesController@searchService']);

