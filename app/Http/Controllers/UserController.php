<?php

namespace App\Http\Controllers;

use App\Models\NilaiKaryawan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function currentUser(){
        $user = Auth::user();
        $user->load(['role']);

        if (Storage::disk('public')->exists("profile_picture/" . $user->image_user)) {
            $user->image_user = Storage::disk('public')->url('profile_picture/' . $user->image_user);
        }

        return response()->json($user);
    }

    /* ======================================================================== */
    public function update(Request $request)
    {
        $user = Auth::user();

        $data = [];

        try {
            if ($request->hasFile('foto')) {

                $isExist = Storage::disk('public')->exists("profile_picture/$user->image_user") ?? false;
                if ($isExist) Storage::delete("public/profile_picture/$user->image_user");

                $imageName = time() . '.' . $request->foto->extension();
                $request->foto->storeAs('public/profile_picture', $imageName);
                $data['image_user'] = $imageName;
                $user->update($data);
            } else {
                return redirect()->back()->with(['notif' => "Tidak ada file yang diupload"]);
            }

            return redirect()->back()->with(['notif' => 'User telah diupdate']);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['errors' => $th->getMessage()]);
        }
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

    public function loginView()
    {
        if(Auth::user()) return redirect()->route('dashboard');
        else return view('login');
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
                return redirect()->route('dashboard')->with(['notif_modal' => 'Berhasil Login']);
            }
            // else if(Auth::guard('siswa')->attempt($credential)) return redirect()->route('test.siswa');
            return redirect()->back()->withErrors(['errors' => 'nip atau password salah']);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['errors' => $th->getMessage()]);
        }
    }

    /**
     * LOG OUT CURRENT USER
     * @return void
    */
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate the user's session
        $request->session()->invalidate();

        // Regenerate the CSRF token to prevent CSRF attacks
        $request->session()->regenerateToken();

        // Redirect to the login page or any other page
        return redirect('/login');
    }
}
