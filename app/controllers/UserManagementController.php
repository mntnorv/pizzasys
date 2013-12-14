<?php

class UserManagementController extends BaseController {
	/*
	| GET /admin/users
	*/
	public function showUserManage() {
		$users = User::all();
		$userTypes = UserType::all()->lists('name', 'id');

		return View::make('admin.users', array("users" => $users, "userTypes" => $userTypes));
	}

	/*
	| POST /admin/users
	*/
	public function handleUserManage() {
		// Get all possible user types
		$typeKeys = UserType::all()->modelKeys();
		$userKeys = User::all()->modelKeys();

		// Check if type is correct
		if(!in_array($_POST['type_id'], $typeKeys)){
			$error['error'] = "Unknown user type";
			return json_encode($error);
		}

		// Check if user is correct
		if(!in_array($_POST['user_id'], $typeKeys)){
			$error['error'] = "Unknown user";
			return json_encode($error);
		}
	
		// Update user
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

				default:
				$error['error'] = "Unknown blocked value";
				return json_encode($error);
				break;
			}
			$changed = true;
		}

		// Check if details of user have changed
		if($changed){
			$user->save();
			$success['success'] = "Sėkmingai atnaujintas " .$user->username. " vartotojas";
			return json_encode($success);
		// Else avoid stressing database
		} else {
			$success['success'] = "Nieko nepakeista šiam" .$user->username. " vartotojui";
			return json_encode($success);
		}
	}
}
