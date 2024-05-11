<?php

namespace App\Http\Controllers;

use App\Models\NilaiKaryawan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // use UserService;


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
}
