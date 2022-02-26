<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Group
 * @package App
 * @mixin Eloquent
 */
class Group extends Model
{
	public $timestamps    = false;

	public function users(): HasMany
    {
		return $this->hasMany(User::class);
	}

}
