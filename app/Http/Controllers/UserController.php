<?php

namespace App\Http\Controllers;

use App\Models\NilaiKaryawan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
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
            'username' => 'required',
            'name' => 'required',
            'nip' => 'required',
            'email' => 'required',
            'role_id' => 'required',
            'password' => 'required',
            'jabatan' => 'required',
            'sub_jabatan' => 'required',
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
            'sub_jabatan',
            'tgl_lahir',
            'tgl_masuk',
        ]);

        $data['password'] = Hash::make($data['password']);

        try {
            if($request->hasFile('foto')) {

                $imageName = time().'.'.$request->foto->extension();
                $request->foto->storeAs('public/user_image', $imageName);
                $data['image_user'] = $imageName;
            }

            User::create($data);
            return redirect()->back()->with(['message' => 'User telah dibuat']);
        } catch (\Throwable $th) {
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
        return response()->json($user->with('role')->first());
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
            'sub_jabatan' => 'required',
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
            'sub_jabatan',
            'tgl_lahir',
            'tgl_masuk',
        ]);

        if($data['password'] == null) unset($data['password']);
        else $data['password'] = Hash::make($data['password']);

        try {
            if($request->hasFile('foto')) {

                Storage::disk('public')->exists("profile_picture/$user->image_user");
                Storage::delete("public/profile_picture/$user->image_user");

                $imageName = time().'.'.$request->foto->extension();
                $request->foto->storeAs('public/user_image', $imageName);
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
    public function destroy($id)
    {
        try {
            $user = User::find($id);

            if($user->image_user != null) {

                Storage::disk('public')->exists("profile_picture/$user->image_user");
                Storage::delete("public/profile_picture/$user->image_user");
            }

            $user->delete();

            return redirect()->back()->with(['notif' => 'User telah dihapus']);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['notif' => $th->getMessage()]);
        }
    }

    /* ======================================================================== */
    public function getAllNilaiKaryawan()
    {
        return NilaiKaryawan::with('karyawan')->where(DB::raw('MONTH(tgl_penilaian)'),  date('m'))->orderBy('nilai', 'ASC')->limit(5)->get();
        // return User::nilaiBulanIni()->orderBy()->limit(5);
    }

    public function getUpcomingBirthday()
    {
        $whereMonth = DB::raw('MONTH(tgl_lahir)');
        $wherDate = DB::raw('DAY(tgl_lahir)');
        $currDate = date('d');
        $maxDate = date('t');
        $crossMonth = false;
        $maxRangeDate = "";

        if($currDate+5 <= $maxDate) {
            $maxRangeDate = $currDate+5;
            $crossMonth = false;
        } else {
            $maxRangeDate = $currDate+5-$maxDate;
            $crossMonth = true;
        }

        return User::where($whereMonth, date('m'))->when($crossMonth, function($qry) {
            $qry->orWhere('whereMonth', date('m', strtotime('+1 month')));
        })->whereBetween($wherDate, [$currDate, $maxRangeDate])->orderBy('tgl_lahir', 'ASC')->limit(5)->get();
    }

    public function newEmployee()
    {
        $data = User::whereBetween('tgl_masuk', [date('Y-m-d'), date('Y-m-t')])->orderBy('tgl_masuk', 'ASC')->limit(5)->get();
        return $data;
    }

    public function checkLogin()
    {

    }

    public function login(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'password' => 'required',
        ]);

        $credential = $request->only(['nip', 'password']);

        try {
            if(Auth::attempt($credential)) {
                if(Auth::user()->role->is_admin == true) {
                    return redirect()->route('dashboard');
                } else {
                    return redirect()->route('cms');
                }
            }
            // else if(Auth::guard('siswa')->attempt($credential)) return redirect()->route('test.siswa');
            else return redirect()->back()->withErrors(['errors' => 'nip atau password salah']);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['errors' => $th->getMessage()]);
        }
    }
}
