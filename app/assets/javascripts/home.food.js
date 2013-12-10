$(function() {

	//Thanks Master but I don't need your food in my SandBox
	var foodList = $("#home-food-list");
	if(foodList.length == 0){
		return false;
	}

	var addToCart = function() {
		var url = "api/cart/food";
		var foodId = $(this).attr('data-food');

		$.post(url, {'food_id': foodId})
			.done(function (data) {
				console.log(data);
			})
		;
	};

	var updateFoodItems = function(foodList, foodType) {
		var url = "api/get/food";
		if (foodType) {
			url += "/" + foodType;
		}

		$.getJSON(url, function (data) {
			if (!data.error) {
				foodList.html(
					JST['handlebars/food_list'](data)
				);
				$('.food-item[data-food]').click(addToCart);
			} else {
				foodList.html('');
				console.error('Error retrieving food: ' + data.error);
			}
		});
	};

	window.onhashchange = function() {
		var foodType = window.location.hash.slice(1);
		updateFoodItems(foodList, foodType);
	};

	window.onhashchange();
})