// Chosen
$(function() {

	var discountForm = $("#discount-edit-form");
	if (discountForm.length === 0) {
		return false;
	}

	// Update info at db
	discountForm.submit(function (event) {
  		// Prevent default submitting
  		event.preventDefault();

		// Form values
		var discount_id = discountForm.find("#discount_id").val();
		var name = discountForm.find("#name").val();
		var type = discountForm.find("#type").val();
		var percentage = discountForm.find("#percentage").val();

		var data = {
			name: name,
			type: type,
			percentage: percentage
		};

		var url = BASE_URL + "/api/discount/update/" + discount_id;
		$.post(url, data, function (response) {
			alert(response);
		});
	});
});
