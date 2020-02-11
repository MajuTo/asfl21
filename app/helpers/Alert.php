<?php

namespace App\Helpers;

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
	 	self::sendToSession();
	 }

	 private static function sendToSession()
	 {
	 	if(session()->has('alert'))
	 	{
	 		session()->remove('alert');
	 	}

	 	session()->flash('alert', self::$session);
	 }

	 public static function clear()
	 {
	 	self::$session = [];
	 	if(session()->has('alert'))
	 	{
	 		session()->remove('alert');
	 	}
	 }

}
