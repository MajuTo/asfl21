<?php

/**
* Message
*/
class Message extends Eloquent {

	protected $table      = 'Message';
	protected $primaryKey = 'idMessage';

	public function category(){
		return $this->belongsTo('Category');
	}

	public function user(){
		return $this->belongsTo('User');
	}

}
