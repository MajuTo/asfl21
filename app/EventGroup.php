<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Group
 * @package App
 * @mixin Eloquent
 */
class EventGroup extends Model
{
    protected $guarded = [];

    public function events(): HasMany
    {
        return $this->hasMany(Event::class, 'group_id', 'id');
    }

}
