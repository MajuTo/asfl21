<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Message
 * @package App
 * @mixin Eloquent
 */
class Message extends Model
{
    protected $fillable	  = ['title', 'content', 'category_id', 'user_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
