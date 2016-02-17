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
		$sagesfemmes = User::where('active', 1)->where('group_id', '!=', 3)->orderBy('name')->get();
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

			/*$query = User::with('activities');
			foreach ($selectedActivities as $activity) {
				$query->whereHas('activities', function($q) use($activity){
					$q->where('id', $activity);
				});
			}
			$userByActivities = $query->get();

			select * from `users` where 
			(select count(*) from `activities` inner join `activity_user` on `activities`.`id` = `activity_user`.`activity_id` where `activity_user`.`user_id` = `users`.`id` and `id` = '7') >= 1 
			and (select count(*) from `activities` inner join `activity_user` on `activities`.`id` = `activity_user`.`activity_id` where `activity_user`.`user_id` = `users`.`id` and `id` = '3') >= 1 
			and (select count(*) from `activities` inner join `activity_user` on `activities`.`id` = `activity_user`.`activity_id` where `activity_user`.`user_id` = `users`.`id` and `id` = '1') >= 1 
			and (select count(*) from `activities` inner join `activity_user` on `activities`.`id` = `activity_user`.`activity_id` where `activity_user`.`user_id` = `users`.`id` and `id` = '2') >= 1*/

			$userByActivities = User::with('activities')
				->where('active', 1)
	            ->whereHas('activities', function($query) use($selectedActivities) {
	                $query->selectRaw('count(distinct id)')->whereIn('id', $selectedActivities);
	            }, '=', count($selectedActivities))
	            ->where('active', 1)
	            ->where('group_id', '!=', 3)
	            ->orderBy('name')->get();

	        /*select * from `users` where (select count(distinct id) from `activities` 
	        	inner join `activity_user` on `activities`.`id` = `activity_user`.`activity_id` 
	        	where `activity_user`.`user_id` = `users`.`id` and `id` in ('3', '2', '8', '10')) = 4*/

		} else {
			// $userByActivities = DB::table('users')->orderBy('name')->get();
			$userByActivities = User::where('active', 1)->where('group_id', '!=', 3)->orderBy('name')->get();
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
