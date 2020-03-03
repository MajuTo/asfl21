<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Partner
 * @package App
 * @mixin Eloquent
 */
class Partner extends Model
{
    protected $fillable	  = ['partnerName', 'logo', 'contact'];
}
