<?php

namespace App\Models;

use App\Http\Filters\PostFilter;
use App\Models\Traits\HasFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasFilter;

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

//    public function likedByProfiles(): BelongsToMany
//    {
//        return  $this->belongsToMany(Profile::class, 'post_profile_likes');
//    }

    public function likedByProfiles()
    {
        return $this->morphToMany(Profile::class, 'likeable');
    }
    // belongsTo
    // hasOne
    // hasMany
    // belongsToMany

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }


    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

}
