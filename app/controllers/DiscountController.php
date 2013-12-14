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

	public function removeDiscount($id) {
		$discount = Discount::find($id);
		$discountTypes = DiscountType::all()->lists('name', 'id');

		return View::make('admin.edit_discount', array(
			"discount" => $discount,
			"discountTypes" => $discountTypes
		));
	}

	public function updateDiscount($id) {
		// Get all possible discount types
		$typeKeys = DiscountType::all()->modelKeys();

		// Update discount
		$changed = false;
		$discount = Discount::find($id);

		// Check if type is correct
		if(!in_array(Input::get('type'), $typeKeys)){
			return $this->jsonError('UNKNOWN_DISCOUNT_TYPE');
		} else {
			$discount->discount_type_id = Input::get('type');
		}

		if(Input::has('name')){
			$discount->name = Input::get('name');
			$changed = true;
		} else {
			return $this->jsonError('WRONG_DISCOUNT_NAMW');
		}

		if(Input::has('percentage') & -1 < Input::get('percentage') & Input::get('percentage') < 101 & is_numeric(Input::get('percentage'))){
			$discount->percentage = Input::get('percentage');
			$changed = true;
		} else {
			return $this->jsonError('WRONG_PERCENTAGE_FORMAT');
		}


		// Check if details of discount have changed
		if($changed){
			$date = new DateTime();
			$discount->updated_at = $date->getTimestamp();
			$discount->save();
			return $this->jsonSuccess('DISCOUNT_UPDATED');
		} else {
			return $this->jsonError('INVALID_DISCOUNT_DATA');
		}
	}
}
