<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplyComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'reply_comment',
        'post_id',
        'main_comment_id',
    ];
}
