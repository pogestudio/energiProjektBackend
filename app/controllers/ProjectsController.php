<?php

class ProjectsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Auth::check()) {
			$projects = DB::table('projects')->where('user_id', Auth::user()->id)->get();
			Log::debug('got projects for user! ' . json_encode($projects));
			return Response::json($projects,200);
		} else
		{
			return Response::json(null,401);
		}

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('projects.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Log::debug('Innuti  proj store!');

		if(!Auth::check())
		{
			return Response::json(null, 401);
		}
		
		$inputArray = array (
			'title' => Input::get('title'),
			'company_name' => Input::get('company_name'),
			'description' => Input::get('description'),
			'vacation_weeks' => Input::get('vacation_weeks'),
			'area' => Input::get('area'),
			'user_id' => Auth::user()->id,
			);
			

		Log::debug('inputarray: ' . json_encode($inputArray));

		$validator = Validator::make($inputArray, Project::$rules);

		$wronglyFormattedParametersCode = 400;
		$bookNotFoundCode = 401;
		$successCode = 200;
		$statusCode = $bookNotFoundCode;


		$newProject = null;
        // Check if the form validates with success.
		if ($validator->passes())
		{
			Log::debug('validation passed');
			$statusCode = $successCode;
			$newProject = Project::create($inputArray);
			$newProject->user()->associate(Auth::user());

			$newProject->fillUpWithEnergyTypes();
			
			$newProject->save();
		} else
		{
			Log::debug('validation passed NOTNOTNOT');
			$statusCode = $wronglyFormattedParametersCode;
		}

		Log::debug('Just before response!');
		return Response::json($newProject, $statusCode);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return View::make('projects.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('projects.edit');
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
