<?php

class HomeController extends BaseController {

	 /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.index';


	public function home()
	{
		return View::make('hello');
	}

	public function contact()
	{
		return View::make('contact');
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

	public function activities()
	{
		$activities = Activity::with('users')->paginate(4);
		$a = User::find(1);
		return View::make('activities.index', ['activities' => $activities, 'a' => $a]);
	}

}
