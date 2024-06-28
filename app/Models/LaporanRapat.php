<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanRapat extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_id',
        'nama_laporan',
        'file_path',
        'tgl_laporan'
    ];

    public function kategori()
    {
        return $this->belongsTo(LaporanRapatKategori::class, 'kategori_id', 'id');
    }
}
