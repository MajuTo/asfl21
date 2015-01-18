<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$groups = Group::lists('groupName', 'idGroup');
		return View::make('user.create', [
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
		$regles = array(
			'name'      => 'required',
			'firstName' => 'required',
			'username'  => 'required',
			'email'     => 'required',
			// 'phone'     => 'required',
			// 'mobile'    => 'required',
			'address'   => 'required',
			'zipCode'   => 'required',
			'city'      => 'required',
		);

		$validation = Validator::make(Input::all(), $regles);

		if ($validation->fails()) {
			Alert::add("alert-danger", "L'adhérent n'a pas pu être créé");
			return Redirect::back()->withErrors($validation)->withInput();
		}

		User::create(Input::all());
		Alert::add("alert-success", "L'adhérent a bien été créé");
		return Redirect::route('admin.user.create');
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
