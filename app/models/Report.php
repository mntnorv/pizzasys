<?php

class Report extends Eloquent{

	public function reportTypes(){
		return $this->belongsTo('ReportType');
	}
}