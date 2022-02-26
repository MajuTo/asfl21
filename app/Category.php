<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Category
 * @package App
 * @mixin Eloquent
 */
class Category extends Model {

	public $timestamps    = false;

	public function messages(): HasMany
    {
		return $this->hasMany(Message::class);
	}

}
