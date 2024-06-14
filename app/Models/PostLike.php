<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostLike extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
        'comment_id',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

    public function userComment()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class, 'comment_id', 'id');
    }
}
