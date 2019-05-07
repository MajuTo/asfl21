<?php

namespace App\Http\Controllers;

use App\Helpers\Alert;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SessionsController extends Controller {

    /**
     * Show the form for creating a new resource.
     * GET /sessions/create
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        if (Auth::check()) {
            return redirect()->route('admin.index');
        }
        return view('login.index');
    }

    /**
     * Store a newly created resource in storage.
     * POST /sessions
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        // recupere userinput
        $input = request()->all();

        // validation form
        $rules = [
            'username'  => 'required',
            'password'  => 'required',
        ];

        $validation = validator()->make($input, $rules);

        if ($validation->fails()) {
            return back()->withErrors($validation)->withInput();
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
            if (!$user->active) {
                Alert::add('alert-danger', "Votre compte est désactivé, vous ne pouvez pas vous identifier.");
                Auth::logout();
                return redirect()->route('home');
            }
            if ($user->loggedOnce == 0) {
                return redirect()->route('sessions.edit', [$user->id]);
            }
            return redirect()->route('message.index');
        }

        Alert::add("alert-danger", "Identifiant ou mot de passe non valide.");
        return redirect()->back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy()
    {
        Auth::logout();
        return redirect()->route('home');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        if ($id != Auth::id()) {
            return redirect()->Route('sessions.edit', [Auth::id()]);
        }

        $user = User::find(Auth::id());
        return view('login.change', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update()
    {
        $user        = User::find(Auth::id());
        $password    = request('password');

        // validation form
        $rules = [
            'password'              => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
        ];

        $validation = validator()->make(request()->all(), $rules);

        if ($validation->fails()) {
            Alert::add("alert-danger", "Votre nouveau mot de passe n'a pas été enregistré");
            return redirect()->back()->withErrors($validation);
        }

        // validation mdp
        $user->password = Hash::make($password);
        $user->loggedOnce = 1;
        $user->save();

        Alert::add("alert-success", "Votre nouveau mot de passe a bien été enregistré");
        return redirect()->route('user.edit', Auth::user()->id);
    }



}