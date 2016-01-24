<?php

/**
* Category
*/
class Address extends Eloquent {

	public $timestamps    = false;
	protected $fillable	  = ['address', 'zipCode', 'phone', 'city', 'name', 'description', 'hidePhone', 'fax', 'hideFax'];


	public function user(){
		return $this->belongsTo('User');
	}

}