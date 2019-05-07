<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public $timestamps    = false;
    protected $fillable	  = ['activityName', 'activityDesc'];

    public function users()
    {
        return $this->belongsToMany('User');
    }
}
