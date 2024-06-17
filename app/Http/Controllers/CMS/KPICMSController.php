<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\KPIChart;
use Illuminate\Http\Request;

class KPICMSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Regulasi::query();

        if ($request->filled('judul')) {
            $query->where('judul', 'like', '%' . $request->judul . '%');
        }

        $kpis = $query->paginate(10);

        return view('cms.pages.kpis', compact('kpis'));
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
     * @param  \App\Models\KPIChart  $kPIChart
     * @return \Illuminate\Http\Response
     */
    public function show(KPIChart $kPIChart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KPIChart  $kPIChart
     * @return \Illuminate\Http\Response
     */
    public function edit(KPIChart $kPIChart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KPIChart  $kPIChart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KPIChart $kPIChart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KPIChart  $kPIChart
     * @return \Illuminate\Http\Response
     */
    public function destroy(KPIChart $kPIChart)
    {
        //
    }
}
