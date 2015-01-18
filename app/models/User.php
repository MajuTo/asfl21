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

	protected $table      = 'User';
	protected $primaryKey = 'idUser';

	// Eventuellement a changer pour prod
	// besoin pour tinker => SessionsController@createUser
	protected $fillable	  = ['name', 'firstName', 'username', 'password', 'email', 'phone', 'mobile', 'fax', 'address', 'zipCode', 'city', 'Group_idGroup'];

	public function messages(){
		return $this->hasMany('Message', 'User_idUser', 'idUser');
	}

	public function files(){
		return $this->hasMany('File', 'User_idUser', 'idUser');
	}

	public function group(){
		return $this->belongsTo('Group', 'Group_idGroup', 'idGroup');
	}

}
