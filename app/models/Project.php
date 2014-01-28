<?php

class Project extends Eloquent {
	protected $guarded = array();
	protected $table = 'projects';


	public static $rules = array(
		'title' => 'required',
		'user_id' => 'required',
		'company_name' => 'required',
		);

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function energyTypes()
	{
		return $this->hasMany('EnergyType');
	}


	public function fillUpWithEnergyTypes()
	{
		//set the standard energy types to 0
		//and insert them into the table with this project as owner

		$energyTypes = array('Olja','Diesel','Träpellets','Flis','Gasol','Naturgas','El','Fjärrvärme'
			);

		foreach ($energyTypes as $value) {
			$newEnergyType = EnergyType::create(array('title' => $value, 'project_id' =>$this->id));
		}
	}
}
