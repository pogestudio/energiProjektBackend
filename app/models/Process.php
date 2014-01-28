<?php

class Process extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'title' => 'required',
		'power' => 'required|numeric',
		'quantity' => 'required|numeric',
		'uptime_per_week' => 'required|numeric',
		'area_id' => 'required|numeric',
		);
	protected $table = 'processes';

	public function processType()
	{
		$this->belongsTo('ProcessType', 'processtype_id');
	}

}
