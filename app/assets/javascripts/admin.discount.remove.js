$(function() {

	// Check if correct page
	var discountTable = $("#discount-table");
	if (discountTable.length === 0) {
		return false;
	}

	var discountTableRows = discountTable.find('#tr');
	var removeButtons = null;


	var deleteRow = function() {
		var row = discountTableRows.eq(removeButtons.index($(this)));
		var discount_id = Number(row.attr('data-discount-id'));

		var url = BASE_URL + '/api/discount/remove' + discount_id;
		$.post(url, {'discount_id': discount_id});

		row.remove();
	};


	removeButtons.click(deleteRow);

});