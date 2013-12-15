$(function() {

	// Check if correct page
	var discountTable = $("#discount-table");
	if (discountTable.length === 0) {
		return false;
	}

	var discountTableRows = discountTable.find('tr.discount-item');
	var removeButtons = discountTable.find('.remove-button');


	var deleteRow = function() {
		if (!confirm("Ar jūs tikrai norite ištrinti?")) {
			return;
		}

		var row = discountTableRows.eq(removeButtons.index($(this)));
		var discount_id = Number($(this).attr('data-discount-id'));

		var url = BASE_URL + '/api/discount/remove/' + discount_id;
		$.post(url);

		row.remove();
	};

	removeButtons.click(deleteRow);

});