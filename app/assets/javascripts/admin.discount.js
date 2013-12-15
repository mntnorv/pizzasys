// Chosen
$(function() {

	// Check if correct page
	var discountForm = $("#discount-edit-form");
	if (discountForm.length === 0) {
		return false;
	}

	var typeSelect = discountForm.find("#type");
	var typeToSelect = discountForm.find("#type_to");
	var typeToLabel = discountForm.find("#type_to_label");

	var updateTypeToSelect = function() {
		var type = typeSelect.val();
		var url = null;
		var template = null;
		var label = null;
		if (type === '1') {
        	url = BASE_URL + "/api/get/food";
        	template = 'handlebars/food_option_list';
        	label = "Maistas:";
		} else if (type === '2') {
			url = BASE_URL + "/api/get/foodtypes";
			template = 'handlebars/food_type_option_list';
			label = "Maisto tipas:";
		}

		if (type === '1' || type === '2') {
			$.getJSON(url, function (data) {
				discountForm.find("#type-to-form").show();
				typeToSelect.html(JST[template](data));
				typeToLabel.html(label);
				var selected = typeToSelect.attr('data-selected');
				console.log(selected);
				typeToSelect.val(selected);
			});
		} else if (type === '3') {
			discountForm.find("#type-to-form").hide();
		}
	};

	typeSelect.change(updateTypeToSelect);
	updateTypeToSelect();

	// Update info at db
	discountForm.submit(function (event) {
  		// Prevent default submitting
  		event.preventDefault();

		// Form values
		var discount_id = discountForm.find("#discount_id").val();
		var name = discountForm.find("#name").val();
		var type = discountForm.find("#type").val();
		var type_to = discountForm.find("#type_to").val();
		var percentage = discountForm.find("#percentage").val();

		var data = {
			name: name,
			type: type,
			type_to: type_to,
			percentage: percentage
		};

		var url = BASE_URL + "/api/discount/update/" + discount_id;
		$.post(url, data, function (response) {
			alert(response);
		});
	});



});
