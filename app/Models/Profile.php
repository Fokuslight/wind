<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Profile extends Model
{
//    public function likedPosts(): BelongsToMany
//    {
//        return  $this->belongsToMany(Post::class, 'post_profile_likes');
//    }


    // belongsTo
    // hasOne
    // hasMany
    // belongsToMany
    public function likedPosts()
    {
        return $this->morphedByMany(Post::class, 'likeable');
    }
}
