<?php

class AdminController extends BaseController {

	/*
	| GET /admin
	*/
	function showIndex() {
		return View::make('admin.index');
	}

}