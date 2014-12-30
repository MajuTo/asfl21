<?php

/**
* File
*/
class File extends Eloquent {

	protected $table      = 'File';
	protected $primaryKey = 'idFile';

	public function user(){
		return $this->belongsTo('User');
	}

}
