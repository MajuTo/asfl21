<?php

/**
* Group
*/
class Group extends Eloquent {

	public $timestamps    = false;

	public function users(){
		return $this->hasMany('User');
	}

}
