<?php

/**
* Activity
*/
class Activity extends Eloquent {

    public $timestamps    = false;
    protected $fillable	  = ['activityName', 'activityDesc'];

    public function users(){
        return $this->belongsToMany('User');
    }

}
