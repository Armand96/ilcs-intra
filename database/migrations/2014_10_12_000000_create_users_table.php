<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username', 50);
            $table->string('name', 100);
            $table->string('nip');
            $table->string('email')->unique();
            $table->bigInteger('role_id');
            $table->string('password');
            $table->string('jabatan');
            $table->string('sub_jabatan');
            $table->date('tgl_lahir');
            $table->date('tgl_masuk');
            $table->date('tgl_keluar')->nullable();
            $table->string('image_user');
            $table->string('dept')->nullable();
            $table->string('divisi')->nullable();
            // $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
