<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
        'parent_comment_id',
        'comment',
    ];

    protected $hidden = [
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_comment_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->lessField();
    }

    public function likers()
    {
        return $this->hasMany(PostLike::class, 'comment_id', 'id');
    }

    public function scopeNotRepeat(Builder $query)
    {
        return $query->where('parent_comment_id', null); // filter
    }
}
