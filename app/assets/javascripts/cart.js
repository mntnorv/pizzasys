$(function() {

	var cartTable = $("#cart-table");
	if (cartTable.length === 0) {
		return false;
	}

	var inputElements = cartTable.find('input[data-price]');
	var priceElements = cartTable.find('.price');
	var fullPriceElem = cartTable.find('#full-price');
	var cartSize = $('#cart-size');

	/*var changeAmount = function() {
		var foodId = $(this).attr('data-food');
		var postData = {
			food_id: foodId,
			amount: amount
		};

		$.post(url, postData, function (data) {
			if (data.success) {
				var size = cartSize.html();
				size++;
				cartSize.html(size);
			}
		}, 'json');
	};*/

	var updateItemPrice = function (elem) {
		var newAmount = elem.val();

		if (!parseInt(newAmount) || newAmount < 0) {
			newAmount = 0;
			elem.val(0);
		}

		if (newAmount > 1000) {
			newAmount = 1000;
			elem.val(1000);
		}

		var priceForOne = elem.attr('data-price');
		var inputIndex = inputElements.index(elem);
		var priceElement = priceElements.eq(inputIndex);

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

	inputElements.focusout(onInputFocusLost);
});