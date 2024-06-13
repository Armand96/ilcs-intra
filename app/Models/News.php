<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'posted_by',
        'image_cover',
        'content',
        'is_active'
    ];

    public function poster()
    {
        return $this->belongsTo(User::class, 'posted_by', 'id');
    }
}
