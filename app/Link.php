<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable	  = ['linkName', 'link', 'address', 'zipCode', 'city', 'phone'];
}
