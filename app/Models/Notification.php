<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'notif_from_user_id',
        'notif_to_user_id',
        'notif_title',
        'notif_description',
        'read_at',
        'link',
    ];

    public function userSent()
    {
        return $this->belongsTo(User::class, 'notif_to_user_id', 'id')->lessField();
    }

    public function userFrom()
    {
        return $this->belongsTo(User::class, 'notif_from_user_id', 'id')->lessField();
    }
}
