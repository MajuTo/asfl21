<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Message
 * @package App
 * @mixin Eloquent
 */
class Message extends Model
{
    protected $fillable	  = ['title', 'content', 'category_id', 'user_id'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
