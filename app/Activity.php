<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Activity
 * @package App
 * @mixin Eloquent
 */
class Activity extends Model
{
    public $timestamps    = false;
    protected $fillable	  = ['activityName', 'activityDesc'];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
