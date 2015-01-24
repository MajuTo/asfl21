<?php

class SessionsController extends \BaseController {

    /**
     * Show the form for creating a new resource.
     * GET /sessions/create
     *
     * @return Response
     */
    public function create()
    {
        if (Auth::check()) {
            return Redirect::intended();
        }
        return View::make('login.index');
    }

    /**
     * Store a newly created resource in storage.
     * POST /sessions
     *
     * @return Response
     */
    public function store()
    {
        // recupere userinput
        $input = Input::all();

        // validation form
        $regles = [
            'username'  => 'required',
            'password'  => 'required',
        ];

        $validation = Validator::make(Input::all(), $regles);

        if ($validation->fails()) {
            return Redirect::back()->withErrors($validation)->withInput();
        }


        // authentification
        $credentials = [
            'username'   => $input['username'],
            'password'   => $input['password']
        ];

        // authentification
        $attempt = Auth::attempt($credentials);

        if ($attempt) {
            $user = User::where('username', $input['username'])->first();
            if ($user->loggedOnce == 0) {
                return Redirect::route('change.edit', [$user->id]);
            }
            return Redirect::intended();
        }

        Alert::add("alert-danger", "Identifiant ou mot de passe non valide.");
        return Redirect::back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy()
    {
        Auth::logout();
        return Redirect::route('home');
    }



    /* TO BE DELETED AFTER DEV */
    public function tinker() {
        User::create([
            'name'      => 'Alexis',
            'firstName' => 'Richter',
            'username'  => 'root',
            'password'  => Hash::make('root'),
            'email'     => 'admin@musaya.net',
            'phone'     => '123456789',
            'mobile'    => '987654321',
            'fax'       => '',
            'address'   => 'stairway to heaven, 42',
            'zipCode'   => '222',
            'city'      => 'Dijon',
            'group_id' => 1
            ]);

        return 'Done';


    }

}