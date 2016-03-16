<?php

class BaseController extends Controller {

	public function __construct() {
		if ( !in_array( Route::currentRouteName(), ['admin.adresse.create', 'admin.adresse.store'] ) ) {
			Session::forget('user_id');
		}
	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	/**
	 * Check if the request is prefixed by admin.
	 *
	 * @return boolean
	 */
	protected function isAdminRequest()
    {
        return (Route::getCurrentRoute()->getPrefix() == '/admin');
    }

}
