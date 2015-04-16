<?php

class ContactController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('contact.index');
	}

	public function sendcontact()
	{
		$regles = array(
			'name' => 'required|min:5|max:20',
			'email' => 'required|email',
			'subject' => 'required|max:250',
			'message' => 'required|max:250'
		);

		$validation = Validator::make(Input::all(), $regles);

		if ($validation->fails()) {
		  	return Redirect::to('contact.index')->withErrors($validation)->withInput();
		} else {
			Mail::send('emails.contact', ['inputs' => Input::all()], function($m)	{
				$m->to('admin@musaya.net')->subject(Input::get('subject'))->from(Input::get('email'), Input::get('name'));
			});
			return View::make('contact.index');
		}
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
