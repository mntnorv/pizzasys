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

		return View::make('admin.edit_report', array("report_types" => $report_types, "report" => $report));
	}

	/*
	| GET /admin/report/crete
	*/

	public function showReportCreate() {

		$report = new Report();
		// $report->name = "Nauja ataskaita";
		// $report->report_type_id = 1;
		// $report->start = "2013-12-01";
		// $report->end = "2013-12-30";

		$report_types = ReportType::all()->lists('name', 'id');

		return View::make('admin.create_report', array("report_types" => $report_types, "report" => $report));
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


	public function createReport() {

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

			$report = new Report();
			$report->name = Input::get('name');
			$report->report_type_id = Input::get('type');
			$report->start = Input::get('date_from');
			$report->end = Input::get('date_to');
			$report->save();

			return $this->jsonSuccess('REPORT_CREATED');
		} else { 
			return $this->jsonError('INVALID_DATA');
		}		
	}

	
}
