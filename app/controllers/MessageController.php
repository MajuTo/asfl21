<?php

class MessageController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if($this->isAdminRequest()){
			$messages = Message::orderBy('created_at','desc')->paginate(10);
			return View::make('admin.message.index', [
				'messages' => $messages
				]);
		}else{
			//Messages admin
			Paginator::setPageName('am');
			$aMessages = Message::where('category_id', '=', 1)->orderBy('created_at','desc')->paginate(10);
			//Messages membres
			Paginator::setPageName('mm');
			$mMessages = Message::where('category_id', '=', 2)->orderBy('created_at','desc')->paginate(10);
			return View::make('message.index', [
				'mMessages' => $mMessages,
				'aMessages' => $aMessages
				]);
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
		if(Input::get('admin-msg')) {
			$message->category_id = 1;
		} else {	
			$message->category_id = 2;
		}
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
		$categories = Category::lists('categoryName', 'id');
		return View::make($view, [
			'message' => $message,
			'categories'=> $categories
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
		return Redirect::route($view);
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
