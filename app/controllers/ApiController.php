<?php

class ApiController extends BaseController {

	/*
	| GET /user/{id}
	*/
	public function getUser($id){
		
		$user = User::find($id);

		if($user == NULL){
			$error['error'] = "User not found";
			return json_encode($error);
		}

		return $user;
	}


}