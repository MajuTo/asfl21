<?php

class AddressController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$addresses = Address::where('user_id', '=', Auth::id())->get();
		return View::make('address.index', [
			'addresses' => $addresses
			]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$address = new Address();
		if($this->isAdminRequest()){
			$view = 'admin.address.create';
		} else {
			$view = 'address.create';
		}
		return View::make($view, [
			'address'   => $address
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
			'name' 		=> 'required',
			'address' 	=> 'required',
			'zipCode' 	=> 'required',
			'city' 		=> 'required'
		);

		$validation = Validator::make(Input::all(), $rules);

		if ($validation->fails()) {
			Alert::add("alert-danger", "L'adresse n'a pas pu être créée");
			return Redirect::back()->withErrors($validation)->withInput();
		}

		$address = new Address(Input::all());
		if($this->isAdminRequest()){
			$address->user_id = $user->id;
		} else {
			$address->user_id = Auth::id();
		}

		$location = $this->geocode($address);
		if ($location != null) {
			$address->lat = $location['lat'];
			$address->lng = $location['lng'];
		} else {
			Alert::add('alert-warning', "Cette adresse n'existe pas dans Google Maps.");
		}
		
		//Sauvegarde
		$address->save();

		Alert::add("alert-success", "L'adresse a bien été créée");
		return Redirect::route('user.edit', Auth::id());
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
		$address = Address::find($id);
		$user = User::find($address->user_id);
		if($this->isAdminRequest()){
			$admin = true;
			$view = 'admin.address.edit';
		} else {
			$admin = false;
			$view = 'address.edit';
		}
		return View::make($view, [
			'address' => $address,
			'user' => $user,
			'admin' => $admin
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
			'name' 		=> 'required',
			'address' 	=> 'required',
			'zipCode' 	=> 'required',
			'city' 		=> 'required'
		);

		$validation = Validator::make(Input::all(), $rules);

		if ($validation->fails()) {
			Alert::add("alert-danger", "L'adresse n'a pas pu être créée");
			return Redirect::back()->withErrors($validation)->withInput();
		}
		$address = Address::find($id);
		$user_id = $address->user_id;
		$address->hidePhone = 0;
		$address->hideFax = 0;
		$address->update(Input::all());

		if($this->isAdminRequest()){
			$address->user_id = $user_id;
		} else {
			$address->user_id = Auth::id();
		}

		$location = $this->geocode($address);
		if ($location == null) {
			Alert::add('alert-warning', "Cette adresse n'existe pas dans Google Maps.");
			$address->lat = null;
			$address->lng = null;
			$address->save();
		} else {
			$address->lat = $location['lat'];
			$address->lng = $location['lng'];
			$address->save();
		}

		Alert::add("alert-success", "L'adresse a bien été enregistrée");

		if($this->isAdminRequest()){
			return Redirect::route('admin.user.index');
		} else {
			return Redirect::route('user.edit', Auth::user()->id);
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user_id = User::find( Address::find($id)->user_id )->id;
		Address::destroy($id);
		if($this->isAdminRequest()){
			return Redirect::route('admin.user.edit', $user_id);
		} else {
			return Redirect::route('user.edit', Auth::user()->id);
		}
	}

	public function geocode($address){
		// a changer en prod... clé de dev.
		$googleApiKey = 'AIzaSyAqJKkv1M-fhJ97dtL0CUV16QelltipJmE';
		$parameters   = str_replace(' ', '+', $address->address . ' ' . $address->zipCode . ' ' . $address->city . "&key=" . $googleApiKey);
		$googleMapUrl = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $parameters;

		$ch = curl_init($googleMapUrl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);


	    try{
			$exec = curl_exec($ch);
			if($exec == false){
				throw new Exception(curl_error($ch), curl_errno($ch));
			}
	    }catch(Exception $e){
	    	trigger_error(sprintf(
		        'Curl failed with error #%d: %s',
		        $e->getCode(), $e->getMessage()),
		        E_USER_ERROR);
	    }



	    $geolocation = json_decode(curl_exec($ch), true);

	    if ($geolocation['status'] == 'OK') {
	    	$lat = $geolocation['results'][0]['geometry']['location']['lat'];
			$lng = $geolocation['results'][0]['geometry']['location']['lng'];
		    return ['lat' => $lat, 'lng' => $lng];
	    }

	    return null;

	}


}
