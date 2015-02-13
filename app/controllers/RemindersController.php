<?php

class RemindersController extends BaseController {

	/**
	 * Display the password reminder view.
	 *
	 * @return Response
	 */
	public function getRemind()
	{
		return View::make('password.remind');
	}

	/**
	 * Handle a POST request to remind a user of their password.
	 *
	 * @return Response
	 */
	public function postRemind()
	{
		switch ($response = Password::remind(Input::only('email'), function($message){
			$message->subject('ASFL21 Réinitialisation du mot de passe');
		}))
		{
			case Password::INVALID_USER:
				Alert::add("alert-danger", 'Identifiant non valide.');
				return Redirect::back();

			case Password::REMINDER_SENT:
				Alert::add("alert-info", 'Un email de réinitialisation vous a été envoyé.');
				return Redirect::back();
		}
	}

	/**
	 * Display the password reset view for the given token.
	 *
	 * @param  string  $token
	 * @return Response
	 */
	public function getReset($token = null)
	{
		if (is_null($token)) App::abort(404);

		return View::make('password.reset')->with('token', $token);
	}

	/**
	 * Handle a POST request to reset a user's password.
	 *
	 * @return Response
	 */
	public function postReset()
	{
		$credentials = Input::only(
			'email', 'password', 'password_confirmation', 'token'
		);

		$response = Password::reset($credentials, function($user, $password)
		{
			$user->password = Hash::make($password);

			$user->save();
		});

		switch ($response)
		{
			case Password::INVALID_PASSWORD:
			case Password::INVALID_TOKEN:
			case Password::INVALID_USER:
				 Alert::add("alert-danger", 'Identifiant non valide, mot de passe trop court (minimum 6 characters) ou non identique.');
				return Redirect::back();

			case Password::PASSWORD_RESET:
				 Alert::add("alert-info", "Mot de passe réinitialisé, veuillez vous identifier.");
				return Redirect::to('/');
		}
	}

}
