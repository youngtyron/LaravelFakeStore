<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::resource('/catalog', 'CategoryController', ['as'=>'catalog']);

Route::group(['prefix' => 'catalog', 'as'=>'catalog.'], function()
{
  // Route::resource('/', 'CategoryController')->only([
  //   'index', 'show']);
  Route::get('/', 'CategoryController@index')->name('index');
  Route::get('/{id}', 'CategoryController@show')->name('show');
  // Route::resource('/products', 'ProductController', ['as'=>'product']);
  Route::get('/{id}/products', 'ProductController@index_category')->name('products_category');
});

Route::resource('/api_catalog', 'CategoryAPIController');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function()
{
  Route::get('/', 'Admin\AdminController@show')->name('adminpanel');
  Route::get('/categories', 'CategoryController@adminshow')->name('admin.categories');
  Route::resource('/category', 'CategoryController', ['as'=>'admin']);
  Route::resource('/products', 'ProductController', ['as'=>'admin']);
});
