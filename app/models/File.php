<?php

/**
* File
*/
class File extends Eloquent {


	public function user(){
		return $this->belongsTo('User');
	}

}
