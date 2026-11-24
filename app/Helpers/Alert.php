<?php

namespace App\Helpers;

class Alert
{
	private static array $session = [];

	public static function add($class, $message): void
	 {
	 	if(is_null(self::$session))
	 	{
	 		self::clear();
	 	}
	 	self::$session[] = ['class' => $class, 'message' => $message];
	 	self::sendToSession();
	 }

	 private static function sendToSession(): void
	 {
	 	if(session()->has('alert'))
	 	{
	 		session()->remove('alert');
	 	}

	 	session()->flash('alert', self::$session);
	 }

	 public static function clear(): void
	 {
	 	self::$session = [];
	 	if(session()->has('alert'))
	 	{
	 		session()->remove('alert');
	 	}
	 }

}
