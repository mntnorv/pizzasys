<?php

class Report extends Eloquent{

	public function type(){
		return $this->belongsTo('ReportType');
	}
}