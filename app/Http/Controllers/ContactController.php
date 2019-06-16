<?php

namespace App\Http\Controllers;

use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view()->make('contact.index');
    }

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
            return redirect()->route('contact.index')->withErrors($validation)->withInput();
        } else {
            $subject = (request()->get('pro')) ? '[PRO] ' : '';
            $subject .= request()->get('subject');
            Mail::send('emails.contact', ['inputs' => request()->all()], function(Message $m) use ($subject){
                $m->to('majuto@free.fr')->subject($subject)->from(request()->get('email'), request()->get('name'));
//                $m->to('contact@asfl21.fr')->subject($subject)->from(request()->get('email'), request()->get('name'));
            });
            return view()->make('contact.index');
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
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
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
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


}