<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\LaporanRapat;
use App\Models\LaporanRapatKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporanRapatCMSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = LaporanRapat::query();

        if ($request->filled('nama_laporan')) {
            $query->where('nama_laporan', 'like', '%' . $request->judul . '%');
        }

        if ($request->filled('kategori')) {
            $query->whereHas('kategori', function ($q) use ($request) {
                $q->where('kategori_name', 'like', '%' . $request->kategori . '%');
            });
        }

        $laporanRapats = $query->paginate(10);
        $kategoris = LaporanRapatKategori::all();

        foreach ($laporanRapats as $key => $reg) {
            if (Storage::disk('public')->exists("laporan_rapat/" . $reg->file_path)) {
                $laporanRapats[$key]->file_size = number_format(Storage::disk('public')->size("laporan_rapat/" . $reg->file_path) / 1000000, 2);
                $reg->file_path = Storage::disk('public')->url('laporan_rapat/'.$reg->file_path);
            } else {
                $laporanRapats[$key]->file_size = '0.00';
            }
        }

        return view('cms.pages.laporan_rapat', compact('laporanRapats', 'kategoris'));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // dd($request->all());
            $request->validate([
                'kategori_id' => 'required',
                'nama_laporan' => 'required',
                'tgl_laporan' => 'required'
            ]);

            $data = $request->only([
                'kategori_id',
                'nama_laporan',
                'tgl_laporan'
            ]);

            if ($request->hasFile('file')) {

                $fileName = time() . '.' . $request->file->extension();
                $request->file->storeAs('public/laporan_rapat/', $fileName);
                $data['file_path'] = $fileName;
            } else {
                $data['file_path'] = "";
            }

            LaporanRapat::create($data);
            return redirect()->back()->with(['notif' => 'Laporan Rapat telah dibuat']);
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->back()->withErrors(['errors' => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LaporanRapat $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(LaporanRapat $laporan)
    {
        return response()->json($laporan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LaporanRapat $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit(LaporanRapat $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LaporanRapat $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LaporanRapat $laporan)
    {
        $request->validate([
            'kategori_id' => 'required',
            'nama_laporan' => 'required',
            'tgl_laporan' => 'required'
        ]);

        $data = $request->only([
            'kategori_id',
            'nama_laporan',
            'tgl_laporan'
        ]);

        try {
            if ($request->hasFile('file')) {

                $isExist = Storage::disk('public')->exists("laporan_rapat/$laporan->file_path") ?? false;
                if ($isExist) Storage::delete("public/laporan_rapat/$laporan->file_path");

                $filePath = time() . '.' . $request->file->extension();
                $request->file->storeAs('public/laporan_rapat/', $filePath);
                $data['file_path'] = $filePath;
            }

            $laporan->update($data);
            return redirect()->back()->with(['notif' => 'Laporan Rapat telah diupdate']);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['errors' => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LaporanRapat  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy(LaporanRapat $laporan)
    {
        try {
            if ($laporan->file_path != null) {

                Storage::disk('public')->exists("laporan_rapat/$laporan->file_path");
                Storage::delete("public/laporan_rapat/$laporan->file_path");
            }

            $laporan->delete();

            return redirect()->back()->with(['notif' => 'Laporan Rapat telah dihapus']);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['notif' => $th->getMessage()]);
        }
    }
}
