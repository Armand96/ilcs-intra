<?php

namespace App\Http\Controllers;

use App\Models\NilaiKaryawan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
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
