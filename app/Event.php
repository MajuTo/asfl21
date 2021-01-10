<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [];

    public function group ()
    {
        return $this->belongsTo(EventGroup::class, 'group_id', 'id');
    }
}
