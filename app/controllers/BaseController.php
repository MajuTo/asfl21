<?php

class BaseController extends Controller {

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
