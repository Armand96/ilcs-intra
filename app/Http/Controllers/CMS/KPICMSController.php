<?php

namespace App\Http\Controllers\cms;

use App\Exports\KPIExport;
use App\Http\Controllers\Controller;
use App\Imports\KPIImport;
use App\Models\KPIChart;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class KPICMSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = KPIChart::query();

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

        return view('cms.pages.kpi', compact('kpis'));
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
                'reals' => 'required',
            ]);

            $data = $request->only([
                'source',
                'bulan',
                'tahun',
                'rkap',
                'reals',
            ]);

            $kpiExists = KPIChart::where('source', $data['source'])
                        ->where('bulan', $data['bulan'])
                        ->where('tahun', $data['tahun'])
                        ->first();

            if($kpiExists) {
                $kpiExists->update();
            } else {
                KPIChart::create($data);
            }

            return redirect()->back()->with(['notif' => 'Data KPI telah ditambahkan']);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['errors' => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KPIChart  $kpi
     * @return \Illuminate\Http\Response
     */
    public function show(KPIChart $kpi)
    {
        return response()->json($kpi);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KPIChart  $kpi
     * @return \Illuminate\Http\Response
     */
    public function edit(KPIChart $kpi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KPIChart  $kpi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KPIChart $kpi)
    {
        try {
            $request->validate([
                'source' => 'required',
                'bulan' => 'required',
                'tahun' => 'required',
                'rkap' => 'required',
                'reals' => 'required',
            ]);

            $data = $request->only([
                'source',
                'bulan',
                'tahun',
                'rkap',
                'reals',
            ]);

           $kpi->update($data);
            return redirect()->back()->with(['notif' => 'Data KPI telah diperbarui']);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['errors' => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KPIChart  $kpi
     * @return \Illuminate\Http\Response
     */
    public function destroy(KPIChart $kpi)
    {
        try {
            $kpi->delete();
            return redirect()->back()->with(['notif' => 'Data KPI telah dihapus']);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['errors' => $th->getMessage()]);
        }
    }

    public function uploadCSV(Request $request)
    {
        $request->validate([
            'file' => 'required',
        ]);

        try {
            if ($request->hasFile('file')) {
                // $fileName = $request->file('file')->getClientOriginalName();
                // $request->file->storeAs('public/kpi/', $fileName);
                // $filePath = storage_path('public/kpi/'.$fileName);
                // dd($filePath);

                Excel::import(new KPIImport, $request->file('file'));
                // Storage::delete("public/kpi/$fileName");
            }
            return redirect()->back()->with(['notif' => 'Data KPI telah diupload']);
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->back()->withErrors(['errors' => $th->getMessage()]);
        }
    }

    public function downloadTemplate()
    {
        try {
            return Excel::download(new KPIExport, 'template_kpi.xlsx');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
