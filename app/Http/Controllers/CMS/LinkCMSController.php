<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LinkCMSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Link::query();

        /* FILTER */
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('tipe')) {
            $query->where('tipe', 'like', '%' . $request->tipe . '%');
        }

        $links = $query->paginate(10);

        foreach ($links as $key => $lnk) {
            if (Storage::disk('public')->exists("link_gambar/" . $lnk->image_path)) {
                $lnk->image_path = Storage::disk('public')->url('link_gambar/'.$lnk->image_path);
            }
        }

        return view('cms.pages.link', compact('links'));
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
                'name' => 'required',
                'tipe' => 'required',
                'link_tujuan' => 'required',
            ]);

            $data = $request->only([
                'name',
                'tipe',
                'link_tujuan',
            ]);

            if ($request->hasFile('file')) {
                $imageName = time() . '.' . $request->file->extension();
                $request->file->storeAs('public/link_gambar/', $imageName);
                $data['image_path'] = $imageName;
            } else {
                $data['image_path'] = '';
            }

            Link::create($data);
            return redirect()->back()->with(['notif' => 'Link telah dibuat']);
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
    public function show(Link $link)
    {
        return response()->json($link);
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
    public function update(Request $request, Link $link)
    {
        $request->validate([
            'name' => 'required',
            'tipe' => 'required',
            'link_tujuan' => 'required',
        ]);

        $data = $request->only([
            'name',
            'tipe',
            'link_tujuan',
        ]);

        try {
            if ($request->hasFile('file')) {

                $isExist = Storage::disk('public')->exists("link_gambar/$link->image_path") ?? false;
                if ($isExist) Storage::delete("public/link_gambar/$link->image_path");

                $imageName = time() . '.' . $request->file->extension();
                $request->file->storeAs('public/link_gambar', $imageName);
                $data['image_path'] = $imageName;
            }

            $link->update($data);
            return redirect()->back()->with(['notif' => 'Link telah diupdate']);
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
    public function destroy(Link $link)
    {
        try {
            if ($link->image_path != null) {

                Storage::disk('public')->exists("link_gambar/$link->image_path");
                Storage::delete("public/link_gambar/$link->image_path");
            }

            $link->delete();

            return redirect()->back()->with(['notif' => 'Link telah dihapus']);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['notif' => $th->getMessage()]);
        }
    }
}
