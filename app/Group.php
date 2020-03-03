<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Group
 * @package App
 * @mixin Eloquent
 */
class Group extends Model
{
	public $timestamps    = false;

	public function users()
    {
		return $this->hasMany(User::class);
	}

}
