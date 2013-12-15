$(function() {

	var editOrderForm = $("#order-edit-form");
	if (editOrderForm.length === 0 ) {
		return false;
	}

	var typeInput       = editOrderForm.find('#type');
	var pizzeriaInput   = editOrderForm.find('#pizzeria');
	var tableInput      = editOrderForm.find('#table');
	var cityInput       = editOrderForm.find('#city');
	var streetInput     = editOrderForm.find('#street');
	var buildingNoInput = editOrderForm.find('#building_no');
	var flatNoInput     = editOrderForm.find('#flat_no');
	var telNoInput      = editOrderForm.find('#tel_no');
	var doorCodeInput   = editOrderForm.find('#door_code');
	var commentInput    = editOrderForm.find('#comment');

	var tableInputGroup      = editOrderForm.find('#table-input-group');
	var streetInputGroup     = editOrderForm.find('#street-input-group');
	var buildingNoInputGroup = editOrderForm.find('#building-no-input-group');
	var flatNoInputGroup     = editOrderForm.find('#flat-no-input-group');
	var telNoInputGroup      = editOrderForm.find('#tel-no-input-group');
	var doorCodeInputGroup   = editOrderForm.find('#door-code-input-group');
	var commentInputGroup    = editOrderForm.find('#comment-input-group');

	var url = BASE_URL + "/api/get/pizzerias/27";

	var updateInputVisibility = function() {
		var type = typeInput.val();

		if (type === '1') {
			tableInputGroup.show();

			streetInputGroup.hide();
			buildingNoInputGroup.hide();
			flatNoInputGroup.hide();
			telNoInputGroup.hide();
			doorCodeInputGroup.hide();
			commentInputGroup.hide();
		} else {
			tableInputGroup.hide();

			streetInputGroup.show();
			buildingNoInputGroup.show();
			flatNoInputGroup.show();
			telNoInputGroup.show();
			doorCodeInputGroup.show();
			commentInputGroup.show();
		}
	};

	var updateTables = function() {
		var pizzeria_id = pizzeriaInput.val();
		var url = BASE_URL + '/api/get/tables/' + pizzeria_id;
		$.getJSON(url, function (data) {
			tableInput.html(JST['handlebars/option_list'](data));
		});
	};

	var updatePizzerias = function() {
		var city_id = cityInput.val();
		var url = BASE_URL + '/api/get/pizzerias/' + city_id;
		$.getJSON(url, function (data) {
			pizzeriaInput.html(JST['handlebars/option_list'](data));
			updateTables();
		});
	};

	var submitOrderForm = function() {
		event.preventDefault();

		var data = {
			type_id:     typeInput.val(),
			pizzeria_id: pizzeriaInput.val(),
			table_id:    tableInput.val(),
			city_id:     cityInput.val(),
			street:      streetInput.val(),
			building_no: buildingNoInput.val(),
			flat_no:     flatNoInput.val(),
			tel_no:      telNoInput.val(),
			door_code:   doorCodeInput.val(),
			comment:     commentInput.val(),
		};

		var orderId = editOrderForm.attr('data-order-id');
		var url = BASE_URL + "/api/order/update/" + orderId;

		$.post(url, data, function (response) {
			if(response.error) {
				alert('Klaida. Nepavyko atnaujinti užsakymo.');
			}
		}, 'json');
	};

	editOrderForm.submit(submitOrderForm);
	typeInput.change(updateInputVisibility);
	cityInput.change(updatePizzerias);
	pizzeriaInput.change(updateTables);

	updateInputVisibility();
	updatePizzerias();

});