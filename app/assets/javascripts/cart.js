$(function() {

	var cartTable = $("#cart-table");
	if(cartTable.length == 0){
		return false;
	}

	var inputElements = cartTable.find('input[data-price]');
	var priceElements = cartTable.find('.price-cell');
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

	var onInputFocusLost = function() {
		var newAmount = $(this).val();

		if (newAmount < 0) {
			newAmount = 0;
			$(this).val(0);
		}

		var priceForOne = $(this).attr('data-price');
		var inputIndex = inputElements.index($(this));
		var priceElement = priceElements.eq(inputIndex);

		priceElement.html((newAmount * priceForOne) + " Lt");
	};

	inputElements.focusout(onInputFocusLost);
})