<?php

class AdminController extends BaseController {

	/*
	| GET /manage
	*/
	public function showUserManage(){
		$users = User::all();
		$userTypes = UserType::all()->lists('name', 'id');

		return View::make('manage', array("users" => $users, "userTypes" => $userTypes));
	}


}