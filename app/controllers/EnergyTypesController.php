<?php

class EnergyTypesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($projectId)
	{
		if (!Auth::check() || Project::find($projectId)->user_id != Auth::user()->id) {
			return Response::json(null,401);
		}
		$sql = 'SELECT * FROM energyTypes WHERE id = (SELECT id FROM energyTypes as tempTable WHERE tempTable.title = energyTypes.title AND project_id = ' . $projectId . ' ORDER BY created_at DESC LIMIT 0,1)';
		$energyTypes = DB::select($sql);
		Log::debug('energy types query:: ' . $sql);
		return Response::json($energyTypes,200);
	}

	/**
	 * Stores a lot of energy types, but only if they have been updated!
	 *
	 * @return Response
	 */
	public function storeMany()
	{
		//Log::debug('projectId::: ' . $projectId);
		$project_id = Input::get('project_id');
		if (!Auth::check() || Project::find($project_id)->user_id != Auth::user()->id) {
			return Response::json(null,401);
		}

		$allEnergyTypes = Input::get('data');
		foreach ($allEnergyTypes as $value) {
			$title = $value['title'];
			$quantity = $value['quantity'];
			$unit = $value['unit'];

			$latestType = DB::table('energyTypes')->where('title',$title)->orderBy('created_at','desc')->limit(0,1)->get();
			//Log::debug('latest types::: ' . json_encode($latestType));
			if (count($latestType) == 0
				|| $latestType[0]->quantity != $quantity
				|| $latestType[0]->unit != $unit) 
			{
				EnergyType::createUpdatedEnergyType($title, $quantity, $unit, $project_id);
			}
		}

		//Log::debug('Received Data for project: ' . Input::get('project_id') .  '   in store many ! :: ' . json_encode(Input::get('data')));
		//$sql = 'SELECT * FROM energyTypes WHERE id = (SELECT id FROM energyTypes as tempTable WHERE tempTable.title = energyTypes.title AND project_id = ' . $projectId . ' ORDER BY created_at DESC LIMIT 0,1)';
		//$energyTypes = DB::select($sql);
		//Log::debug('energy types query:: ' . $sql);
		return Response::json(null,200);
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('energytypes.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return View::make('energytypes.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('energytypes.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
