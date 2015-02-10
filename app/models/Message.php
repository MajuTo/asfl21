<?php

/**
* Message
*/
class Message extends Eloquent {

	protected $fillable	  = ['title', 'content', 'category_id', 'user_id'];

	public function category(){
		return $this->belongsTo('Category');
	}

	public function user(){
		return $this->belongsTo('User');
	}

}
