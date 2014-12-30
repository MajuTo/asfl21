<?php

/**
* Group
*/
class Group extends Eloquent {

	protected $table      = 'Group';
	protected $primaryKey = 'idGroup';
	public $timestamps = false;

	public function users(){
		return $this->hasMany('User');
	}

}
