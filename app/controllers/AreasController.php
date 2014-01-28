<?php

class AreasController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getAll($project_id)
	{
		if (!Auth::check() || Project::find($project_id)->user_id != Auth::user()->id) {
			return Response::json(null,401);
		}

		$buildings = DB::table('areas')->where('project_id',$project_id)->where('isBuilding',1)->get();
	//	$rooms = DB::table('areas')->where('project_id',$project_id)->where('isBuilding',0)->get();
		$rooms = DB::table('areas')
            ->join('areas AS ownerArea', 'areas.owner_building_id', '=', 'ownerArea.id')
            ->where('areas.project_id',$project_id)
            ->where('areas.isBuilding',0)
            ->select('areas.id AS id', 'areas.title AS title', 'areas.description AS description', 'ownerArea.title AS ownerTitle')
            ->get();
		$response = array(
			"buildings" => $buildings,
			"rooms" => $rooms,
			);
		//$areas->load('ownerRoom');
		return Response::json($response,200);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('areas.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Log::debug('Innuti  areas store!');

		if(!Auth::check())
		{
			return Response::json(null, 401);
		}
		
		$inputArray = array (
			'title' => Input::get('title'),
			'isBuilding' => Input::get('isBuilding'),
			'owner_building_id' => Input::get('owner_building_id'),
			'description' => Input::get('description'),
			'project_id' => Input::get('project_id'),
			);
			//'user_id' => Auth::user()->id,


		Log::debug('AREA inputarray: ' . json_encode($inputArray));

		$validator = Validator::make($inputArray, Area::$rules);

		$wronglyFormattedParametersCode = 400;
		$successCode = 200;
		$statusCode = $wronglyFormattedParametersCode;


		$newArea = null;
        // Check if the form validates with success.
		if ($validator->passes())
		{
			Log::debug('validation passed');
			$statusCode = $successCode;
			$newArea = Area::create($inputArray);
		} else
		{
			Log::debug('validation passed NOTNOTNOT');
			$statusCode = $wronglyFormattedParametersCode;
		}

		Log::debug('Just before response!');
		return Response::json($newArea, $statusCode);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return View::make('areas.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('areas.edit');
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
		$areaToDelete = Area::find($id);
		$project_id = $areaToDelete->project_id;

		if (!Auth::check() || Project::find($project_id)->user_id != Auth::user()->id) {
			return Response::json(null,401);
		}
		DB::table('areas')->where('id', $id)->delete();
		return Response::json(null,200);
	}

}
