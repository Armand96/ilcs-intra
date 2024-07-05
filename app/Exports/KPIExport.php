<?php

namespace App\Exports;

use App\Models\KPIChart;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KPIExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return KPIChart::select(['id', 'source', 'bulan', 'tahun', 'rkap', 'reals'])->limit(5)->get();
    }

    public function headings(): array
    {
        return [
            'id',
            'source',
            'bulan',
            'tahun',
            'rkap',
            'reals',
        ];
    }
}
