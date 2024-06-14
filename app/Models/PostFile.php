<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'path_file',
        'tipe',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }
}
