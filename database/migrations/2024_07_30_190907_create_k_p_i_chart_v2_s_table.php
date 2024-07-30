<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKPIChartV2STable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('k_p_i_chart_v2_s', function (Blueprint $table) {
            $table->id();
            $table->string('source', 100);
            $table->integer('bulan');
            $table->integer('tahun');
            $table->double('rkap');
            $table->double('rkap_bulan_ini');
            $table->double('realisasi_bulan_ini');
            $table->double('realisasi_tahun_lalu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('k_p_i_chart_v2_s');
    }
}
