<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\KPIChartV2;
use Illuminate\Http\Request;

class KPIV2CMSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = KPIChartV2::query();

        if ($request->filled('source')) {
            $query->where('source', 'like', '%' . $request->source . '%');
        }
        if ($request->filled('bulan')) {
            $query->where('bulan', 'like', '%' . $request->bulan . '%');
        }
        if ($request->filled('tahun')) {
            $query->where('tahun', 'like', '%' . $request->tahun . '%');
        }

        $kpis = $query->paginate(10);

        return view('cms.pages.kpiv2', compact('kpis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'source' => 'required',
                'bulan' => 'required',
                'tahun' => 'required',
                'rkap' => 'required',
                'rkap_bulan_ini' => 'required',
                'realisasi_bulan_ini' => 'required',
                'realisasi_tahun_lalu' => 'required',
            ]);

            $data = $request->only([
                'source',
                'bulan',
                'tahun',
                'rkap',
                'rkap_bulan_ini',
                'realisasi_bulan_ini',
                'realisasi_tahun_lalu',
            ]);

            $data['rkap'] = str_replace(".", "", $data['rkap']);
            $data['rkap_bulan_ini'] = str_replace(".", "", $data['rkap_bulan_ini']);
            $data['realisasi_bulan_ini'] = str_replace(".", "", $data['realisasi_bulan_ini']);
            $data['realisasi_tahun_lalu'] = str_replace(".", "", $data['realisasi_tahun_lalu']);

            // #RYAN change
            $data['rkap'] = str_replace(",", ".", $data['rkap']);
            $data['rkap_bulan_ini'] = str_replace(",", ".", $data['rkap_bulan_ini']);
            $data['realisasi_bulan_ini'] = str_replace(",", ".", $data['realisasi_bulan_ini']);
            $data['realisasi_tahun_lalu'] = str_replace(",", ".", $data['realisasi_tahun_lalu']);

            $kpiExists = KPIChartV2::where('source', $data['source'])
                ->where('bulan', $data['bulan'])
                ->where('tahun', $data['tahun'])
                ->first();

            if ($kpiExists) {
                $kpiExists->update($data);
            } else {
                KPIChartV2::create($data);
            }

            return redirect()->back()->with(['notif' => 'Data KPI telah ditambahkan']);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['errors' => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KPIChartV2  $kpi
     * @return \Illuminate\Http\Response
     */
    public function show(KPIChartV2 $kpi)
    {
        return response()->json($kpi);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KPIChartV2  $kpi
     * @return \Illuminate\Http\Response
     */
    public function edit(KPIChartV2 $kpi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KPIChartV2  $kpi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KPIChartV2 $kpi)
    {
        try {
            $request->validate([
                'source' => 'required',
                'bulan' => 'required',
                'tahun' => 'required',
                'rkap' => 'required',
                'rkap_bulan_ini' => 'required',
                'realisasi_bulan_ini' => 'required',
                'realisasi_tahun_lalu' => 'required',
            ]);

            $data = $request->only([
                'source',
                'bulan',
                'tahun',
                'rkap',
                'rkap_bulan_ini',
                'realisasi_bulan_ini',
                'realisasi_tahun_lalu',
            ]);

            $data['rkap'] = str_replace(".", "", $data['rkap']);
            $data['rkap_bulan_ini'] = str_replace(".", "", $data['rkap_bulan_ini']);
            $data['realisasi_bulan_ini'] = str_replace(".", "", $data['realisasi_bulan_ini']);
            $data['realisasi_tahun_lalu'] = str_replace(".", "", $data['realisasi_tahun_lalu']);

            // #Ryan Change
            $data['rkap'] = str_replace(",", ".", $data['rkap']);
            $data['rkap_bulan_ini'] = str_replace(",", ".", $data['rkap_bulan_ini']);
            $data['realisasi_bulan_ini'] = str_replace(",", ".", $data['realisasi_bulan_ini']);
            $data['realisasi_tahun_lalu'] = str_replace(",", ".", $data['realisasi_tahun_lalu']);

            $kpi->update($data);
            return redirect()->back()->with(['notif' => 'Data KPI telah ditambahkan']);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['errors' => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KPIChartV2  $kpi
     * @return \Illuminate\Http\Response
     */
    public function destroy(KPIChartV2 $kpi)
    {
        try {
            $kpi->delete();
            return redirect()->back()->with(['notif' => 'Data KPI telah dihapus']);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['errors' => $th->getMessage()]);
        }
    }
}
