<?php

namespace App\Imports;

use App\Models\KPIChart;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KPIImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $kpi = KPIChart::where('source', $row['source'])->where('bulan', $row['bulan'])->where('tahun', $row['tahun'])->first();
        if($kpi) {
            $kpi->rkap = $row['rkap'] ? $row['rkap'] : 0;
            $kpi->reals = $row['reals'] ? $row['reals'] : 0;
            $kpi->update();
            return $kpi;
        } else {
            return new KPIChart(array(
                'source' => $row['source'],
                'bulan' => $row['bulan'],
                'tahun' => $row['tahun'],
                'rkap' => $row['rkap'] ? $row['rkap'] : 0,
                'reals' => $row['reals'] ? $row['reals'] : 0,
            ));
        }
    }
}
