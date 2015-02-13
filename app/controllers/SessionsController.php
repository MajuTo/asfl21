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
        $rules = [
            'username'  => 'required',
            'password'  => 'required',
        ];

        $validation = Validator::make(Input::all(), $rules);

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
                return Redirect::route('sessions.edit', [$user->id]);
            }
            return Redirect::route('message.index');
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



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        if ($id != Auth::id()) {
            return Redirect::Route('sessions.edit', [Auth::id()]);
        }

        $user = User::find(Auth::id());
        return View::make('login.change', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update()
    {
        $user        = User::find(Auth::id());
        $password    = Input::get('password');
        $confirmation = Input::get('confirmation');

        // validation form
        $rules = [
            'password'              => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
        ];

        $validation = Validator::make(Input::all(), $rules);

        if ($validation->fails()) {
            return Redirect::back()->withErrors($validation);
        }

        // validation mdp
        $user->password = Hash::make($password);
        $user->loggedOnce = 1;
        $user->save();
        return Redirect::route('user.edit');
    }



}