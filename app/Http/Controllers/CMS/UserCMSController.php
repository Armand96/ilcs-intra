<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserCMSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = User::query();

        // Apply filters
        if ($request->filled('username')) {
            $query->where('username', 'like', '%' . $request->username . '%');
        }

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('nip')) {
            $query->where('nip', 'like', '%' . $request->nip . '%');
        }

        if ($request->filled('jabatan')) {
            $query->where('jabatan', 'like', '%' . $request->jabatan . '%')->orWhere('sub_jabatan', 'like', '%' . $request->jabatan . '%');
        }

        if ($request->filled('role')) {
            $query->whereHas('role', function ($q) use ($request) {
                $q->where('role_name', 'like', '%' . $request->role . '%');
            });
        }

        $users = $query->paginate(10);
        $roles = Role::select(['id', 'role_name'])->get();
        $jabatans = User::select('jabatan')->distinct()->get();

        foreach ($users as $key => $reg) {
            if (Storage::disk('public')->exists("profile_picture/" . $reg->image_user)) {
                $reg->image_user = Storage::disk('public')->url('profile_picture/'.$reg->image_user);
            }
        }

        return view('cms.pages.user', compact('users', 'roles', 'jabatans'));
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
        // dd($request);

        try {
            $request->validate([
                'username' => 'required',
                'name' => 'required',
                'nip' => 'required',
                'email' => 'required',
                'role_id' => 'required',
                'password' => 'required',
                'jabatan' => 'required',
                'tgl_lahir' => 'required',
                'tgl_masuk' => 'required',
            ]);

            $data = $request->only([
                'username',
                'name',
                'nip',
                'email',
                'role_id',
                'password',
                'jabatan',
                'tgl_lahir',
                'tgl_masuk',
                'tgl_keluar'
            ]);

            $data['sub_jabatan'] = $data['jabatan'];
            $data['tgl_lahir'] = date('Y-m-d', strtotime($data['tgl_lahir']));
            $data['tgl_masuk'] = date('Y-m-d', strtotime($data['tgl_masuk']));

            if ($data['tgl_keluar']) {
                $data['tgl_keluar'] = date('Y-m-d', strtotime($data['tgl_keluar']));
            }

            $data['password'] = Hash::make($data['password']);

            // dd($request);

            if ($request->hasFile('foto')) {

                $imageName = time() . '.' . $request->foto->extension();
                $request->foto->storeAs('public/profile_picture/', $imageName);
                $data['image_user'] = $imageName;
            } else {
                $data['image_user'] = '';
            }

            User::create($data);
            return redirect()->back()->with(['message' => 'User telah dibuat']);
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
    public function show(User $user)
    {
        $user->load('role');
        return response()->json($user);
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
    public function update(Request $request, User $user)
    {
        $request->validate([
            'username' => 'required',
            'name' => 'required',
            'nip' => 'required',
            'email' => 'required',
            'role_id' => 'required',
            'jabatan' => 'required',
            'tgl_lahir' => 'required',
            'tgl_masuk' => 'required',
        ]);

        $data = $request->only([
            'username',
            'name',
            'nip',
            'email',
            'role_id',
            'password',
            'jabatan',
            'tgl_lahir',
            'tgl_masuk',
            'tgl_keluar'
        ]);

        if ($data['password'] == null) unset($data['password']);
        else $data['password'] = Hash::make($data['password']);

        $data['sub_jabatan'] = $data['jabatan'];
        $data['tgl_lahir'] = date('Y-m-d', strtotime($data['tgl_lahir']));
        $data['tgl_masuk'] = date('Y-m-d', strtotime($data['tgl_masuk']));

        if ($data['tgl_keluar']) {
            $data['tgl_keluar'] = date('Y-m-d', strtotime($data['tgl_keluar']));
        }

        try {
            if ($request->hasFile('foto')) {

                $isExist = Storage::disk('public')->exists("profile_picture/$user->image_user") ?? false;
                if ($isExist) Storage::delete("public/profile_picture/$user->image_user");

                $imageName = time() . '.' . $request->foto->extension();
                $request->foto->storeAs('public/profile_picture', $imageName);
                $data['image_user'] = $imageName;
            }

            $user->update($data);
            return redirect()->back()->with(['notif' => 'User telah diupdate']);
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
    public function destroy(User $user)
    {
        try {
            if ($user->image_user != null) {

                Storage::disk('public')->exists("profile_picture/$user->image_user");
                Storage::delete("public/profile_picture/$user->image_user");
            }

            $user->delete();

            return redirect()->back()->with(['notif' => 'User telah dihapus']);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['notif' => $th->getMessage()]);
        }
    }
}
