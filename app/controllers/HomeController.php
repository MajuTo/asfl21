<?php

class HomeController extends BaseController {

	 /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.index';


	public function home()
	{
		return View::make('accueil.home');
	}

}
