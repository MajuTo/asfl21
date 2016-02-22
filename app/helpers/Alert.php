<?php

// use \Session;

class Alert
{
	private static $session = [];

	public static function add($class, $message)
	 {
	 	if(is_null(self::$session))
	 	{
	 		self::clear();
	 	}
	 	array_push(self::$session, ['class' => $class, 'message' => $message]);
	 	//Session::remove('alert');
	 	//Session::push('alert', ['class' => $class, 'message' => $message]);
	 	self::sendToSession();
	 }

	 private static function sendToSession()
	 {
	 	if(Session::has('alert'))
	 	{
	 		Session::remove('alert');
	 	}

	 	Session::flash('alert', self::$session);
	 }

	 public static function clear()
	 {
	 	self::$session = [];
	 	if(Session::has('alert'))
	 	{
	 		Session::remove('alert');
	 	}
	 }

}