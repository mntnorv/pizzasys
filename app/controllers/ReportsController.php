<?php

class ReportsController extends BaseController {
	/*
	| GET /admin/reports_list
	*/

	public function showReports() {
		$reports = Report::all();

		return View::make('admin.report_list', array("reports" => $reports));
	}

	/*
	| GET /admin/report/{id}
	*/

	public function showReportEdit($id) {

		$report = Report::find($id);
		$report_types = ReportType::all()->lists('name', 'id');

		return View::make('admin.reports', array("report_types" => $report_types, "report" => $report));
	}

	/*
	| 
	*/

	public function updateReport($id) {

		$date_for_test = array(
			'name' => Input::get('name'),
			'type' => Input::get('type'),
			'date_from' => Input::get('date_from'),
			'date_to' => Input::get('date_to')
		);

		$rules = array(			
			'name' => 'Required',
			'type' => 'Required',
			'date_from' => 'Required',
			'date_to' =>'Required'
		);

		$validator = Validator::make($date_for_test, $rules);	

		if ($validator->passes()) {

			$report = Report::find($id);
			$report->name = Input::get('name');
			$report->report_type_id = Input::get('type');
			$report->start = Input::get('date_from');
			$report->end = Input::get('date_to');
			$report->save();

			return $this->jsonSuccess('REPORT_UPDATED');
		} else { 
			return $this->jsonError('INVALID_DATA');
		}		
	}

	
}
