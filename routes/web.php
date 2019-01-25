<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'catalog', 'as'=>'catalog.'], function()
{
  // Route::resource('/', 'CategoryController')->only([
  //   'index', 'show']);
  Route::get('/', 'CategoryController@index')->name('index');
  Route::get('/{category}', 'CategoryController@show')->name('show');
  Route::get('/{id}/products', 'ProductController@index_category')->name('products_category');
  Route::get('/product/{product}', 'ProductController@show')->name('product.show');
  Route::get('/product/{product}/edit', 'ProductController@edit')->name('product.edit');
  Route::put('/product/{product}/update', 'ProductController@update')->name('product.update');

});
Route::group(['prefix' => 'api', 'middleware' => 'cors'], function()
{
  Route::get('/products', 'ProductAPIController@index')->name('api.products');
  Route::get('/leftblock', 'LeftAPIController@leftblock')->name('api.leftblock');
  Route::post('/to_basket', 'BasketController@add');
});


Route::resource('/api_catalog', 'CategoryAPIController');


Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
  Route::get('/', 'Admin\AdminController@show')->name('adminpanel');
  Route::get('/categories', 'Admin\AdminController@categories')->name('admin.categories');
  Route::get('/categories/create', 'Admin\AdminController@create_category')->name('admin.category.create');
  Route::post('/categories/store', 'Admin\AdminController@store_category')->name('admin.category.store');
  Route::get('/categories/{category}/edit', 'Admin\AdminController@edit_category')->name('admin.category.edit');
  Route::put('/categories/{category}/update', 'Admin\AdminController@update_category')->name('admin.category.update');
  Route::get('/products/create', 'Admin\AdminController@create_product')->name('admin.product.create');
  Route::post('/products/store', 'Admin\AdminController@store_product')->name('admin.product.store');


  // Route::resource('/products', 'ProductController', ['as'=>'admin']);
});
