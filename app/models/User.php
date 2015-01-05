<?php

/**
* User
*/
class User extends Eloquent {

	protected $table      = 'User';
	protected $primaryKey = 'idUser';

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
