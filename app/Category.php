<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App
 * @mixin Eloquent
 */
class Category extends Model {

	public $timestamps    = false;

	public function messages()
    {
		return $this->hasMany(Message::class);
	}

}
