$(function() {

	var foodList = $("#home-food-list");
	if(foodList.length == 0){
		return false;
	}

	var cartSize = $("#cart-size");

	var changeAmount = function() {
		var foodId = $(this).attr('data-food');
		

		$.post(url, {'food_id': foodId}, function (data) {
			if (data.success) {
				var size = cartSize.html();
				size++;
				cartSize.html(size);
			}
		}, 'json');
	};

	window.onhashchange = function() {
		var foodType = window.location.hash.slice(1);
		updateFoodItems(foodList, foodType);
	};

	window.onhashchange();
})