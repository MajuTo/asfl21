<?php

/**
* Category
*/
class Category extends Eloquent {

	public $timestamps    = false;

	public function messages(){
		return $this->hasMany('Message');
	}

}
