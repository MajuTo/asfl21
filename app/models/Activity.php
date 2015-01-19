<?php

/**
* Activity
*/
class Activity extends Eloquent {

    public $timestamps    = false;

    public function users(){
        return $this->belongsToMany('User');
    }

}
