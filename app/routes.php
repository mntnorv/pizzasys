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
| UserController routes
*/


Route::post('login', 'UserController@handleLogin')
	->before('csrf');

Route::post('register', 'UserController@handleRegistration')
	->before('csrf');

Route::post('acceptrequest', array('uses' => 'UserController@acceptFriendRequest',
	'as' => 'acceptrequest'))->before('auth');

Route::get('register', array('uses' => 'UserController@showRegistration',
	'as' => 'register'))->before('guest');

Route::get('logout',   array('uses' => 'UserController@handleLogout',
	'as' => 'logout'))->before('auth');

Route::get('login',    array('uses' => 'UserController@showLogin',
	'as' => 'login'))->before('guest');

Route::get('category/{category}', array('uses' => 'HomeController@showCategory',
	'as' => 'foodCategory'));

Route::group(array('prefix' => 'user'), function() {

	Route::get('profile',     array('uses' => 'UserController@showProfile',
		'as' => 'profile'))->before('auth');

	Route::post('addcontact', array('uses' => 'UserController@handleContactSearch',
		'as' => 'addcontact'))->before('csrf');

	Route::get('contacts',    array('uses' => 'UserController@showContacts', 
		'as' => 'contacts'))->before('auth');
});

Route::group(array('prefix' => 'admin'), function() {

	Route::get('index', array('uses' => 'AdminController@showIndex',
		'as' => 'index'))->before('auth');

	Route::get('users', array('uses' => 'AdminController@showUserManage', 
		'as' => 'users'))->before('auth');

	Route::post('users', array('uses' => 'AdminController@handleUserManage', 
		'as' => 'users.post'))->before('auth');
});

Route::group(array('prefix' => 'api'), function() {

	Route::group(array('prefix' => 'get'), function() {
			Route::get('user/{id}', array('uses' => 'ApiController@getUser', 
				'as' => 'api.get.user'))->before('auth');
	});

});

