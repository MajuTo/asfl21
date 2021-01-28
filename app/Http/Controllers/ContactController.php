<?php

namespace App\Http\Controllers;

use App\Helpers\Alert;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Mail\Message;
use Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     * @throws BindingResolutionException
     */
    public function index()
    {
        return view()->make('contact.index');
    }

    /**
     * @return View|RedirectResponse|mixed
     * @throws BindingResolutionException
     */
    public function sendcontact()
    {
        $rules = array(
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required|max:250',
            'message' => 'required|max:250'
        );

        $validation = validator()->make(request()->all(), $rules);

        if ($validation->fails()) {
            Alert::add("alert-danger", "Il y a un problème dans votre formulaire");
            return redirect()->route('contact.index')->withErrors($validation)->withInput();
        } else {
            $subject = (request()->get('pro')) ? '[PRO] ' : '';
            $subject .= request()->get('subject');
            Mail::send('emails.contact', ['inputs' => request()->all()], function(Message $m) use ($subject){
//                $m->to('majuto@free.fr')->subject($subject)->from(request()->get('email'), request()->get('name'));
                $m->to(env('CONTACT_MAIL'))->subject($subject)->from(request()->get('email'), request()->get('name'));
            });

            Alert::add("alert-success", "Votre message a bien été envoyé");

            return view()->make('contact.index');
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store()
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return void
     */
    public function show(int $id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return void
     */
    public function edit(int $id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return void
     */
    public function update(int $id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return void
     */
    public function destroy(int $id)
    {
        //
    }


}
