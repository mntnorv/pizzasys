<?php

class ReportsController extends BaseController {
	/*
	| GET /admin/reports_list
	*/

	public function showReportList() {
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

	
}
