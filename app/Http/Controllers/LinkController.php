<?php

namespace App\Http\Controllers;

use App\Enums\LinkTypeEnum;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Link::all();
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
            if($request->hasFile('file')) {

                $imageName = time().'.'.$request->foto->extension();
                $request->foto->storeAs('public/link_image/', $imageName);
                $data['image_path'] = $imageName;
            }

            Link::create($data);
            return redirect()->back()->with(['message' => 'LInk telah dibuat']);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['errors' => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function show(Link $link)
    {
        return response()->json($link);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Link  $link
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
            if($request->hasFile('file')) {

                $isExist = Storage::disk('public')->exists("link_image/$link->image_path") ?? false;
                if($isExist) Storage::delete("public/link_image/$link->image_path");

                $imageName = time().'.'.$request->foto->extension();
                $request->foto->storeAs('public/link_image', $imageName);
                $data['image_path'] = $imageName;
            }

            Link::create($data);
            return redirect()->back()->with(['message' => 'LInk telah diperbarui']);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['errors' => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        try {
            if($link->image_user != null) {

                Storage::disk('public')->exists("link_image/$link->image_path");
                Storage::delete("public/link_image/$link->image_path");
            }

            $link->delete();

            return redirect()->back()->with(['notif' => 'User telah dihapus']);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['notif' => $th->getMessage()]);
        }
    }

    /* ========================================================== */
    public function appLink()
    {
        $data = Link::where('tipe', LinkTypeEnum::OTHER)->get();
        return $data;
    }

    public function sosmedLink()
    {
        $data = Link::where('tipe', LinkTypeEnum::SOSMED)->get();
        return $data;
    }
}
