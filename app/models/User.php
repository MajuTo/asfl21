<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

/**
* User
*/
class User extends Eloquent implements UserInterface, RemindableInterface {
    use UserTrait, RemindableTrait;


	// Eventuellement a changer pour prod
	// besoin pour tinker => SessionsController@createUser
	protected $fillable	  = ['name', 'firstname', 'username', 'password', 'email', 'hideEmail', 'phone', 'hidePhone', 'mobile', 'hideMobile', 'fax', 'hideFax', 'address', 'zipCode', 'city', 'group_id'];

	public function messages(){
		return $this->hasMany('Message');
	}

	public function files(){
		return $this->hasMany('File');
	}

	public function group(){
		return $this->belongsTo('Group');
	}

	public function activities(){
		return $this->belongsToMany('Activity');
	}

}
