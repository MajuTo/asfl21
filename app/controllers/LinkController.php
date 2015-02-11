<?php

class LinkController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$view = ($this->isAdminRequest()) ? 'admin.link.index' : 'link.index';
		$links = Link::all();
		return View::make($view, [
			'links' => $links
			]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$link = new Link();
		return View::make('admin.link.create', [
			'link'   => $link
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
			'linkName'  => 'required',
			'link' 		=> 'required|unique:links'
		);

		$validation = Validator::make(Input::all(), $rules);

		if ($validation->fails()) {
			Alert::add("alert-danger", "Le lien n'a pas pu être créé");
			return Redirect::back()->withErrors($validation)->withInput();
		}

		$link = new Link(Input::all());

		//Sauvegarde
		$link->save();

		Alert::add("alert-success", "Le lien a bien été créé");
		return Redirect::route('admin.link.index');
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
		$link = Link::find($id);
		return View::make('admin.link.edit',[
			'link' => $link
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
		$rules = array(
			'linkName'  => 'required',
			'link' 		=> 'required|unique:links,link,'.$id
		);

		$validation = Validator::make(Input::all(), $rules);

		if ($validation->fails()) {
			Alert::add("alert-danger", "Le lien n'a pas pu être modifié");
			return Redirect::back()->withErrors($validation)->withInput();
		}

		$link = Link::find($id);

		//Sauvegarde
		$link->update(Input::all());

		Alert::add("alert-success", "Le lien a bien été modifié");
		return Redirect::route('admin.link.index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Link::destroy($id);
		return Redirect::route('admin.link.index');
	}


}
