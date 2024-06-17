<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KPIChart extends Model
{
    use HasFactory;

    protected $fillable = [
        'source',
        'bulan',
        'tahun',
        'rkap',
        'reals',
    ];
}
