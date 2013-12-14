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

Route::get('/', array('uses' => 'HomeController@showHome',
	'as' => 'home'));

/*
| User and authentication routes
*/

Route::post('login', 'UserController@handleLogin')
	->before('csrf');

Route::post('register', 'UserController@handleRegistration')
	->before('csrf');

Route::get('register', array('uses' => 'UserController@showRegistration',
	'as' => 'register'))->before('guest');

Route::get('logout',   array('uses' => 'UserController@handleLogout',
	'as' => 'logout'))->before('auth');

Route::get('login',    array('uses' => 'UserController@showLogin',
	'as' => 'login'))->before('guest');

Route::group(array('prefix' => 'user'), function() {

	Route::get('profile', array('uses' => 'UserController@showProfile',
		'as' => 'profile'))->before('auth');

});

/*
| Cart management routes
*/

Route::get('cart', array('uses' => 'CartController@showContents', 
	'as' => 'cart'));

Route::group(array('prefix' => 'cart'), function() {

	Route::get('delivery', array('uses' => 'CartController@showDelivery', 
		'as' => 'cart.delivery'));

	Route::post('delivery', array('uses' => 'CartController@setDelivery', 
		'as' => 'cart.delivery.set'));

	Route::get('confirm', array('uses' => 'CartController@showConfirmation', 
		'as' => 'cart.confirm'));

});

/*
| Admin panel routes
*/

Route::get('admin', array('uses' => 'AdminController@showIndex',
	'as' => 'admin'))->before('admin');

Route::group(array('prefix' => 'admin'), function() {

	Route::get('users', array('uses' => 'UserManagementController@showUserManage', 
		'as' => 'admin.users'))->before('admin');

	Route::post('users', array('uses' => 'UserManagementController@handleUserManage', 
		'as' => 'admin.users.post'))->before('admin');

	Route::get('discounts', array('uses' => 'DiscountController@showDiscountList', 
		'as' => 'admin.discounts'))->before('admin');

	Route::get('discounts/{id}', array('uses' => 'DiscountController@editDiscount', 
			'as' => 'admin.discounts.edit'))->before('admin');
});

/*
| Waiter panel routes
*/

Route::get('waiter', array('uses' => 'WaiterController@showIndex',
	'as' => 'waiter'))->before('waiter');

Route::group(array('prefix' => 'waiter'), function() {

	Route::get('order', array('uses' => 'WaiterController@showOrder', 
		'as' => 'waiter.order'))->before('waiter');

});

/*
| API routes
*/

Route::group(array('prefix' => 'api'), function() {

	Route::group(array('prefix' => 'get'), function() {

		Route::get('user/{id}', array('uses' => 'ApiController@getUser', 
			'as' => 'api.get.user'))->before('auth');

		Route::get('food', array('uses' => 'ApiController@getFood', 
			'as' => 'api.get.food'));

		Route::get('food/{type_id}', array('uses' => 'ApiController@getFoodByType', 
			'as' => 'api.get.foodByType'));

	});

	Route::group(array('prefix' => 'cart'), function() {

		Route::post('add', array('uses' => 'CartController@addFood', 
			'as' => 'api.cart.add'));

		Route::post('remove', array('uses' => 'CartController@removeFood', 
			'as' => 'api.cart.remove'));

		Route::post('update', array('uses' => 'CartController@updateFood', 
			'as' => 'api.cart.update'));

	});

	Route::group(array('prefix' => 'waiter'), function() {

		Route::group(array('prefix' => 'order'), function() {

		Route::post('add', array('uses' => 'WaiterController@addFood', 
			'as' => 'api.waiter.order.add'));

		Route::post('remove', array('uses' => 'WaiterController@removeFood', 
			'as' => 'api.waiter.order.remove'));

		Route::post('update', array('uses' => 'WaiterController@updateFood', 
			'as' => 'api.waiter.order.update'));

		});

	});



});
