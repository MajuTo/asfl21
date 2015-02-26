<?php

class PartnerController extends \BaseController {

	private $logo_path = "assets/img/partners/";

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$view = ($this->isAdminRequest()) ? 'admin.partner.index' : 'partner.index';
		$partners = Partner::all();
		return View::make($view, [
			'partners' => $partners
			]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$partner = new Partner();
		return View::make('admin.partner.create', [
			'partner'   => $partner
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
			'partnerName'  => 'required|unique:partners',
			'logo_file' => 'image'
		);

		$validation = Validator::make(Input::all(), $rules);

		if ($validation->fails()) {
			Alert::add("alert-danger", "Le partenaire n'a pas pu être créé");
			return Redirect::back()->withErrors($validation)->withInput();
		}

		$partner = new partner(Input::all());

		$file = Input::file('logo_file');

		if ($file && $file->isValid()){
			$ext = $file->getClientOriginalExtension();
			$filename = str_replace(' ', '',$partner->partnerName . '.' . $ext);
		    $file->move($this->logo_path, $filename);
		    $partner->logo = $this->logo_path . $filename;
		}

		//Sauvegarde
		$partner->save();

		Alert::add("alert-success", "Le partenaire a bien été créé");
		return Redirect::route('admin.partner.index');
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
		$partner = Partner::find($id);
		return View::make('admin.partner.edit',[
			'partner' => $partner
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
			'partnerName'  => 'required|unique:partners,partnerName,'.$id,
			'logo_file' => 'image'
		);

		$validation = Validator::make(Input::all(), $rules);

		if ($validation->fails()) {
			Alert::add("alert-danger", "Le partenaire n'a pas pu être modifié");
			return Redirect::back()->withErrors($validation)->withInput();
		}

		$partner = Partner::find($id);

		if(Input::get('delete_logo')){
			File::delete($partner->logo);
			$partner->logo = '';
		}

		$file = Input::file('logo_file');
		if ($file && $file->isValid()){
			if($partner->logo){
				File::delete($partner->logo);
			}
			$ext = $file->getClientOriginalExtension();
			$filename = str_replace(' ', '',$partner->partnerName . '.' . $ext);
		    $file->move($this->logo_path, $filename);
		    $partner->logo = $this->logo_path . $filename;
		}

		//Sauvegarde
		$partner->update(Input::all());

		Alert::add("alert-success", "Le partenaire a bien été modifié");
		return Redirect::route('admin.partner.index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Partner::destroy($id);
		return Redirect::route('admin.partner.index');
	}


}
