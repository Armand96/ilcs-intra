<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsCMSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = News::query();

        if ($request->filled('judul')) {
            $query->where('judul', 'like', '%' . $request->judul . '%');
        }

        $news = $query->paginate(10);

        foreach ($news as $key => $reg) {
            if (Storage::disk('public')->exists("regulasi/" . $reg->file_path)) {
                $news[$key]->file_size = number_format(Storage::disk('public')->size("regulasi/" . $reg->file_path) / 1000000, 2);
                $reg->file_path = Storage::disk('public')->url('regulasi/' . $reg->file_path);
            } else {
                $news[$key]->file_size = '0.00';
            }
        }

        return view('cms.pages.news', compact('news'));
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
                'content' => 'required',
                'is_active' => 'required',
            ]);

            $data = $request->only([
                'judul',
                'content',
                'is_active',
            ]);

            $data['posted_by'] = Auth::user()->id;
            if ($data['is_active']) $data['is_active'] = true;
            else $data['is_active'] = false;

            if ($request->hasFile('foto')) {

                $fileName = time() . '.' . $request->foto->extension();
                $request->foto->storeAs('public/news/', $fileName);
                $data['image_cover'] = $fileName;
            }

            News::create($data);
            return redirect()->back()->with(['notif' => 'News telah dibuat']);
        } catch (\Throwable $th) {
            // throw $th;
            return redirect()->back()->withErrors(['errors' => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        $news->load('poster');
        return response()->json($news);
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
    public function update(Request $request, News $news)
    {
        $request->validate([
            'judul' => 'required',
            'content' => 'required',
            'is_active' => 'required',
        ]);

        $data = $request->only([
            'judul',
            'content',
            'is_active',
        ]);

        try {

            if ($data['is_active']) $data['is_active'] = true;
            else $data['is_active'] = false;

            if ($request->hasFile('foto')) {

                $isExist = Storage::disk('public')->exists("news/$news->image_cover") ?? false;
                if ($isExist) Storage::delete("public/news/$news->image_cover");

                $fileName = time() . '.' . $request->file->extension();
                $request->file->storeAs('public/news/', $fileName);
                $data['image_cover'] = $fileName;
            }

            $news->update($data);
            return redirect()->back()->with(['notif' => 'News telah diupdate']);
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
    public function destroy(News $news)
    {
        try {
            if ($news->image_cover != null) {

                Storage::disk('public')->exists("news/$news->image_cover");
                Storage::delete("public/news/$news->image_cover");
            }

            $news->delete();

            return redirect()->back()->with(['notif' => 'News telah dihapus']);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['notif' => $th->getMessage()]);
        }
    }
}
