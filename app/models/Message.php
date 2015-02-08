<?php

/**
* Message
*/
class Message extends Eloquent {


	public function category(){
		return $this->belongsTo('Category');
	}

	public function user(){
		return $this->belongsTo('User');
	}

}
