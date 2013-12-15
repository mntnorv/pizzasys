$(function() {

	// Check if correct page
	var reportTable = $("#reports-list-form");
	if (reportTable.length === 0) {
		return;
	}

	var reportTableRows = reportTable.find('tr.report-item');
	var removeButtons = reportTable.find('.remove-button');


	var deleteRow = function() {
		if (!confirm("Ar jūs tikrai norite ištrinti?")) {
			return;
		}

		var row = reportTableRows.eq(removeButtons.index($(this)));
		var report_id = Number($(this).attr('data-report-id'));

		var url = BASE_URL + '/api/report/remove/' + report_id;
		$.post(url);

		row.remove();
	};

	removeButtons.click(deleteRow);

});