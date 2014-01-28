<?php

class EnergyType extends Eloquent {
	protected $guarded = array();

public static $rules = array(
		'title' => 'required',
		'unit' => 'required',
		'quantity' => 'required|numeric',
		);
	protected $table = 'energyTypes';

	public function project()
	{
		$this->belongsTo('Project');
	}

	public static function createUpdatedEnergyType($title,$quantity,$unit,$project_id)
	{
		$valueArray = array(
					'title' => $title,
					'unit' => $unit,
					'quantity' => $quantity,
					'project_id' => $project_id
					);
		$newType = EnergyType::create($valueArray);
		Log::debug('new energytype is :::: ' . json_encode($newType));

	}
}
