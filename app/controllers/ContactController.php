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
			'name' => 'required',
			'email' => 'required|email',
			'subject' => 'required|max:250',
			'message' => 'required|max:250'
		);

		$validation = Validator::make(Input::all(), $regles);

		if ($validation->fails()) {
		  	return Redirect::to('contact.index')->withErrors($validation)->withInput();
		} else {
			$subject = (Input::get('pro')) ? '[PRO] ' : '';
			$subject .= Input::get('subject');
			Mail::send('emails.contact', ['inputs' => Input::all()], function($m) use ($subject){
				$m->to('contact@asfl21.fr')->subject($subject)->from(Input::get('email'), Input::get('name'));
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
