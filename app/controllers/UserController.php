<?php

class UserController extends BaseController {

	/*
	| POST /login
	*/
	public function handleLogin() {
		$user = array(
			'username' => Input::get('username'),
			'password' => Input::get('password')
			);

		if (Auth::attempt($user)) {
			return Redirect::route('home')
			->with('flash_message', 'You have successfully logged in.')
			->with('flash_type', 'success');
		}

		// authentication failure! lets go back to the login page
		return Redirect::route('login')
		->with('flash_message', 'Your username/password combination was incorrect.')
		->with('flash_type', 'error')
		->withInput();
	}

	/*
	| POST /register
	*/
	public function handleRegistration() {

		$user_for_test = array(
			'username' => Input::get('username'),
			'password'  =>Input::get('password'),
			'password_confirmation'=> strtolower(Input::get('password_confirmation'))
			);
		$rules = array(
			'username' => 'Required|Between:6,20|AlphaNum|Unique:users',
			'password'  =>'Required|AlphaNum|Between:6,32|Confirmed',
			'password_confirmation'=>'Required|AlphaNum|Between:6,32'
			);

		$validator = Validator::make($user_for_test, $rules);	

		if( $validator->passes() ) {
			$user = new User;
			$user->username = $user_for_test['username'];
			$user->password = Hash::make( $user_for_test['password']);
			$user->save();

			return Redirect::route('login')
			->with('flash_message', 'You have successfully registered')
			->with('flash_type', 'success');
		} else { 
			$errors =  $validator->messages()->all();
			$error_messages = implode('<br/>', $errors);

			return Redirect::route('register')
			->with('flash_message', $error_messages)
			->with('flash_type', 'error');
		}		
	}

	/*
	| GET /logout
	*/
	public function handleLogout() {
		Auth::logout();

		return Redirect::route('home')
		->with('flash_message', 'You have successfully logged out.')
		->with('flash_type', 'success');
	}


	/*
	| GET /login
	*/
	public function showLogin() {
		return View::make('login');
	}

	/*
	| GET /register
	*/
	public function showRegistration() {
		return View::make('register');
	}

	/*
	| GET /profile
	*/
	public function showProfile() {
		return View::make('profile');
	}

	/*
	| GET /manage
	*/
	public function showUserManage(){
		$users = User::All();

		return View::make('manage', array("users" => $users));
	}

	public function toSimpleArray($key = 'id', $value = 'name')
	{
		$final = array();

		foreach ($this->items as $item)
		{
			$final[$item->{$key}] = $item->{$value};
		}

		return $final;
	}

}