<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Link
 * @package App
 * @mixin Eloquent
 */
class Link extends Model
{
    protected $fillable	  = ['linkName', 'link', 'address', 'zipCode', 'city', 'phone'];
}
