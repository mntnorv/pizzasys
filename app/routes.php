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

	Route::get('order', array('uses' => 'CartController@handleOrder', 
		'as' => 'cart.order'));

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

	Route::get('discount/create', array('uses' => 'DiscountController@showCreateDiscount', 
		'as' => 'admin.discount.create'))->before('admin');

	Route::get('discount/{id}', array('uses' => 'DiscountController@showEditDiscount', 
		'as' => 'admin.discount.edit'))->before('admin');

	Route::get('reports', array('uses' => 'ReportsController@showReports', 
		'as' => 'admin.reports.show'))->before('admin');

	Route::get('report/{id}', array('uses' => 'ReportsController@showReportEdit', 
		'as' => 'admin.report.edit'))->before('admin');

	Route::get('reports', array('uses' => 'ReportsController@showReportList', 
		'as' => 'admin.report_list.show'))->before('admin');

	Route::get('orders', array('uses' => 'OrderController@showOrderList', 
		'as' => 'admin.orders'))->before('admin');

	Route::get('order/{id}', array('uses' => 'OrderController@showEditOrder', 
		'as' => 'admin.order.edit'))->before('admin');

});

/*
| Waiter panel routes
*/

Route::get('waiter', array('uses' => 'WaiterController@showIndex',
	'as' => 'waiter'))->before('waiter');

Route::group(array('prefix' => 'waiter'), function() {

	Route::get('order', array('uses' => 'WaiterController@showOrder', 
		'as' => 'waiter.order'))->before('waiter');
	
	Route::group(array('prefix' => 'order'), function() {

		Route::get('manage', array('uses' => 'WaiterController@showOrderManage', 
			'as' => 'waiter.order.manage'))->before('waiter');

	});

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

		Route::get('foodtypes', array('uses' => 'ApiController@getFoodTypes', 
			'as' => 'api.get.foodtypes'));

		Route::get('food/{type_id}', array('uses' => 'ApiController@getFoodByType', 
			'as' => 'api.get.foodByType'));

		Route::get('tables/{pizzeria_id}', array('uses' => 'ApiController@getTablesByPizzeria', 
			'as' => 'api.get.tablesByPizzeria'));

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
				'as' => 'api.waiter.order.add'))
			->before('waiter');

			Route::post('remove', array('uses' => 'WaiterController@removeFood', 
				'as' => 'api.waiter.order.remove'))
			->before('waiter');

			Route::post('update', array('uses' => 'WaiterController@updateFood', 
				'as' => 'api.waiter.order.update'))
			->before('waiter');

			Route::post('save', array('uses' => 'WaiterController@saveOrder', 
				'as' => 'api.waiter.order.save'))
			->before('waiter');

			Route::get('{id}/food', array('uses' => 'WaiterController@getOrderFood', 
				'as' => 'api.waiter.order.food'))
			->before('waiter');

		});

	});

	Route::group(array('prefix' => 'discount'), function() {

		Route::post('update/{id}', array('uses' => 'DiscountController@updateDiscount', 
			'as' => 'api.discount.update'))->before('admin');

		Route::post('remove/{id}', array('uses' => 'DiscountController@removeDiscount', 
			'as' => 'api.discount.remove'));

	});

	Route::group(array('prefix' => 'report'), function() {

		Route::post('update/{id}', array('uses' => 'ReportsController@updateReport', 
			'as' => 'api.report.update'))->before('admin');

		Route::post('remove/{id}', array('uses' => 'ReportsController@removeReport', 
			'as' => 'api.report.remove'));

	});

});
