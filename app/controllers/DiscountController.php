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

	/*
	| GET /admin/discount/{id}
	*/
	public function showEditDiscount($id) {

		$discount = Discount::find($id);
		$discountTypes = DiscountType::all()->lists('name', 'id');
		$food = Food::all()->lists('name', 'id');
		$discountTo = NULL;

		if ($discount->discount_type_id == 1) {
			$discountTo = $discount->food_id;
		} else if  ($discount->discount_type_id == 2) {
			$discountTo = $discount->food_type_id;
		}

		return View::make('admin.edit_discount', array(
			"discount" => $discount,
			"discountTypes" => $discountTypes,
			"discountTo" => $discountTo,
		));
	}

	/*
	| POST /api/discount/remove/{id}
	*/
	public function removeDiscount($id) {
		$discount = Discount::find($id);
		$discountTypes = DiscountType::all()->lists('name', 'id');

		return View::make('admin.edit_discount', array(
			"discount" => $discount,
			"discountTypes" => $discountTypes,
		));
	}

	/*
	| POST /api/discount/update/{id}
	*/
	public function updateDiscount($id) {
		// Get all possible discount types
		$typeKeys = DiscountType::all()->modelKeys();
		$foodKeys = Food::all()->modelKeys();
		$foodTypeKeys = FoodType::all()->modelKeys();

		// Update discount
		$changed = false;
		$discount = Discount::find($id);

		if(Input::has('name')){
			$discount->name = Input::get('name');
			$changed = true;
		} else {
			return $this->jsonError('WRONG_DISCOUNT_NAMW');
		}

		// Check if type is correct
		if(!in_array(Input::get('type'), $typeKeys)){
			return $this->jsonError('UNKNOWN_DISCOUNT_TYPE');
		} else {
			$discount->discount_type_id = Input::get('type');
		}

		// Update food_id or food_type_id
		if (Input::get('type') == 1) {
			// Check if food is correct
			if(!in_array(Input::get('type_to'), $foodKeys)){
				return $this->jsonError('UNKNOWN_FOOD');
			} else {
				$discount->food_id = Input::get('type_to');
				$discount->food_type_id = NULL;
				$discount->order_id = NULL;
			}
		} else if (Input::get('type') == 2) {
			// Check if food type is correct
			if(!in_array(Input::get('type_to'), $foodTypeKeys)){
				return $this->jsonError('UNKNOWN_FOOD_TYPE');
			} else {
				$discount->food_id = NULL;
				$discount->food_type_id = Input::get('type_to');
				$discount->order_id = NULL;
			}
		}

		// Check if type is correct
		if(!in_array(Input::get('type'), $typeKeys)){
			return $this->jsonError('UNKNOWN_DISCOUNT_TYPE');
		} else {
			$discount->discount_type_id = Input::get('type');
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
