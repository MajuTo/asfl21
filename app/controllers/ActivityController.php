<?php

class ActivityController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$view = ($this->isAdminRequest()) ? 'admin.activity.index' : 'activity.index';
		$activities = Activity::all();
		return View::make($view,[
			'activities' => $activities
			]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$activity = new Activity();
		return View::make('admin.activity.create', [
			'activity'   => $activity
			]);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'activityName'      => 'required|unique:activities',
			'activityDesc' => 'required'
		);

		$validation = Validator::make(Input::all(), $rules);

		if ($validation->fails()) {
			Alert::add("alert-danger", "L'activité n'a pas pu être créée");
			return Redirect::back()->withErrors($validation)->withInput();
		}

		$activity = new Activity(Input::all());
		
		//Sauvegarde
		$activity->save();

		Alert::add("alert-success", "L'activité a bien été créée");
		return Redirect::route('admin.activity.index');
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
		$activity = Activity::find($id);
		return View::make('admin.activity.edit', [
			'activity'   => $activity
			]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$activity = Activity::find($id);

		$rules = array(
			'activityName'      => 'required|unique:activities,activityName,'.$id,
			'activityDesc' => 'required'
		);

		$validation = Validator::make(Input::all(), $rules);

		if ($validation->fails()) {
			Alert::add("alert-danger", "L'activité n'a pas pu être modifiée");
			return Redirect::back()->withErrors($validation)->withInput();
		}

		$activity->update(Input::all());

		Alert::add("alert-success", "L'activité a bien été modifiée");
		return Redirect::route('admin.activity.index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Activity::destroy($id);
		return Redirect::route('admin.activity.index');
	}


}
