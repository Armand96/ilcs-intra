<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Leader;
use Illuminate\Http\Request;

class LeaderCMSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Leader::query();

        // Apply filters
        if ($request->filled('name')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->name . '%');
            });
        }

        if ($request->filled('divisi')) {
            $query->where('divisi', 'like', '%' . $request->divisi . '%');
        }

        $leaders = $query->paginate(10);
        $divisis = ['Board Of Comission', 'Board Of Directors', 'Board Of Management'];
        // $users = User::select('id', 'name')->get();

        return view('cms.pages.leader', compact('leaders', 'divisis'));
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
                'user_id' => 'required',
                'description' => 'required',
                'divisi' => 'required',
            ]);

            $data = $request->only([
                'user_id',
                'description',
                'divisi',
            ]);


            // if ($request->hasFile('foto')) {

            //     $imageName = time() . '.' . $request->foto->extension();
            //     $request->foto->storeAs('public/profile_picture/', $imageName);
            //     $data['image_user'] = $imageName;
            // } else {
            //     $data['image_user'] = '';
            // }

            Leader::create($data);
            return redirect()->back()->with(['notif' => 'Leader telah dipilih']);
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
    public function show(Leader $leader)
    {
        $leader->load('user');
        return response()->json($leader);
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
    public function update(Request $request, Leader $leader)
    {
        $request->validate([
            'user_id' => 'required',
            'description' => 'required',
            'divisi' => 'required',
        ]);

        $data = $request->only([
            'user_id',
            'description',
            'divisi',
        ]);

        try {
            // if ($request->hasFile('foto')) {

            //     $isExist = Storage::disk('public')->exists("profile_picture/$user->image_user") ?? false;
            //     if ($isExist) Storage::delete("public/profile_picture/$user->image_user");

            //     $imageName = time() . '.' . $request->foto->extension();
            //     $request->foto->storeAs('public/profile_picture', $imageName);
            //     $data['image_user'] = $imageName;
            // }

            $leader->update($data);
            return redirect()->back()->with(['notif' => 'Leader telah diupdate']);
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
    public function destroy(Leader $leader)
    {
        try {
            // if ($leader->image_user != null) {

            //     Storage::disk('public')->exists("profile_picture/$leader->image_user");
            //     Storage::delete("public/profile_picture/$leader->image_user");
            // }

            $leader->delete();

            return redirect()->back()->with(['notif' => 'Leader telah di-unassign']);
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->back()->withErrors(['notif' => $th->getMessage()]);
        }
    }
}
