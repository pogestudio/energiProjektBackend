<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Route::get('loadUser', 'AuthController@loadUser');
//Route::post('login', 'AuthController@postLogin');
//Route::post('pageturn/store', 'PageTurnsController@store');
//Route::get('pageturn/{bookId}/latest', 'PageTurnsController@latestOpenedPage');
//Route::resource('pageturn', 'PageTurnsController');
//Route::resource('users', 'UsersController');
//Route::get('test', 'AuthController@test');

// Confide routes
Route::post('user/login',                  'UserController@do_login');
Route::get( 'user/create',                 'UserController@create');
Route::post('user',                        'UserController@store');
Route::get( 'user/login',                  'UserController@login');
Route::get( 'user/confirm/{code}',         'UserController@confirm');
Route::get( 'user/forgot_password',        'UserController@forgot_password');
Route::post('user/forgot_password',        'UserController@do_forgot_password');
Route::get( 'user/reset_password/{token}', 'UserController@reset_password');
Route::post('user/reset_password',         'UserController@do_reset_password');
Route::get( 'user/logout',                 'UserController@logout');


Route::post('projects/store', 'ProjectsController@store');
Route::get('projects', 'ProjectsController@index');

Route::get('areas/{projektId}', 'AreasController@getAll');
Route::post('areas/store', 'AreasController@store');
Route::delete('areas/{areaId}', 'AreasController@destroy');

Route::get('energytypes/{project_id}', 'EnergyTypesController@index');
Route::post('energytypes/storeMany', 'EnergyTypesController@storeMany');

Route::post('processes/index', 'ProcessesController@index');
Route::post('processes/store', 'ProcessesController@store');
Route::delete('processes/{processId}', 'ProcessesController@destroy');


Route::get('processTypes/{projectId}', 'ProcessTypesController@index');

