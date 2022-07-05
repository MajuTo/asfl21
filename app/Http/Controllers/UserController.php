<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Address;
use App\Group;
use App\Helpers\Alert;
use App\User;
use Hash;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Invytr;
use Mail;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Str;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
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
     * @return View
     * @throws BindingResolutionException
     */
    public function create(): View
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
     * @throws BindingResolutionException
     */
    public function store(): RedirectResponse
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

        $user->username = $this->generateUsername($user->name, $user->firstname);
        $user->password = Hash::make(Str::random(8));

        //Activities
        $activities = request('activities') ?? [];

        //Sauvegarde
        $user->save();
        $user->activities()->sync($activities);

        // Envoie l'email d'invitation
        Invytr::invite($user);

        Alert::add("alert-success", "L'adhérent a bien été créé");

        return redirect()->route('admin.user.index');
    }


    /**
     * Generate a random username with the first two letters of the name and firstname and a random 4 digits number.
     * Verify if the generated username is not already in the database
     *
     * @param string $name
     * @param string $firstname
     *
     * @return string
     */
    private function generateUsername(string $name, string $firstname): string
    {
        $username = Str::lower(substr($name, 0, 2) . substr($firstname, 0, 2) . rand(1000, 9999));

        return (User::where('username', '=', $username)->first()) ? $this->generateUsername($name, $firstname) : $username;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return View
     * @throws BindingResolutionException
     */
    public function show(int $id): View
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
     * @param  int  $id
     *
     * @return RedirectResponse|View
     */
    public function edit(int $id)
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
     *
     * @return RedirectResponse
     * @throws BindingResolutionException
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function update(int $id): RedirectResponse
    {
        $user = ( $this->isAdminRequest() ) ? User::find($id) : User::find(auth()->id());

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
            return redirect()->route('admin.user.edit', $user->id);
        }
        return redirect()->route('user.edit', auth()->user()->id);
    }

    /**
     * Update user's activities.
     *
     * @param  int  $id
     *
     * @return RedirectResponse
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function updateActivities(int $id): RedirectResponse
    {
        $user = User::find($id);

        $activities =  request()->get('activities') ?? [];
        $user->activities()->sync($activities);
        Alert::add("alert-success", "Les modifications ont bien été enregistrées.");

        if( $this->isAdminRequest() ){
            return redirect()->route('admin.user.edit', $user->id);
        }
        return redirect()->route('user.edit', auth()->user()->id);
    }

    /**
     * Update user's activities.
     *
     * @param Request $request
     *
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function updatePassword(Request $request): RedirectResponse
    {
        $user = auth()->user();
        $this->validate($request, [
            'password'              => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
        ]);

        $user->password = Hash::make($request->input('password'));
        $user->save();
        Alert::add("alert-success", "Votre nouveau mot de passe a bien été enregistré.");

        if( $this->isAdminRequest() ){
            return redirect()->route('admin.user.index');
        }
        return redirect()->route('user.edit', auth()->user()->id);
    }

    /**
     * Envoi un email à l'utilisateur depuis l'interface de contact
     *
     * @param  int  $id
     *
     * @return RedirectResponse
     * @throws BindingResolutionException
     */
    public function sendEmail(int $id): RedirectResponse
    {
        $user = User::find($id);

        $rules = array(
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
            '_answer' => 'required | simple_captcha',
        );
        $validation = validator()->make(request()->all(), $rules);

        if ($validation->fails()) {
            Alert::add("alert-danger", "Vous devez remplir tous les champs");

            return redirect()->back()->withErrors($validation)->withInput();
        }

        //Envoi mail
        Mail::send('emails.usercontact', ['inputs' => request()->all()], function(Message $m) use ($user)	{
            $m->from(env('MAIL_FROM_ADDRESS'), request('name'));
            $m->to($user->email)->subject('Contact depuis le site ASFL21');
        });

        Alert::add("alert-success", "Votre message a bien été envoyé");

        return redirect()->route('user.show', [$user->id, strtoupper($user->name) . '-' . ucfirst($user->firstname)]);
    }

    /**
     * Envoi un email à l'utilisateur.
     *
     * @param  int  $id
     *
     * @return RedirectResponse
     */
    public function sendAgain(int $id): RedirectResponse
    {
        $user = User::find($id);

        if(Invytr::invite($user)) {
            Alert::add("alert-success", "L'email a bien été envoyé à " . $user->firstname . " " . $user->name);
        } else {
            Alert::add("alert-danger", "Une erreur est survenue lors de l'envoi de l'email à " . $user->firstname . " " . $user->name);
        }

        return redirect()->route('admin.user.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy(int $id)
    {
        //
    }


    /**
     * Toggle the state of user (active/inactive).
     *
     * @param  int  $id
     *
     * @return RedirectResponse
     */
    public function toggle(int $id): RedirectResponse
    {
        $user = User::find($id);
        $user->update([
            'active' => ! $user->active
        ]);

        return redirect()->route('admin.user.index');
    }

}
