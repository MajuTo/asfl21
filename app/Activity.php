<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Activity
 * @package App
 * @mixin Eloquent
 */
class Activity extends Model
{
    public $timestamps    = false;
    protected $fillable	  = ['activityName', 'activityDesc'];

    public function users()
    {
        return $this->belongsToMany('User');
    }
}
