<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KPIChartV2 extends Model
{
    use HasFactory;

    protected $fillable = [
        'source',
        'bulan',
        'tahun',
        'rkap',
        'rkap_bulan_ini',
        'realisasi_bulan_ini',
        'realisasi_tahun_lalu',
    ];
}
