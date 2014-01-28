<?php

class ProcessTypesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($project_id)
	{
		if (!Auth::check() || Project::find($project_id)->user_id != Auth::user()->id) {
			return Response::json(null,401);
		}

		$processTypes = DB::table('processTypes')
		->leftJoin('processes', 'processes.processtype_id','=','processTypes.id')
		->leftJoin('areas', 'areas.id','=','processes.area_id')
		->where('areas.project_id',$project_id)
		->orWhere('processTypes.standard','=',true)
		->select('processTypes.name','processTypes.type','processTypes.id')
		->groupBy('processTypes.name')
		->get();

		//Log::debug('querylog :::: ' . json_encode(DB::getQueryLog()));


		return Response::json($processTypes,200);

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('processtypes.create');
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
		return View::make('processtypes.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('processtypes.edit');
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
