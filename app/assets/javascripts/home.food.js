$(function() {
	var foodList = $("#home-food-list");
	if (foodList) {
		$.get("api/get/food", function (data) {
			console.log(data);
			console.log(JST);
			foodList.html(
				JST['handlebars/food_list'](data)
			);
		});
	}
})