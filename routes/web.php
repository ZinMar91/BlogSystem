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
/************ AJAX Tutorials ************/
// With Item
Route::get('manage-item-ajax', 'ItemAjaxController@manageItemAjax');
Route::resource('item-ajax', 'ItemAjaxController');

// With Product
Route::get('productajaxCRUD', function () {
    $products = App\Models\Product::all();
    return view('ajax.product.index')->with('products',$products);
});
Route::get('productajaxCRUD/{product_id?}',function($product_id){
    $product = App\Models\Product::find($product_id);
    return response()->json($product);
});
Route::post('productajaxCRUD',function(Request $request){   
    $product = App\Models\Product::create($request->input());
    return response()->json($product);
});
Route::put('productajaxCRUD/{product_id?}',function(Request $request,$product_id){
    $product = App\Models\Product::find($product_id);
    $product->name = $request->name;
    $product->details = $request->details;
    $product->save();
    return response()->json($product);
});
Route::delete('productajaxCRUD/{product_id?}',function($product_id){
    $product = App\Models\Product::destroy($product_id);
    return response()->json($product);
});




//////////////// Original routes for blog system
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
