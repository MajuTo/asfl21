<?php

class NousTrouverController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$sagesfemmes = [];
		$activities  = [];
		$sagesfemmes = User::orderBy('name')->get();
		$activities  = Activity::orderBy('activityName')->get();

		return View::make('noustrouver.noustrouver',[
			'sagesfemmes' => $sagesfemmes,
			'activities'  => $activities,
			]);
	}

	/* Get User by Activity */
	public function getSfByActivity(){
		
		if (isset($_POST['selectedActivities'])) {
			$selectedActivities = $_POST['selectedActivities'];

			/*$userByActivities = User::with('activities')->whereHas('activities', function($query) use($selectedActivities){
				$query->whereIn('id', $selectedActivities);
			})->get();*/	

			$query = User::with('activities');
			foreach ($selectedActivities as $activity) {
				$query->whereHas('activities', function($q) use($activity){
					$q->where('id', $activity);
				});
			}

			$userByActivities = $query->get();

		} else {
			$userByActivities = DB::table('users')->orderBy('name')->get();
			// $userByActivities = User::all()->orderBy('name');
		}

		return View::make('noustrouver.listesf', [
			'sagesfemmes' => $userByActivities,
			]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
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
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
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
