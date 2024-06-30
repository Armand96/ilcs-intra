<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PostLike extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
        'comment_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->lessField();
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class, 'comment_id', 'id');
    }

    public function scopeLimitLikers(Builder $query)
    {
        return $query->orWhere('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->limit(2);
    }

    public function scopePostLikers(Builder $query)
    {
        return $query->where('comment_id', null)->orWhere('user_id', Auth::user()->id)->orderByRaw('CASE WHEN user_id = '.Auth::user()->id.' THEN 0 ELSE 1 END')->orderBy('created_at', 'desc')->limit(2);
    }

    public function scopeCommentLikers(Builder $query)
    {
        return $query->where('comment_id', "!=", null);
    }
}
