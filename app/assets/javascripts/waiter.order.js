//Autocomplete
$( function(){
	var waiterOrderTable = $("#waiter-order-table");
	if (waiterOrderTable.length === 0) {
		return false;
	}

	var waiterOrderTableRows = null;
	var inputElements = null;
	var priceElements = null;
	var removeButtons = null;
	var fullPriceElem = null;

	//var cartSize      = $('#cart-size');

	var updateCachedSelectors = function() {
		fullPriceElem = waiterOrderTable.find('#full-price');
		waiterOrderTableRows = waiterOrderTable.find('.waiter-order-item');
		inputElements = waiterOrderTable.find('input.amount-input');
		priceElements = waiterOrderTable.find('.price');
		removeButtons = waiterOrderTable.find('.remove-button');
		removeButtons.click(deleteRow);
		inputElements.focusout(onInputFocusLost);
	};
	updateCachedSelectors();

	var updateItemPrice = function (elem) {
		var newAmount    = elem.val();
		var inputIndex   = inputElements.index(elem);
		var row          = waiterOrderTableRows.eq(inputIndex);
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

		priceElement.html(sprintf("%.2f", newAmount * priceForOne));
	};

	var updateFullPrice = function() {
		var fullPrice = 0;
		priceElements.each(function (index) {
			fullPrice += Number($(this).html());
		});
		fullPriceElem.html(sprintf("%.2f", fullPrice));
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
		var row = waiterOrderTableRows.eq(removeButtons.index($(this)));
		var foodId = Number(row.attr('data-food'));

		var url = BASE_URL + '/api/waiter/order/remove';
		$.post(url, {'food_id': foodId});

		row.remove();
		updateCachedSelectors();
		updateFullPrice();
		updateFullAmount();
	};

	$("#query").autocomplete({
		source: BASE_URL + "/api/get/food",
		minLength: 2,
		select: function( event, ui ) {
			var foodAmountID = -1;
			waiterOrderTableRows.each(function(i){
				if($(this).attr('data-food') == ui.item.id){
					foodAmountID = i;
					return;
				}
			});

			if(foodAmountID == -1){
				$("#waiter-order-table tbody").append(
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

	//Handle submit yourself
	var form = $("#waiter-order-form");
	form.submit(function(event){

		event.preventDefault();
		var waiterTableId = $(this).find('select[name="table"]').val();

		var url = BASE_URL + "/api/waiter/order/save"
		$.post(url, {
			'table' : waiterTableId
		}, function(data){
			if (data.success) {
				alert('Užsakymas sėkmingai išsaugotas');
			} else if (data.error) {
				alert('Klaida! Nepavyko išsaugoti užsakymo');
			}
		}, 'json');
	});
});
