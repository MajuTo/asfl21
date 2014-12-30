<?php

/**
* User
*/
class User extends Eloquent {

	protected $table      = 'User';
	protected $primaryKey = 'idUser';

	public function messages(){
		return $this->hasMany('Message');
	}

	public function files(){
		return $this->hasMany('File');
	}

	public function group(){
		return $this->belongsTo('Group');
	}

}
