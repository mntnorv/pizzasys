<?php

class WaiterController extends BaseController {

	/*
	| GET /waiter/order
	*/
	public function showOrder(){
		
		$order = Order::create(array(
				'order_type_id'  	     => 1,
				'order_state_id' 		 => 1,
				'price'          		 => 0,
				'order_payment_state_id' => 1
		));

		$waiterTables = User::find(Auth::user()->id)->waiterTables()->lists('table_id', 'table_id');

		Session::put('waiter_order_id', $order->id);

		return View::make('waiter.order', array('order' => $order, 'waiterTables' => $waiterTables));
	}

    /*
	| GET /waiter/order/manage
	*/
	public function showOrderManage(){
		$waiter  = User::find(Auth::user()->id);
		
		$waiterOrders = $waiter->orders()->where('table_id', '!=', 'NULL')->get();
		$waiterTables = $waiter->waiterTables()->join('tables', 'tables.id', '=', 'waiter_tables.table_id')->get()->lists('name', 'table_id');
		$firstTableOrders = $waiter->orders()->where('table_id', '=', array_keys($waiterTables)[0])->get();
		$firstTableOrdersList = $firstTableOrders->lists('updated_at', 'id');
		$firstTableFirstOrderPayStatus = $firstTableOrders->first()->order_payment_state_id;
		$orderStatusList = OrderPaymentState::all()->lists('name', 'id');

		return View::make('waiter.manage', array('waiterOrders' => $waiterOrders, 'waiterTables' => $waiterTables, 
			'firstPayState' => $firstTableFirstOrderPayStatus, 'firstTableOrdersList' => $firstTableOrdersList, 'orderStatusList' => $orderStatusList));
	}

	/*
	| POST /api/waiter/order/add
	*/
	public function addFood() {
		if (!Input::has('food_id')) {
			return $this->jsonError('INVALID_REQUEST');
		}

		$foodId = Input::get('food_id');

		$order = NULL;
		if (!Session::has('waiter_order_id')) {
			$order = Order::create(array(
				'order_type_id'  => 1,
				'order_state_id' => 1,
				'price'          => 0
			));
			Session::put('waiter_order_id', $order->id);
		} else {
			$order = Order::find(Session::get('waiter_order_id'));
		}

		$food = Food::find($foodId);
		if ($food === NULL) {
			return $this->jsonError('INVALID_FOOD_ID');
		}

		$orderFood = OrderFood::where('food_id', '=', $food->id)
			->where('order_id', '=', $order->id)->first();

		if ($orderFood !== NULL) {
			$orderFood->amount++;
		} else {
			$orderFood = new OrderFood();
			$orderFood->amount = 1;
			$orderFood->order()->associate($order);
			$orderFood->food()->associate($food);
		}

		$orderFood->save();
		$order->price += $food->price;
		$order->save();

		return $this->jsonSuccess('FOOD_ADDED');
	}

	/*
	| POST /api/waiter/order/remove
	*/
	public function removeFood() {
		if (!Input::has('food_id')) {
			return $this->jsonError('INVALID_REQUEST');
		}

		if (!Session::has('waiter_order_id')) {
			return $this->jsonError('CART_EMPTY');
		}

		$order = Order::find(Session::get('waiter_order_id'));
		$orderFood = OrderFood::where('order_id', '=', $order->id)
			->where('food_id', '=', Input::get('food_id'))->get()->first();

		if ($orderFood === NULL) {
			return $this->jsonError('INVALID_FOOD_ID');
		}

		$order->price -= $orderFood->food->price * $orderFood->amount;
		$order->save();
		$orderFood->delete();

		return $this->jsonSuccess('FOOD_REMOVED');
	}

	/*
	| POST /api/waiter/order/update
	*/
	public function updateFood() {
		if (!Input::has('food_id') || !Input::has('amount')) {
			return $this->jsonError('INVALID_REQUEST');
		}

		if (!Session::has('waiter_order_id')) {
			return $this->jsonError('CART_EMPTY');
		}

		$order = Order::find(Session::get('waiter_order_id'));
		$orderFood = OrderFood::where('order_id', '=', $order->id)
			->where('food_id', '=', Input::get('food_id'))->get()->first();

		if ($orderFood === NULL) {
			return $this->jsonError('INVALID_FOOD_ID');
		}

		$newAmount = Input::get('amount');
		if ($newAmount < 0 || $newAmount > 1000) {
			return $this->jsonError('INVALID_AMOUNT');
		}

		$amountDiff = $newAmount - $orderFood->amount;
		$orderFood->amount = $newAmount;
		$orderFood->save();

		$order->price += $amountDiff * $orderFood->food->price;
		$order->save();

		return $this->jsonSuccess('FOOD_UPDATED');
	}

	/*
	| POST /api/waiter/order/save
	*/
	public function saveOrder(){
		if (!Session::has('waiter_order_id')) {
			return $this->jsonError('CART_EMPTY');
		}

		if(!Input::has('table')){
			return $this->jsonError('INVALID_TABLE');
		}

		$order = Order::find(Session::get('waiter_order_id'));

		if($order->orderFood()->count() === 0){
			return $this->jsonError('ORDER_HAS_NO_FOOD');
		}

		$order->table_id = Input::get('table');
		$order->user_id = Auth::user()->id;
		$order->pizzeria_id = Auth::user()->pizzeria_id;	
		$order->save();

		return $this->jsonSuccess('ORDER_SAVED');
	}

}