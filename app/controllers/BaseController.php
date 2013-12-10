<?php

class BaseController extends Controller {

	public function BaseController() {
		View::share('cartSize', $this->getCartSize());
	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout() {
		if ( ! is_null($this->layout)) {
			$this->layout = View::make($this->layout);
		}
	}

	/**
	 * Get the current cart size
	 *
	 * @return integer containing the current cart size
	 */
	protected function getCartSize() {
		if (Session::has('cart_order_id')) {
			$cartOrderId = Session::get('cart_order_id');
			$count = OrderFood::where('order_id', '=', $cartOrderId)->count();
			return $count;
		} else {
			return 0;
		}
	}

	/**
	 * Return a JSON success with the specified message
	 * Example: {"success":"message"}
	 * 
	 * @param $message - a string with the message to return
	 * @return the JSON response
	 */
	protected function jsonSuccess($message) {
		$error['success'] = $message;
		return json_encode($error);
	}

	/**
	 * Return a JSON error with the specified message
	 * Example: {"error":"message"}
	 * 
	 * @param $message - a string with the message to return
	 * @return the JSON response
	 */
	protected function jsonError($message) {
		$error['error'] = $message;
		return json_encode($error);
	}

}