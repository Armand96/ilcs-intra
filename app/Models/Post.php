<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'posted_by',
        'total_like',
        'total_view'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    public function postedBy()
    {
        return $this->belongsTo(User::class, 'posted_by', 'id')->lessField();
    }
}
