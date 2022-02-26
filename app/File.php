<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class File
 * @package App
 * @mixin Eloquent
 */
class File extends Model
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
