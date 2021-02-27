<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Group
 * @package App
 * @mixin Eloquent
 */
class Event extends Model
{
    protected $guarded = [];

    public function group ()
    {
        return $this->belongsTo(EventGroup::class, 'group_id', 'id');
    }
}
