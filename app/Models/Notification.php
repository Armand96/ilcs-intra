<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        "notif_to_user_id",
        "notif_description",
        "is_read",
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'notif_to_user_id', 'id');
    }
}
