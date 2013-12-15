//Autocomplete
$( function(){
	var waiterOrderManageTable = $("#waiter-order-manage-table");
	if (waiterOrderManageTable.length === 0) {
		return false;
	}

	var orderSelectElem = $("#orders");
	var tableSelectElem = $('#table');
	var	waiterOrderManageTableBody = waiterOrderManageTable.find('tbody');
	var waiterOrderManageTableRows = null;
	var inputElements   = null;
	var priceElements   = null;
	var removeButtons   = null;
	var fullPriceElem   = null;

	var loadOrderFood = function(select) {
		waiterOrderManageTableBody.empty();
		var order_id = select.val();
		console.log(order_id);
		var url = BASE_URL + '/api/waiter/order/' + order_id + '/food'
		$.get(url, function(orderFood){
			var json;
			var hasErrors = true;
			try {
				json = $.parseJSON(orderFood);
			} catch (e) {
				hasErrors = false;
			}

			if(hasErrors === false){
				for(var i = 0; i < orderFood.length; i++) {
					waiterOrderManageTableBody.append(
						JST['handlebars/waiter_food_list'](orderFood[i])
					);
				}
			}
		})
	};

	var loadTableOrders = function(select) {
		var table_id = select.val();
		var url = BASE_URL + '/api/waiter/orders/' + table_id;
		$.getJSON(url, function (response) {
			orderSelectElem.html(
				JST['handlebars/waiter_order_list'](response)
			);
			loadOrderFood(orderSelectElem);
		});
	};

	loadOrderFood(orderSelectElem);

	var onOrderSelectChange = function() {
		loadOrderFood($(this));
	};

	var onTableSelectChange = function() {
		loadTableOrders($(this));
	};

	orderSelectElem.change(onOrderSelectChange);
	tableSelectElem.change(onTableSelectChange);

	//var cartSize      = $('#cart-size');

	var updateCachedSelectors = function() {
		fullPriceElem = waiterOrderManageTable.find('#full-price');
		waiterOrderManageTableRows = waiterOrderManageTable.find('.waiter-order-item');
		inputElements = waiterOrderManageTable.find('input.amount-input');
		priceElements = waiterOrderManageTable.find('.price');
		removeButtons = waiterOrderManageTable.find('.remove-button');

		removeButtons.click(deleteRow);
		inputElements.focusout(onInputFocusLost);
	};
	updateCachedSelectors();

	var updateItemPrice = function (elem) {
		var newAmount    = elem.val();
		var inputIndex   = inputElements.index(elem);
		var row          = waiterOrderManageTableRows.eq(inputIndex);
		var priceForOne  = row.attr('data-price');
		var foodId       = row.attr('data-food');
		var priceElement = priceElements.eq(inputIndex);

		if (!parseInt(newAmount) || newAmount < 0) {
			newAmount = 0;
			elem.val(0);
		}

		if (newAmount > 1000) {
			newAmount = 1000;
			elem.val(1000);
		}

		var url = BASE_URL + '/api/waiter/order/update';
		$.post(url, {
			'food_id': foodId,
			'amount': newAmount
		});

		priceElement.html(newAmount * priceForOne);
	};

	var updateFullPrice = function() {
		var fullPrice = 0;
		priceElements.each(function (index) {
			fullPrice += Number($(this).html());
		});
		fullPriceElem.html(fullPrice);
	};

	var updateFullAmount = function() {
		var fullAmount = 0;
		inputElements.each(function (index) {
			fullAmount += Number($(this).val());
		});
		//cartSize.html(fullAmount);
	};

	var onInputFocusLost = function() {
		updateItemPrice($(this));
		updateFullPrice();
		updateFullAmount();
	};

	var deleteRow = function() {
		var row = waiterOrderManageTableRows.eq(removeButtons.index($(this)));
		var foodId = Number(row.attr('data-food'));

		var url = BASE_URL + '/api/waiter/order/remove';
		$.post(url, {'food_id': foodId});

		row.remove();
		updateCachedSelectors();
		updateFullPrice();
		updateFullAmount();
	};


	$( "#query" ).autocomplete({
		source: BASE_URL + "/api/get/food",
		minLength: 2,
		select: function (event, ui) {
			var foodAmountID = -1;
			waiterOrderManageTableRows.each(function(i){
				if($(this).attr('data-food') == ui.item.id){
					foodAmountID = i;
					return;
				}
			});

			if(foodAmountID == -1){
				$("#waiter-order-manage-table tbody").append(
					JST['handlebars/waiter_food_list'](ui.item)
				);

				//Add food to the cart
				var url = BASE_URL + '/api/waiter/order/add';
				$.post(url, {
					'food_id': ui.item.id,
				});
			} else {
				var foodInputField = inputElements.eq(foodAmountID);
				var foodAmount = foodInputField.val();

				foodAmount++;
				foodInputField.val('' +foodAmount);

				//Update food amount
				var url = BASE_URL + '/api/waiter/order/update';
				$.post(url, {
					'food_id': ui.item.id,
					'amount' : foodAmountID
				});
			}

			updateCachedSelectors();
			updateFullPrice();
			removeButtons.unbind("click");
			removeButtons.click(deleteRow);
		}
	});

	/*// Handle submit yourself
	var form = $("#waiter-order-manage-form");
	form.submit(function(event) {
		event.preventDefault();
		var waiterTableId = $(this).find('select[name="table"]').val();

		var url = BASE_URL + "/api/waiter/order/save"
		$.post(url, {
			'table' : waiterTableId
		}, function (data) {
			alert(data);
		});
	});*/
});
