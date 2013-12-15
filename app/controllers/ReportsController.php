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

		// $report = Report::find($id);
		$format = 'Y-m-d H:i:s';
		$now = time();
		$notNow = strtotime( '-12 month', $now );
		$nowDate = date($format, $now);
		$notNowDate = date($format, $notNow);

		$report = DB::table('users')
					->select(DB::raw('count(orders.id) as order_count'))
					->leftJoin('orders', 'users.id', '=', 'orders.user_id' )
					->where('users.user_type_id', '=', '2')
					//->where(DB::raw("(orders.updated_at BETWEEN '$notNowDate' AND '$nowDate')"))
					->whereBetween('orders.updated_at', array($notNowDate, $nowDate))
					->groupBy('users.id')
					->get();

		$report2 = DB::table('pizzerias')
					->select(DB::raw('count(orders.id) as order_count'))
					->leftJoin('orders', function($join) use ($notNowDate, $nowDate){
								$join->on('orders.pizzeria_id', '=', 'pizzerias.id');
								$join->on('orders.updated_at', '>=', DB::raw('".mysql_real_escape_string($notNowDate)."'));
								$join->on('orders.updated_at', '<=', DB::raw('".mysql_real_escape_string($nowDate)."'));
							})
					//->where(DB::raw("(orders.updated_at BETWEEN '$notNowDate' AND '$nowDate')"))
					//->whereBetween('orders.updated_at', array($notNowDate, $nowDate))
					->groupBy('pizzerias.id')
					->get();
		$queries = DB::getQueryLog();
		$last_query = end($queries);
		var_dump($report2, $last_query);

		exit();



		return View::make('admin.show_report', array("report" => $report));
	}
	
}
