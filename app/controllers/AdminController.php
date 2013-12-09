<?php

class AdminController extends BaseController {

	/*
	| GET /users
	*/
	public function showUserManage(){
		$users = User::all();
		$userTypes = UserType::all()->lists('name', 'id');

		return View::make('manage', array("users" => $users, "userTypes" => $userTypes));
	}

	/*
	| POST /users
	*/
	public function handleUserManage(){
		//Get all possible user types
		$typeKeys = UserType::all()->modelKeys();
		$userKeys = User::all()->modelKeys();

		//Check if type is correct
		if(!in_array($_POST['type_id'], $typeKeys)){
			return json_encode($error['error'] = "Unknown user type");
		}

		//Check if user is correct
		if(!in_array($_POST['user_id'], $typeKeys)){
			return json_encode($error['error'] = "Unknown user");
		}
	
		//Update user
		$changed = false;
		$user = User::find($_POST['user_id']);

		if($user->user_type_id != $_POST['type_id']){
			$user->user_type_id = $_POST['type_id'];
			$changed = true;
		}

		if(!empty($_POST['password'])){
			$user->password = Hash::make($_POST['password']);
			$changed = true;
		}

		if(!($_POST['blocked'] == "true" && $user->blocked == 1) && !($_POST['blocked'] == "false" && $user->blocked == 0)){
			switch($_POST['blocked']){
				case "true":
				$user->blocked = 1;
				break;
				case "false":
				$user->blocked = 0;
				break;
			}
			$changed = true;
		}

		//Check if details of user have changed
		if($changed){
			$user->save();
			return json_encode($success['success'] = "Successfully updated " .$user->username);
		//Else ignore stressing database
		}else{
			return json_encode($success['success'] = "Nothing changed for " .$user->username);
		}
	}


}