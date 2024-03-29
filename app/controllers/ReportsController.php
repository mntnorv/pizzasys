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

		$button = 'Atnaujinti';
		$report = Report::find($id);
		$report_types = ReportType::all()->lists('name', 'id');

		return View::make('admin.edit_report', array("report_types" => $report_types, "report" => $report, 'button' => $button));
	}

	/*
	| GET /admin/report/crete
	*/

	public function showReportCreate() {

		$button = 'Sukurti';
		$report = new Report();
		$report_types = ReportType::all()->lists('name', 'id');

		return View::make('admin.create_report', array("report_types" => $report_types, "report" => $report, 'button' => $button));
	}

	/*
	| 
	*/

	public function updateReport($id) {

		$data_for_test = array(
			'name' => Input::get('name'),
			'type' => Input::get('type'),
			'date_from' => Input::get('date_from'),
			'date_to' => Input::get('date_to')
		);

		$rules = array(			
			'name' => 'Required',
			'type' => 'Required',
			'date_from' => 'Required|Between:8,10|Date',
			'date_to' =>'Required|Between:8,10|Date'
		);

		$validator = Validator::make($data_for_test, $rules);	

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

		$data_for_test = array(
			'name' => Input::get('name'),
			'type' => Input::get('type'),
			'date_from' => Input::get('date_from'),
			'date_to' => Input::get('date_to')
		);

		$rules = array(			
			'name' => 'Required',
			'type' => 'Required',
			'date_from' => 'Required|Between:8,10|Date',
			'date_to' =>'Required|Between:8,10|Date'
		);

		$validator = Validator::make($data_for_test, $rules);	

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

	/*
	| POST /api/report/remove/{id}
	*/
	public function removeReport($id) {

		$report = Report::find($id);
		$report->delete();

		return $this->jsonSuccess('DISCOUNT_REMOVED');
	}

	/*
	| POST /api/report/remove/{id}
	*/
	public function showReport($id) {
		$report = Report::find($id);

		if ($report->report_type_id === 1) {
			return View::make('admin.reports.waiter_report', array(
				'reportLines' => $this->calculateWaiterReport($report),
				'report' => $report
			));
		} else if ($report->report_type_id === 2) {
			return View::make('admin.reports.order_report', array(
				'reportLines' => $this->calculateOrderReport($report),
				'report' => $report
			));
		}

		return true;
	}
	
	
	public function showReportPDF($id) {
		$pdf = null;
		$report = Report::find($id);

		if ($report->report_type_id === 1) {
			$pdf = PDF::loadView('admin.reports.waiter_report', array(
				'reportLines' => $this->calculateWaiterReport($report),
				'report' => $report
			));
		} else if ($report->report_type_id === 2) {
			$pdf = PDF::loadView('admin.reports.order_report', array(
				'reportLines' => $this->calculateOrderReport($report),
				'report' => $report
			));
		}

		return $pdf->download('ataskaita.pdf');
	}

	private function calculateWaiterReport($report) {
		$format = 'Y-m-d H:i:s';	
		$toDate = date($format, strtotime($report->end));
		$fromDate = date($format, strtotime($report->start));

		$orders = DB::raw('(SELECT * FROM `orders` WHERE `updated_at` BETWEEN \''
			. $fromDate .
			'\' AND \''
			. $toDate .
			'\') AS filteredorders'
		);

		$reportLines = DB::table('users')
			->select(DB::raw('count(filteredorders.id) as order_count'), 'users.username', 'users.pizzeria_id')
			->leftJoin($orders, 'users.id', '=', 'filteredorders.user_id')
			->where('users.user_type_id', '=', '2')
			->groupBy('users.id')
			->get();

		return $reportLines;
	}

	private function calculateOrderReport($report) {
		$format = 'Y-m-d H:i:s';	
		$toDate = date($format, strtotime($report->end));
		$fromDate = date($format, strtotime($report->start));

		$orders = DB::raw('(SELECT * FROM `orders` WHERE `updated_at` BETWEEN \''
			. $fromDate .
			'\' AND \''
			. $toDate .
			'\') AS filteredorders'
		);

		$reportLines = DB::table('pizzerias')
			->select(DB::raw('count(filteredorders.id) as order_count'), DB::raw('sum(filteredorders.price) as income'), 'pizzerias.name AS pizzeria_name')
			->leftJoin($orders, 'pizzerias.id', '=', 'filteredorders.pizzeria_id')
			->groupBy('pizzerias.id')
			->get();

		return $reportLines;
	}
}
