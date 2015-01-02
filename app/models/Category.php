<?php

/**
* Category
*/
class Category extends Eloquent {

	protected $table      = 'Category';
	protected $primaryKey = 'idCateogory';
	public $timestamps    = false;

	public function messages(){
		return $this->hasMany('Message');
	}

}
