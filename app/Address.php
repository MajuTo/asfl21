<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public $timestamps    = false;
    protected $fillable	  = ['address', 'zipCode', 'phone', 'city', 'name', 'description', 'hidePhone', 'fax', 'hideFax'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
