<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Group
 * @package App
 * @mixin Eloquent
 */
class Event extends Model
{
    protected $guarded = [];

    public function group (): BelongsTo
    {
        return $this->belongsTo(EventGroup::class, 'group_id', 'id');
    }
}
