$(function() {
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
			} else {
				foodList.html('');
				console.error('Error retrieving food: ' + data.error);
			}
		});
	};

	var foodList = $("#home-food-list");
	if (foodList) {
		window.onhashchange = function() {
			var foodType = window.location.hash.slice(1);
			updateFoodItems(foodList, foodType);
		};

		window.onhashchange();
	}
})