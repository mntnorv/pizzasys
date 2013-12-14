$(function() {

	var cartTable   = $("#cart-table");
	var waiterTable = $("#waiter-order-table");
	if (cartTable.length === 0 ) {
		return false;
	}

	var cartTableRows = null;
	var inputElements = null;
	var priceElements = null;
	var removeButtons = null;

	var fullPriceElem = cartTable.find('#full-price');
	var cartSize      = $('#cart-size');

	var updateCachedSelectors = function() {
		cartTableRows = cartTable.find('.cart-item');
		inputElements = cartTable.find('input.amount-input');
		priceElements = cartTable.find('.price');
		removeButtons = cartTable.find('.remove-button');
	};
	updateCachedSelectors();

	var updateItemPrice = function (elem) {
		var newAmount    = elem.val();
		var inputIndex   = inputElements.index(elem);
		var row          = cartTableRows.eq(inputIndex);
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

		var url = BASE_URL + '/api/cart/update';
		$.post(url, {
			'food_id': ASD,
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
		cartSize.html(fullAmount);
	};

	var onInputFocusLost = function() {
		updateItemPrice($(this));
		updateFullPrice();
		updateFullAmount();
	};

	var deleteRow = function() {
		var row = cartTableRows.eq(removeButtons.index($(this)));
		var ASD = Number(row.attr('data-food'));

		var url = BASE_URL + '/api/cart/remove';
		$.post(url, {'food_id': foodId});

		row.remove();
		updateCachedSelectors();
		updateFullPrice();
		updateFullAmount();
	};

	inputElements.focusout(onInputFocusLost);
	removeButtons.click(deleteRow);
});