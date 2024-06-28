<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Knowledge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KnowledgeCMSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Knowledge::query();

        if ($request->filled('judul')) {
            $query->where('judul', 'like', '%' . $request->judul . '%');
        }

        $knowledges = $query->paginate(10);

        foreach ($knowledges as $key => $reg) {
            if (Storage::disk('public')->exists("knowledge/" . $reg->file_path)) {
                $knowledges[$key]->file_size = number_format(Storage::disk('public')->size("knowledge/" . $reg->file_path) / 1000000, 2);
                $reg->file_path = Storage::disk('public')->url('knowledge/'.$reg->file_path);
            } else {
                $knowledges[$key]->file_size = '0.00';
            }
        }

        return view('cms.pages.knowledge', compact('knowledges'));
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
                'description' => 'required',
            ]);

            $data = $request->only([
                'judul',
                'description'
            ]);

            if ($request->hasFile('file')) {

                $fileName = time() . '.' . $request->file->extension();
                $request->file->storeAs('public/knowledge/', $fileName);
                $data['file_path'] = $fileName;
            } else {
                $data['file_path'] = "";
            }

            Knowledge::create($data);
            return redirect()->back()->with(['notif' => 'Knowledge telah dibuat']);
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->back()->withErrors(['errors' => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Knowledge  $knowledge
     * @return \Illuminate\Http\Response
     */
    public function show(Knowledge $knowledge)
    {
        return response()->json($knowledge);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Knowledge  $knowledge
     * @return \Illuminate\Http\Response
     */
    public function edit(Knowledge $knowledge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Knowledge  $knowledge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Knowledge $knowledge)
    {
        $request->validate([
            'judul' => 'required',
            'description' => 'required',
        ]);

        $data = $request->only([
            'judul',
            'description',
        ]);

        try {
            if ($request->hasFile('file')) {

                $isExist = Storage::disk('public')->exists("knowledge/$knowledge->file_path") ?? false;
                if ($isExist) Storage::delete("public/knowledge/$knowledge->file_path");

                $filePath = time() . '.' . $request->file->extension();
                $request->file->storeAs('public/knowledge/', $filePath);
                $data['file_path'] = $filePath;
            }

            $knowledge->update($data);
            return redirect()->back()->with(['notif' => 'Knowledge telah diupdate']);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['errors' => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Knowledge  $knowledge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Knowledge $knowledge)
    {
        try {
            if ($knowledge->file_path != null) {

                Storage::disk('public')->exists("knowledge/$knowledge->file_path");
                Storage::delete("public/knowledge/$knowledge->file_path");
            }

            $knowledge->delete();

            return redirect()->back()->with(['notif' => 'Knowledge telah dihapus']);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['notif' => $th->getMessage()]);
        }
    }
}
