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

		$format = 'Y-m-d H:i:s';	
		$toDate = date($format, strtotime( $report->end ));
		$fromDate = date($format, strtotime( $report->start ));

		$reports = DB::table('users')
			->select(DB::raw('count(orders.id) as order_count'), 'users.username', 'users.pizzeria_id')
			->leftJoin('orders', 'users.id', '=', 'orders.user_id' )
			->where('users.user_type_id', '=', '2')
			->whereBetween('orders.updated_at', array($fromDate, $toDate))
			->groupBy('users.id')
			->get();
		$queries = DB::getQueryLog();
		$last_query = end($queries);

		return View::make('admin.show_report', array("reports" => $reports, "report" => $report));
	}
	
	
	public function showReportPDF($id) {

		// $report = Report::find($id);

		

		$pdf = PDF::loadView('admin.show_report', array());
		return $pdf->download('test.pdf');
	}
}
