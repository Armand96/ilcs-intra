<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiKaryawan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nilai',
        'tgl_penilaian',
    ];

    public function karyawan()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
