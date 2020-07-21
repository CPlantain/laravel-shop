<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::group([
	'middleware' => 'auth',
	'prefix' => 'user',
	'namespace' => 'User'
], function ()
{
	Route::get('/orders', 'OrdersController@index')->name('user.orders.index');	
	Route::get('/orders/{order:id}', 'OrdersController@show')->name('user.orders.show');	
});

Route::group([
	'middleware' => 'admin', 
	'prefix' => 'admin',
	'namespace' => 'Admin'
], function ()
{
	Route::get('/', 'HomeController@index')->name('admin.home');
	Route::get('/orders', 'OrdersController@index')->name('admin.orders');
	Route::get('/orders/{order:id}', 'OrdersController@show')->name('admin.orders.show');

	Route::resources([
		'categories' => 'CategoriesController',
		'products' => 'ProductsController'
	]);
});

Route::get('/', 'HomeController')->name('home'); 

Route::get('/products', 'ProductsController@index')->name('products');


Route::get('/cart', 'OrdersController@show')->name('cart');

Route::post('/cart/add/{product:id}', 'OrdersController@addProduct')->name('cart.add');

Route::group(['middleware' => 'cart.not.empty'], function () 
{
	Route::delete('/cart/remove/{product:id}', 'OrdersController@removeProduct')->name('cart.remove');

	Route::get('/order/confirm', 'OrdersController@confirm')->name('order.confirm');

	Route::post('/order/place', 'OrdersController@place')->name('order.place');
});


Route::get('/categories/{category:slug}/{product:slug}', 'ProductsController@show')->name('product');

Route::get('/categories', 'CategoriesController@index')->name('categories');

Route::get('/categories/{category:slug}', 'CategoriesController@show')->name('category');

