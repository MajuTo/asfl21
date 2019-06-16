<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * Class File
 * @package App
 * @mixin Eloquent
 */
class File extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
