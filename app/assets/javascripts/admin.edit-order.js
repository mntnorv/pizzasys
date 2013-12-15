$(function() {

	var editOrderForm = $("#order-edit-form");
	if (editOrderForm.length === 0 ) {
		return false;
	}

	console.log('edit order form');

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

	var updateInputVisibility = function() {
		var type = $(this).val();
		console.log(type);
	};

	typeInput.change(updateInputVisibility);

});