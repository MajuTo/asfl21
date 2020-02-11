<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Address;
use App\Group;
use App\Helpers\Alert;
use App\User;
use Hash;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Invytr;
use Mail;
use Str;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        if($this->isAdminRequest()){
            $users = User::orderBy('name')->orderBy('firstname')->paginate(10);
            return view('admin.user.index', [
                'users' => $users
            ]);
        }else{
            $users = User::paginate();
            return view('user.index', [
                'users' => $users
            ]);
        }

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $groups = Group::pluck('groupName', 'id');

        $activities = Activity::orderBy('activityName', 'ASC')->get();
        $user = new User();
        return view()->make('admin.user.create', [
            'groups'     => $groups,
            'activities' => $activities,
            'user'       => $user
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return RedirectResponse
     */
    public function store()
    {
        $rules = array(
            'name'      => 'required',
            'firstname' => 'required',
            'email'     => 'required|unique:users',
        );

        $validation = validator()->make(request()->all(), $rules);

        if ($validation->fails()) {
            Alert::add("alert-danger", "L'adhérent n'a pas pu être créé");
            return back()->withErrors($validation)->withInput();
        }

        $user = new User(request()->all());
        $confirmation = $this->generateConfirmation();

        $user->username = $this->generateUsername($user->name, $user->firstname);
        $user->confirmation = $confirmation;
        $user->password = Hash::make(Str::random(8));

        //Activities
        $activities = request('activities') ?? [];

        //Sauvegarde
        $user->save();
        $user->activities()->sync($activities);

        // Envoie l'email d'i,vitation
        Invytr::invite($user);

        Alert::add("alert-success", "L'adhérent a bien été créé");

        return redirect()->route('admin.user.index');
    }


    /**
     * Generate a random username with the first two letters of the name and firstname and a random 4 digits number.
     * Verify if the generated username is not already in the database
     * @param $name
     * @param $firstname
     * @return string
     */
    private function generateUsername($name, $firstname)
    {
        $username = Str::lower(substr($name, 0, 2) . substr($firstname, 0, 2) . rand(1000, 9999));
        try
        {
            User::where('username', '=', $username)->firstOrFail();
            $this->generateUsername($name, $firstname);
        }
        catch(\Exception $e)
        {
            return $username;
        }
    }

    /* Generates unique confirmation string for confirmation link */
//    private function generateConfirmation()
//    {
//        $confirmation = Str::random(12);
//        if (User::where('confirmation', '=', $confirmation)->first()) {
//            $this->generateConfirmation();
//        } else {
//            return $confirmation;
//        }
//    }

//    public function confirmation($confirmation){
//        $user = User::where('confirmation', '=', $confirmation)->first();
//        if ($user && $user->confirmed == 0) {
//            // return view()->make('user.confirmation.index', ['user' => $user]);
//            auth()->loginUsingId($user->id);
//
//            $user->confirmed = 1;
//            $user->save();
//
//            return redirect()->route('sessions.edit');
//        } else if ($user && $user->confirmed == 1) {
//            return view()->make('user.confirmation.error');
//        } else {
//            return redirect()->route('home');
//        }
//    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $user = User::find($id);
        $address = Address::where('user_id', '=', $id)->get();

        return view()->make('user.show', [
            'user' 		=> $user,
            'address'  	=> $address
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Factory|RedirectResponse|View
     */
    public function edit($id)
    {
        $user = User::find($id);
        $user_id = ($this->isAdminRequest()) ? $id : auth()->id();
        $addresses = Address::where('user_id', '=', $user_id)->get();
        $groups = Group::pluck('groupName', 'id');
        $activities = Activity::orderBy('activityName', 'ASC')->get();
        $view = ($this->isAdminRequest()) ? 'admin.user.edit' : 'user.edit';
        if( $this->isAdminRequest() ) {
            session(['user_id' => $id]);
        }
        if ($id != auth()->id() && !$this->isAdminRequest()) {
            return redirect()->route('user.edit', [auth()->id()]);
        }

        return view($view,[
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
     * @return RedirectResponse
     */
    public function update($id)
    {
        if ( !$this->isAdminRequest() ) {
            $user = User::find(auth()->id());
        } else {
            $user = User::find($id);
        }

        $fields = request()->only(['name', 'firstname', 'username', 'email', 'mobile', 'description', 'group_id']);
        // validation form
        $rules = array(
            'name'      => 'required',
            'firstname' => 'required',
            'username'  => 'required|unique:users,username,'.$id,
            'email'     => 'required|unique:users,email,'.$id,
        );

        $validation = validator()->make($fields, $rules);

        if ($validation->fails()) {
            Alert::add("alert-danger", "Les modifications n'ont pas été enregistrées.");
            return redirect()->back()->withErrors($validation);
        }

        $user->hideEmail = request()->get('hideEmail') ?? 0;
        $user->hideMobile = request()->get('hideMobile') ?? 0;
        $user->update($fields);

        Alert::add("alert-success", "Les modifications ont bien été enregistrées.");

        if($this->isAdminRequest()){
            //Activities
            /*$activities = [];
            if(sizeof(request()->get('activities')) > 0){
                $activities = request()->get('activities');
            }
            $user->activities()->sync($activities);*/
            return redirect()->route('admin.user.index');
        }
        return redirect()->route('user.edit', auth()->user()->id);
    }

    /**
     * Update user's activities.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function updateActivities($id)
    {
        $user = User::find($id);

        $activities =  request()->get('activities') ?? [];
//        if(sizeof(request()->get('activities')) > 0){
//            $activities = request()->get('activities');
//        }
        $user->activities()->sync($activities);
        Alert::add("alert-success", "Les modifications ont bien été enregistrées.");

        if( $this->isAdminRequest() ){
            return redirect()->route('admin.user.index');
        }
        return redirect()->route('user.edit', auth()->user()->id);
    }

    /**
     * Update user's activities.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function updatePassword(Request $request)
    {
        $user = auth()->user();
        $this->validate($request, [
            'password'              => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
        ]);

        $user->password = bcrypt($request->input('password'));
        $user->save();
        Alert::add("alert-success", "Les modifications ont bien été enregistrées.");

        if( $this->isAdminRequest() ){
            return redirect()->route('admin.user.index');
        }
        return redirect()->route('user.edit', auth()->user()->id);
    }

    /**
     * Envoi un email à l'utilisateur depuis l'inteface de contact
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function sendEmail($id){
        $user = User::find($id);

        $rules = array(
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        );
        $validation = validator()->make(request()->all(), $rules);

        if ($validation->fails()) {
            Alert::add("alert-danger", "Vous devez remplir tous les champs");

            return redirect()->back()->withErrors($validation);
        }

        //Envoi mail
        Mail::send('emails.usercontact', ['input' => request()->all()], function(Message $m) use ($user)	{
            $m->from(request('email'), request('name'));
            $m->to($user->email)->subject('Contact depuis le site ASFL21');
        });

        Alert::add("alert-success", "Votre message a bien été envoyé");

        return redirect()->route('user.show', [$user->id, strtoupper($user->name) . '-' . ucfirst($user->firstname)]);
    }

    /**
     * Envoi un email à l'utilisateur.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function sendAgain($id){
        $user = User::find($id);

        Invytr::invite($user);

        Alert::add("alert-success", "L'email a bien été envoyé à " . $user->firstname . " " . $user->name);
        return redirect()->route('admin.user.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Toogle the state of user (active/inactive).
     *
     * @param  int  $id
     * @return RedirectResponse
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

        return redirect()->route('admin.user.index');
    }

}
