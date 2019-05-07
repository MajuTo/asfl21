<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
* Category
*/
class Category extends Model {

	public $timestamps    = false;

	public function messages()
    {
		return $this->hasMany('Message');
	}

}
