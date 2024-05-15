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
        $data = [
            [
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
            ],
            [
                'username' => 'prakosa',
                'name' => 'PRAKOSA HADI TAKARIYANTO',
                'nip' => 43433,
                'rle_id' => 2,
                'email' => 'prakosa@ilcs.com',
                'password' => Hash::make('admin'),
                'jabatan' => 'PRESIDENT COMMISSIONER',
                'sub_jabatan' => 'PRESIDENT COMMISSIONER',
                'tgl_lahir' => date('Y-m-d'),
                'tgl_masuk' => date('Y-m-d'),
                'image_user' => "https://www.ilcs.co.id/cfind/source/thumb/images/management-profile/cover_w361_h390_prakosa.jpg",
            ],
            [
                'username' => 'budi',
                'name' => 'BUDI MANTORO',
                'nip' => 43432,
                'rle_id' => 2,
                'email' => 'budi@ilcs.com',
                'password' => Hash::make('admin'),
                'jabatan' => 'COMMISSIONER',
                'sub_jabatan' => 'COMMISSIONER',
                'tgl_lahir' => date('Y-m-d'),
                'tgl_masuk' => date('Y-m-d'),
                'image_user' => "https://www.ilcs.co.id/cfind/source/thumb/images/management-profile/cover_w361_h390_budi.jpg",
            ],
            [
                'username' => 'nugroho',
                'name' => 'NUGROHO INDRIO',
                'nip' => 513434,
                'rle_id' => 2,
                'email' => 'nugroho@ilcs.com',
                'password' => Hash::make('admin'),
                'jabatan' => 'COMMISSIONER',
                'sub_jabatan' => 'COMMISSIONER',
                'tgl_lahir' => date('Y-m-d'),
                'tgl_masuk' => date('Y-m-d'),
                'image_user' => "https://www.ilcs.co.id/cfind/source/thumb/images/management-profile/cover_w361_h390_nugroho.jpg",
            ],
            [
                'username' => 'natal',
                'name' => 'NATAL IMAN GINTING',
                'nip' => 232321,
                'rle_id' => 2,
                'email' => 'natal@ilcs.com',
                'password' => Hash::make('admin'),
                'jabatan' => 'CHIEF EXECUTIVE OFFICER (CEO)',
                'sub_jabatan' => 'CHIEF EXECUTIVE OFFICER (CEO)',
                'tgl_lahir' => date('Y-m-d'),
                'tgl_masuk' => date('Y-m-d'),
                'image_user' => "https://www.ilcs.co.id/cfind/source/thumb/images/management-profile/cover_w361_h390_natal.jpg",
            ],
            [
                'username' => 'agus',
                'name' => 'AGUS DHARMAWAN',
                'nip' => 45653,
                'rle_id' => 2,
                'email' => 'agus@ilcs.com',
                'password' => Hash::make('admin'),
                'jabatan' => 'CHIEF MARKETING OFFICER (CMO)',
                'sub_jabatan' => 'CHIEF MARKETING OFFICER (CMO)',
                'tgl_lahir' => date('Y-m-d'),
                'tgl_masuk' => date('Y-m-d'),
                'image_user' => "https://www.ilcs.co.id/cfind/source/thumb/images/management-profile/cover_w361_h390_agus.jpg",
            ],
            [
                'username' => 'judi',
                'name' => 'JUDI GINTA IRAWAN',
                'nip' => 45655673,
                'rle_id' => 2,
                'email' => 'judi@ilcs.com',
                'password' => Hash::make('admin'),
                'jabatan' => 'CHIEF TECHNOLOGY OFFICER (CTO) CURRENT CHIEF FINANCIAL OFFICER (CFO)',
                'sub_jabatan' => 'CHIEF TECHNOLOGY OFFICER (CTO) CURRENT CHIEF FINANCIAL OFFICER (CFO)',
                'tgl_lahir' => date('Y-m-d'),
                'tgl_masuk' => date('Y-m-d'),
                'image_user' => "https://www.ilcs.co.id/cfind/source/thumb/images/management-profile/cover_w361_h390_agus.jpg",
            ],
        ];

        User::create($data);
    }
}
