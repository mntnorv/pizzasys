$(function() {

	var editReportForm = $("#report-edit-form");
	if (editReportForm.length === 0 ) {
		return false;
	}

	var nameInput = editReportForm.find('#report_name');
	var typeInput = editReportForm.find('#type');
	var dateFromInput = editReportForm.find('#date_from');
	var dateToInput = editReportForm.find('#date_to');

	editReportForm.submit(function (event) {
		// Prevent default submitting
		event.preventDefault();

		var data = {
			name: nameInput.val(),
			type: typeInput.val(),
			date_from: dateFromInput.val(),
			date_to: dateToInput.val()
		};

		var reportId = editReportForm.attr('data-report-id');
		if (reportId) {
			var url = BASE_URL + '/api/report/update/' + reportId;
		} else {
			var url = BASE_URL + '/api/report/create';
		}



		$.post(url, data, function (response) {
			console.log(response);
			alert(response);
			if(response.success==='REPORT_CREATED'){
				window.location.href = BASE_URL + '/admin/reports';
			}
		}, 'json');
	});
	
});