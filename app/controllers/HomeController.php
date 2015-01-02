<?php

class HomeController extends BaseController {

	 /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.index';

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function home()
	{
		$this->layout->content = View::make('hello');
	}

	public function contact()
	{
		$this->layout->content = View::make('contact');
	}

	public function sendcontact()
	{
		$regles = array(
			'name' => 'required|min:5|max:20',
			'email' => 'required|email',
			'subject' => 'required|max:250',
			'message' => 'required|max:250'
		);

		$validation = Validator::make(Input::all(), $regles);

		if ($validation->fails()) {
		  	return Redirect::to('contact')->withErrors($validation)->withInput();
		} else {
			Mail::send('emails.contact', ['inputs' => Input::all()], function($m)	{
				$m->to('majuto@free.fr')->subject(Input::get('subject'))->from(Input::get('email'), Input::get('name'));
			});
			return View::make('contact');
		}
	}

	public function def()
	{
		$this->layout->content = View::make('default');
	}

}
