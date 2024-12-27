<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
//    public function post(): BelongsTo
//    {
//        return $this->belongsTo(Post::class);
//    }

    public function post()
    {
        return $this->morphTo('commentable');
    }

    public function category(): BelongsTo
    {
        return $this->post->category();
    }
}
