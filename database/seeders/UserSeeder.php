<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            'username' => 'admin',
            'name' => 'Admin',
            'nip' => 12345,
            'rle_id' => 1,
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'jabatan' => 'admin',
            'sub_jabatan' => 'admin',
            'tgl_lahir' => date('Y-m-d'),
            'tgl_masuk' => date('Y-m-d'),
            'image_user' => "",
        );

        User::create($data);
    }
}
