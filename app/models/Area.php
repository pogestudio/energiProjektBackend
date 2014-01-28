<?php

class Area extends Eloquent {
	protected $guarded = array();

	protected $table = 'areas';

	public static $rules = array(
		'title' => 'required',
		'isBuilding' => 'required',
		'project_id' => 'required|numeric',
		);

	public function ownerRoom()
	{
		$this->belongsTo('Area', 'owner_building_id');
	}

}
