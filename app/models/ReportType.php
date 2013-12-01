<?php

class ReportType extends Eloquent{
	
	public function reports(){
		return $this->hasMany('Report');
	}
}