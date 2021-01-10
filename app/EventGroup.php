<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventGroup extends Model
{
    protected $guarded = [];

    public function events()
    {
        return $this->hasMany(Event::class, 'group_id', 'id');
    }

}
