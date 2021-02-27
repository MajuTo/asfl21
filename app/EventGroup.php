<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Group
 * @package App
 * @mixin Eloquent
 */
class EventGroup extends Model
{
    protected $guarded = [];

    public function events()
    {
        return $this->hasMany(Event::class, 'group_id', 'id');
    }

}
