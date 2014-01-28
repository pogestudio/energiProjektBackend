<?php

class ProcessesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$project_id = Input::get('project_id');
		if (!Auth::check() || Project::find($project_id)->user_id != Auth::user()->id) {
			return Response::json(null,401);
		}

		$wantedProcess = Input::get('wanted_process');
		$processes = DB::table('processes')
		->join('processTypes', 'processes.processtype_id','=','processTypes.id')
		->join('areas', 'processes.area_id','=','areas.id')
		->where('areas.project_id',$project_id)
		->where('processTypes.type',$wantedProcess)
		->select('processes.id','processes.title','processes.processType_id','processes.uptime_per_week','quantity','power','name','processTypes.type','processTypes.name','areas.title AS buildingTitle','areas.isBuilding','areas.owner_building_id','project_id','areas.description')
		->get();

		return Response::json($processes, 200);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('processes.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Log::debug('Innuti  process store!');

		if(!Auth::check())
		{
			return Response::json(null, 401);
		}

		$area = Area::find(Input::get('area_id'));
		$project_id = $area->project_id;
		if (!Auth::check() || Project::find($project_id)->user_id != Auth::user()->id) {
			return Response::json(null,401);
		}
		
		$inputArray = array (
			'title' => Input::get('title'),
			'uptime_per_week' => Input::get('uptime_per_week'),
			'processtype_id' => Input::get('processtype_id'),
			'area_id' => Input::get('area_id'),
			'power' => Input::get('power'),
			'quantity' => Input::get('quantity')
			);


		Log::debug('inputarray: ' . json_encode($inputArray));

		$validator = Validator::make($inputArray, Process::$rules);

		$wronglyFormattedParametersCode = 400;
		$successCode = 200;
		$statusCode = $wronglyFormattedParametersCode;


		$process = null;
        // Check if the form validates with success.
		if ($validator->passes())
		{
			Log::debug('validation passed');
			$statusCode = $successCode;
			$process = Process::create($inputArray);
		} else
		{
			Log::debug('validation passed NOTNOTNOT');
			$statusCode = $wronglyFormattedParametersCode;
		}

		return Response::json($process, $statusCode);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return View::make('processes.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('processes.edit');
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
		Log::info('inside process delete thingy');

		$processToDelete = Process::find($id);
		$areaForProcess = Area::find($processToDelete->area_id);
		$project_id = $areaForProcess->project_id;

		if (!Auth::check() || Project::find($project_id)->user_id != Auth::user()->id) {
			return Response::json(null,401);
		}
		DB::table('processes')->where('id', $id)->delete();
		return Response::json(null,200);
	}


}
