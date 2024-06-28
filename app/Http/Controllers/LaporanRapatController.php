<?php

namespace App\Http\Controllers;

use App\Models\LaporanRapat;
use App\Models\LaporanRapatKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LaporanRapatController extends Controller
{
    public function laporanRapat()
    {
        $kategoris = LaporanRapatKategori::all();
        $laporans = LaporanRapat::orderBy('kategori_id', 'ASC')->get();
        $year = DB::select(DB::raw("SELECT YEAR(tgl_laporan) as tahun_laporan FROM laporan_rapats GROUP BY tahun_laporan"));

        foreach ($laporans as $key => $reg) {
            if (Storage::disk('public')->exists("laporan_rapat/" . $reg->file_path)) {
                $laporans[$key]->file_size = number_format(Storage::disk('public')->size("laporan_rapat/" . $reg->file_path) / 1000000, 2);
                $reg->file_path = Storage::disk('public')->url('laporan_rapat/'.$reg->file_path);
            } else {
                $laporans[$key]->file_size = '0.00';
            }
        }

        return view('intranet.pages.laporan_management', compact('kategoris', 'laporans', 'year'));
    }
}
