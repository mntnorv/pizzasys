<?php

class DiscountController extends BaseController {

	/*
	| GET /admin/discounts
	*/

	public function showDiscountList() {
		$discounts = Discount::all();
		$discountTypes = DiscountType::all()->lists('id', 'name');

		return View::make('admin.discounts', array(
			"discounts" => $discounts,
			"discountTypes" => $discountTypes
		));
	}
}