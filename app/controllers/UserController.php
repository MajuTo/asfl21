<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if($this->isAdminRequest()){
			$users = User::orderBy('name')->orderBy('firstname')->paginate(10);
			return View::make('admin.user.index', [
				'users' => $users
				]);
		}else{
			$users = User::paginate();
			return View::make('user.index', [
				'users' => $users
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
		$groups = Group::lists('groupName', 'id');

		$activities = Activity::orderBy('activityName', 'ASC')->get();
		$user = new User();
		return View::make('admin.user.create', [
			'groups'     => $groups,
			'activities' => $activities,
			'user'       => $user
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
			'name'      => 'required',
			'firstname' => 'required',
			'email'     => 'required|unique:users',
		);

		$validation = Validator::make(Input::all(), $rules);

		if ($validation->fails()) {
			Alert::add("alert-danger", "L'adhérent n'a pas pu être créé");
			return Redirect::back()->withErrors($validation)->withInput();
		}

		$user = new User(Input::all());
		$confirmation = $this->generateConfirmation();

		$user->username = $this->generateUsername($user->name, $user->firstname);
		$user->confirmation = $confirmation;

	

		//Sauvegarde
		$user->save();

		//Activities
		$activities = [];
		if(sizeof(Input::get('activities')) > 0){
			$activities = Input::get('activities');
		}
		$user->activities()->sync($activities);

		//Envoi mail
		Mail::send('emails.inscription', ['user' => $user, 'confirmation' => $confirmation], function($m) use ($user)	{
			$m->to($user->email)->subject('Inscription sur le site asfl21.fr');
		});

		Alert::add("alert-success", "L'adhérent a bien été créé");
		return Redirect::route('admin.user.index');
	}



	/**
	 * Generate a random username with the first two letters of the name and firstname and a random 4 digits number.
	 * Verify if the generated username is not already in the database
	 */
	private function generateUsername($name, $firstname)
	{
		$username = Str::lower(substr($name, 0, 2) . substr($firstname, 0, 2) . rand(1000, 9999));
		try
		{
			User::where('username', '=', $username)->firstOrFail();
			$this->generateUsername($name, $firstname);
		}
		catch(Exception $e)
		{
			return $username;
		}
	}

	/* Generates unique confirmation string for confirmation link */
	private function generateConfirmation()
	{
		$confirmation = Str::random(12);
		if (User::where('confirmation', '=', $confirmation)->first()) {
			$this->generateConfirmation();
		} else {
			return $confirmation;
		}
	}

	public function confirmation($confirmation){
		$user = User::where('confirmation', '=', $confirmation)->first();
		if ($user && $user->confirmed == 0) {
			// return View::make('user.confirmation.index', ['user' => $user]);
			Auth::loginUsingId($user->id);
			$user->confirmed = 1;
			$user->save();

			return Redirect::route('sessions.edit');
		} else if ($user && $user->confirmed == 1) {
			return View::make('user.confirmation.error');
		} else {
			return Redirect::route('home');
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
		$user = User::find($id);
		$address = Address::where('user_id', '=', $id)->get();

		return View::make('user.show', [
			'user' 		=> $user,
			'address'  	=> $address
			]);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);
		$user_id = ($this->isAdminRequest()) ? $id : Auth::id();
		$addresses = Address::where('user_id', '=', $user_id)->get();
		$groups = Group::lists('groupName', 'id');
		$activities = Activity::orderBy('activityName', 'ASC')->get();
		$view = ($this->isAdminRequest()) ? 'admin.user.edit' : 'user.edit';
		if ($id != Auth::id() && !$this->isAdminRequest()) {
			return Redirect::route('user.edit', [Auth::id()]);
		}

		return View::make($view,[
			'user'       => $user,
			'addresses'	 => $addresses,
			'groups'     => $groups,
			'activities' => $activities
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
		if ( !$this->isAdminRequest() ) {
			$user = User::find(Auth::id());
		} else {
			$user = User::find($id);
		}

		// validation form
		$rules = array(
			'name'      => 'required',
			'firstname' => 'required',
			'username'  => 'required|unique:users,username,'.$id,
			'email'     => 'required|unique:users,email,'.$id,
		);

		$validation = Validator::make(Input::all(), $rules);

		if ($validation->fails()) {
			Alert::add("alert-danger", "Les modifications n'ont pas été enregistrées.");
			return Redirect::back()->withErrors($validation);
		}

		$user->hideEmail = 0;
		$user->hideMobile = 0;
		$user->update(Input::all());

		Alert::add("alert-success", "Les modifications ont bien été enregistrées.");

		if($this->isAdminRequest()){
			//Activities
			/*$activities = [];
			if(sizeof(Input::get('activities')) > 0){
				$activities = Input::get('activities');
			}
			$user->activities()->sync($activities);*/
			return Redirect::route('admin.user.index');
		}
		return Redirect::route('user.edit', Auth::user()->id);
	}


	/**
	 * Update user's activities.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function updateActivities($id)
	{
		$user = User::find($id);

		$activities = [];
		if(sizeof(Input::get('activities')) > 0){
			$activities = Input::get('activities');
		}
		$user->activities()->sync($activities);
		Alert::add("alert-success", "Les modifications ont bien été enregistrées.");

		if( $this->isAdminRequest() ){
			return Redirect::route('admin.user.index');
		}
		return Redirect::route('user.edit', Auth::user()->id);
	}

	/**
	 * Envoi un email à l'utilisateur.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function sendEmail($id){
		$user = User::find($id);

		$rules = array(
			'name' => 'required',
			'email' => 'required',
			'message' => 'required'
		);
		$validation = Validator::make(Input::all(), $rules);

		if ($validation->fails()) {
			Alert::add("alert-danger", "Vous devez remplir tous les champs");
			return Redirect::back()->withErrors($validation);
		}

		//Envoi mail
		Mail::send('emails.usercontact', ['input' => Input::all()], function($m) use ($user)	{
			$m->from(Input::get('email'), Input::get('name'));
			$m->to($user->email)->subject('Contact depuis le site ASFL21');
		});
		Alert::add("alert-success", "Votre message a bien été envoyé");
		return Redirect::route('user.show', $user->id);
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


	/**
	 * Toogle the state of user (active/inactive).
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function toggle($id)
	{
		$user = User::find($id);
		if($user->active){
			$user->active = 0;
		}else{
			$user->active = 1;
		}
		$user->save();
		return Redirect::route('admin.user.index');
	}


}
