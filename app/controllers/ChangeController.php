<?php

class ChangeController extends \BaseController {

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
		if ($id != Auth::id()) {
			return Redirect::Route('change.edit', [Auth::id()]);
		}

		$user = User::find(Auth::id());
		return View::make('login.change', ['user' => $user]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$user 		 = User::find(Auth::id());
		$password    = Input::get('password');
		$confirmation = Input::get('confirmation');

		// validation form
		$regles = [
		    'password'      => 'required',
		    'confirmation'  => 'required',
		];

		$validation = Validator::make(Input::all(), $regles);

		if ($validation->fails()) {
			return Redirect::back()->withErrors($validation);
		}

		// validation mdp
		if ($password == $confirmation) {
			$user->password = Hash::make($password);
			$user->loggedOnce = 1;
			$user->save();
			return Redirect::route('home');
		}

		Alert::add("alert-danger", "Mot de passe non identique.");
		return Redirect::back();
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
