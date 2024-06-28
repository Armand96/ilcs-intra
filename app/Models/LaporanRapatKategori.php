<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanRapatKategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kategori'
    ];

    public function laporans()
    {
        return $this->hasMany(LaporanRapat::class, 'kategori_id', 'id');
    }
}
