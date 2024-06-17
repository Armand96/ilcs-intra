<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKPIChartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('k_p_i_charts', function (Blueprint $table) {
            $table->id();
            $table->enum('source',['Pendapatan', 'Beban Usaha', 'ICT System Implementator', 'IT Manage Service', 'Digital Seaport']);
            $table->integer('bulan');
            $table->integer('tahun');
            $table->double('rkap');
            $table->double('reals');
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
        Schema::dropIfExists('k_p_i_charts');
    }
}
