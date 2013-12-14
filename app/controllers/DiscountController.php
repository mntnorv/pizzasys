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

	public function editDiscount($id) {
		$discount = Discount::find($id);
		$discountTypes = DiscountType::all()->lists('name', 'id');

		return View::make('admin.edit_discount', array(
			"discount" => $discount,
			"discountTypes" => $discountTypes
		));
	}

}