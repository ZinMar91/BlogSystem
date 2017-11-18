<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('users/register', 'Auth\RegisterController@show');
Route::post('users/register', 'Auth\RegisterController@register');
Route::get('users/logout', 'Auth\LoginController@logout');
Route::get('users/login', 'Auth\LoginController@show');
Route::post('users/login', 'Auth\LoginController@login');

Route::group(array('middleware' => 'auth'), function() {
  Route::get('posts', 'PostCreator\PostController@index');
  Route::get('posts/{id}/show', 'PostCreator\PostController@show');
  Route::post('comment/create', 'CommentController@store');
});

Route::group(array('prefix' => 'admin', 'namespace' => 'admin', 'middleware' => 'manager'), function() {
  Route::get('/', 'AdminController@index');

  Route::get('users', 'UserController@index');
  Route::get('users/{id}/edit', 'UserController@edit');
  Route::post('users/{id}/edit', 'UserController@update');

  Route::get('roles', 'RoleController@index');
  Route::get('roles/create', 'RoleController@create');
  Route::post('roles/create', 'RoleController@store');

  Route::get('categories', 'CategoryController@index');
  Route::get('categories/create', 'CategoryController@create');
  Route::post('categories/create', 'CategoryController@store');
  Route::get('categories/{id}/edit', 'CategoryController@edit');
  Route::post('categories/{id}/edit', 'CategoryController@update');
});

Route::group(array('prefix' => 'postcreator', 'namespace' => 'postcreator', 'middleware' => 'postcreator'), function() {
  // Route::get('posts', 'PostController@index');
  Route::get('posts/create', 'PostController@create');
  Route::post('posts/create', 'PostController@store');
  Route::get('posts/{id}/edit', 'PostController@edit');
  Route::post('posts/{id}/edit', 'PostController@update');
});
