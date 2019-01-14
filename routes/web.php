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

Route::resource('/catalog', 'CategoryController', ['as'=>'catalog']);

Route::resource('/api_catalog', 'CategoryAPIController');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function()
{
  Route::get('/', 'Admin\AdminController@show')->name('adminpanel');
  Route::get('/categories', 'CategoryController@adminshow')->name('admin.categories');
  Route::resource('/category', 'CategoryController', ['as'=>'admin']);
});
