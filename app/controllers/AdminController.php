<?php

class AdminController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('admin.index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$groups = Group::lists('groupName', 'idGroup');
		return View::make('admin.create', [
		    'groups' => $groups
		    ]);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		try {
		    DB::table('User')->insertGetId(Input::except('_token'));
		    Session::flash('success', true);
		    Session::flash('class', 'alert alert-success');
		    Session::flash('message', 'L\'adhérent a été créé');
		    return Redirect::route('admin');
		} catch (Exception $e) {
		    Session::flash('success', false);
		    Session::flash('class', 'alert alert-danger');
		    Session::flash('message', 'L\'adhérent n\'a pas été créé');
		    return Redirect::route('admin');
		}
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
