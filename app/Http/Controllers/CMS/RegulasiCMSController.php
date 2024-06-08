<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Regulasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RegulasiCMSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Regulasi::query();

        if ($request->filled('judul')) {
            $query->where('judul', 'like', '%' . $request->judul . '%');
        }

        $regulasis = $query->paginate(10);

        foreach ($regulasis as $key => $reg) {
            if (Storage::disk('public')->exists("regulasi/" . $reg->file_path)) {
                $regulasis[$key]->file_size = number_format(Storage::disk('public')->size("regulasi/" . $reg->file_path) / 1000000, 2);
                $reg->file_path = Storage::disk('public')->url('regulasi/'.$reg->file_path);
            } else {
                $regulasis[$key]->file_size = '0.00';
            }
        }

        return view('cms.pages.regulasi', compact('regulasis'));
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
            // dd($request->all());
            $request->validate([
                'judul' => 'required',
                'deskripsi' => 'required',
            ]);

            $data = $request->only([
                'judul',
                'deskripsi'
            ]);

            if ($request->hasFile('file')) {

                $fileName = time() . '.' . $request->file->extension();
                $request->file->storeAs('public/regulasi/', $fileName);
                $data['file_path'] = $fileName;
            }

            Regulasi::create($data);
            return redirect()->back()->with(['notif' => 'Regulasi telah dibuat']);
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->back()->withErrors(['errors' => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Regulasi $regulasi)
    {
        return $regulasi;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Regulasi $regulasi)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        $data = $request->only([
            'judul',
            'deskripsi',
        ]);

        try {
            if ($request->hasFile('file')) {

                $isExist = Storage::disk('public')->exists("regulasi/$regulasi->file_path") ?? false;
                if ($isExist) Storage::delete("public/regulasi/$regulasi->file_path");

                $filePath = time() . '.' . $request->file->extension();
                $request->file->storeAs('public/regulasi', $filePath);
                $data['file_path'] = $filePath;
            }

            $regulasi->update($data);
            return redirect()->back()->with(['notif' => 'Regulasi telah diupdate']);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['errors' => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Regulasi $regulasi)
    {
        try {
            if ($regulasi->file_path != null) {

                Storage::disk('public')->exists("regulasi/$regulasi->file_path");
                Storage::delete("public/regulasi/$regulasi->file_path");
            }

            $regulasi->delete();

            return redirect()->back()->with(['notif' => 'Regulasi telah dihapus']);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['notif' => $th->getMessage()]);
        }
    }
}
