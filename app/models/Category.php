<?php

/**
* Category
*/
class Category extends Eloquent {

	protected $table      = 'Category';
	protected $primaryKey = 'idCategory';
	public $timestamps    = false;

	public function messages(){
		return $this->hasMany('Message', 'Category_idCategory', 'idCategory');
	}

}
