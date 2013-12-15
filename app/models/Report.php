<?php

class Report extends Eloquent{

	public function reportType(){
		return $this->belongsTo('ReportType');
	}
}