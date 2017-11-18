<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'slug', 'user_id', 'category_id',];

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commendable');
    }
}
