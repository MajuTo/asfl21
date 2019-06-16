<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Address
 * @package App
 * @mixin Eloquent
 */
class Address extends Model
{
    public $timestamps    = false;
    protected $fillable	  = ['address', 'zipCode', 'phone', 'city', 'name', 'description', 'hidePhone', 'fax', 'hideFax'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
