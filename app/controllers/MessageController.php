<?php

class MessageController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$view = ($this->isAdminRequest()) ? 'admin.message.index' : 'message.index';
		$aMessages = Category::find(1)->messages;
		$mMessages = Category::find(2)->messages;
		$messages = Message::orderBy('created_at','desc')->paginate(2);
		return View::make($view, [
			'messages' => $messages,
			'mMessages' => $mMessages,
			'aMessages' => $aMessages
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
		$rules = array(
			'title'   => 'required',
			'content' => 'required'
		);

		$validation = Validator::make(Input::all(), $rules);

		if ($validation->fails()) {
			Alert::add("alert-danger", "Le message n'a pas pu être envoyé");
			return Redirect::back()->withErrors($validation)->withInput();
		}

		$message = new Message();
		$message->title = Input::get('title');
		$message->content = Input::get('content');
		$message->category_id = 2;
		$message->user_id = Auth::id();

		//Sauvegarde
		$message->save();

		Alert::add("alert-success", "Votre message a bien été envoyé");
		return Redirect::route('message.index');
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
		$view = ($this->isAdminRequest()) ? 'admin.message.edit' : 'message.edit';
		$message = Message::find($id);
		return View::make($view, [
			'message' => $message
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
		$view = ($this->isAdminRequest()) ? 'admin.message.index' : 'message.index';
		$message = Message::find($id);
		$message->update(Input::all());
		return Redirect::route($view);;
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Message::destroy($id);
		return Redirect::route('admin.message.index');
	}


}
