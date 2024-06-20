<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'name',
        'nip',
        'role_id',
        'email',
        'password',
        'jabatan',
        'sub_jabatan',
        'tgl_lahir',
        'tgl_masuk',
        'tgl_keluar',
        'image_user',
        'jabatan',
        'dept',
        'divisi',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function nilai()
    {
        return $this->hasMany(NilaiKaryawan::class, 'user_id', 'id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'notif_to_user_id', 'id');
    }

    public function chats()
    {
        return $this->hasMany(Chat::class, 'from_user_id', 'id');
    }

    /* SCOPE */
    public function scopeLessField(Builder $query)
    {
        return $query->select('id', 'name', 'image_user'); // Specify the columns you want
    }
}
