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
	|POST /addcontacts
	*/
	public function handleContactSearch() {
		// Flashing input for later use
		Input::flash();

		$contact = array(
			'contact' => Input::get('contact')
			);

		$rules = array(
			'contact' => 'Required|Between:2,20');

		$validator = Validator::make($contact, $rules);

		if($validator->passes()){

			if(strcmp(strtolower(Auth::user()->username), strtolower($contact['contact'])) == 0){
				return Redirect::route('addcontact')
				->with('flash_message', 'You can\'t add yourself to contacts.')
				->with('flash_type', 'error');
			}

			$contactDB = DB::table('users')->where('username', $contact['contact'])->first();

			$result = DB::table('user_contacts')
			->where('user_id', Auth::user()->id)
			->where('user_contact_id', $contactDB->id)
			->first();

			if(!empty($result)){
				return Redirect::route('profile')
				->with('flash_message', 'You already have '.Input::old('contact').' in you contacts')
				->with('flash_type', 'error');
			}

			if(empty($contactDB)){

				return Redirect::route('profile')
				->with('flash_message', 'User with name '.Input::old('contact').' not found')
				->with('flash_type', 'error');
			}

			//If user has already sent the request to this contact throw error
			$result = DB::table('user_contacts_pending')
			->where('user_id', Auth::user()->id)
			->where('user_contact_id', $contactDB->id)
			->orWhere('user_id', $contactDB->id)
			->where('user_contact_id', Auth::user()->id)
			->first();

			if(!empty($result)){
				return Redirect::route('profile')
				->with('flash_message', 'You have already sent contact request to
					'.Input::old('contact').' or you got contact request from '.Input::old('contact').'')
				->with('flash_type', 'error');
			}


			//If contact is found, we send him request
			DB::table('user_contacts_pending')
			->insert(
				array('user_id' => Auth::user()->id, 
					'user_contact_id' => $contactDB->id));

			return Redirect::route('profile')
			->with('flash_message', 'Request successfully sent to '.Input::old('contact').'')
			->with('flash_type', 'success');
		} else {
			return Redirect::route('profile')
			->with('flash_message', 'Contact name should be between 6 to 20 symbols.')
			->with('flash_type', 'error');
		}
	}

	/*
	|POST /acceptrequest
	*/
	public function acceptFriendRequest() {
		$user_contact_id = Input::get('contact_id');
		$user_id = Auth::user()->id;

		//If a user in contacts put error
		$count = DB::table('user_contacts')
		->where('user_id', $user_id)
		->where('user_contact_id', $user_contact_id)
		->count();

		if($count > 0){
			return Response::json(
				array('error' => 'You have already'.Input::get('username').' in your contacts list.')
				);
		}

		DB::table('user_contacts_pending')->where('user_id', $user_contact_id)->delete();

		DB::table('user_contacts')
		->insert(array('user_id' => $user_id, 'user_contact_id' => $user_contact_id, 'status' => 1));
		
		DB::table('user_contacts')
		->insert(array('user_id' => $user_contact_id, 'user_contact_id' => $user_id, 'status' => 0));

		return Response::json(
			array('success' => 'You have successfully added'.Input::get('username').' to your contacts list.')
			);
	}

	/*
	|POST /declinerequest
	*/
	public function declineFriendRequest(){
		$requester_id = Input::get('contact_id');
		$user_id = Auth::user()->id;

		//If user has already declined request
		$status = DB::table('user_contacts_pending')
		->where('user_contact_id', $user_id)
		->pluck('status');

		if($status == 1){
			return Response::json(
				array('error' => 'Friend request ('.$requester_id.') has been already declined')
				);
		}

		//If user has no pending request ignore declining
		$count = DB::table('user_contacts_pending')
		->where('user_contact_id', $user_id)
		->count();

		if($count == 0){
			return Response::json(
				array('error' => 'You do not have friend request from '.$requester_id.' to decline.')
				);
		}

		//Else we change the status of request to declined = 1		
		DB::table('user_contacts_pending')
		->where('user_contact_id', $user_id)
		->update(array('status' => 1));

		return Response::json(
			array('success' => 'Successfully declined '.$requester_id.'.')
			);
	}

	/*
	|POST /ignorerequest
	*/
	public function ignoreFriendRequest(){
		$requester_id = Input::get('contact_id');
		$user_id = Auth::user()->id;

		//If user has already declined request
		$status = DB::table('user_contacts_pending')
		->where('user_contact_id', $user_id)
		->pluck('status');

		if($status == 2){
			return Response::json(
				array('error' => 'Friend request ('.$requester_id.') has been already ignored')
				);
		}

		//If user has no pending request ignore ignoring
		$count = DB::table('user_contacts_pending')
		->where('user_contact_id', $user_id)
		->count();

		if($count == 0){
			return Response::json(
				array('error' => 'You do not have friend request from '.$requester_id.' to ignore.')
				);
		}

		//Else we change the status of request to ignored = 2		
		DB::table('user_contacts_pending')
		->where('user_contact_id', $user_id)
		->update(array('status' => 1));

		return Response::json(
			array('success' => 'Successfully ignored '.$requester_id.'.')
			);
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
	|GET /contacs
	*/
	public function showContacts(){
		//Get user contacts
		$contacts = DB::table('user_contacts')
		->join('users', 'users.id', '=', 'user_contacts.user_contact_id')
		->where('user_contacts.user_id', Auth::user()->id)
		->select('users.username', 'users.id')->get();
		
		//Get user pending requests
		$pendingRequests = DB::table('user_contacts_pending')
		->join('users', 'users.id', '=', 'user_contacts_pending.user_id')
		->where('user_contacts_pending.user_contact_id', Auth::user()->id)
		->select('users.username', 'users.id')->get();

		return View::make('contacts', array('contacts' => $contacts, 
			'pendingRequests' => $pendingRequests));
	}

	/*
	| GET /profile
	*/
	public function showProfile() {
		return View::make('profile');
	}

	/*
	| Get pending request count
	*/
	public static function getPendingRequestsCount(){
		return 	$contacts = DB::table('user_contacts_pending')
		->join('users', 'users.id', '=', 'user_contacts_pending.user_id')
		->where('user_contacts_pending.user_contact_id', Auth::user()->id)
		->select('users.username')->count();
	}

	/*
	| Get pending requests
	*/
	public static function getPendingRequests(){
		return 	$contacts = DB::table('user_contacts_pending')
		->join('users', 'users.id', '=', 'user_contacts_pending.user_id')
		->where('user_contacts_pending.user_contact_id', Auth::user()->id)
		->select('users.username', 'user.id')->get();
	}

}