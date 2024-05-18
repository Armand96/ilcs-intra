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
                'tgl_masuk' => "2000-01-01",
                'image_user' => "",
            ],
            /* ============================== BOD ============================== */
            [
                'username' => 'prakosa',
                'name' => 'Prakosa Hadi Takariyanto',
                'nip' => 43433,
                'rle_id' => 2,
                'email' => 'prakosa@ilcs.com',
                'password' => Hash::make('admin'),
                'jabatan' => 'President Commisioner',
                'sub_jabatan' => 'PRESIDENT COMMISSIONER',
                'tgl_lahir' => date('Y-m-d'),
                'tgl_masuk' => "2000-01-01",
                'image_user' => "https://www.ilcs.co.id/cfind/source/thumb/images/management-profile/cover_w361_h390_prakosa.jpg",
            ],
            [
                'username' => 'budi',
                'name' => 'Budi Mantoro',
                'nip' => 43432,
                'rle_id' => 2,
                'email' => 'budi@ilcs.com',
                'password' => Hash::make('admin'),
                'jabatan' => 'Commisioner',
                'sub_jabatan' => 'COMMISSIONER',
                'tgl_lahir' => date('Y-m-d'),
                'tgl_masuk' => "2000-01-01",
                'image_user' => "https://www.ilcs.co.id/cfind/source/thumb/images/management-profile/cover_w361_h390_budi.jpg",
            ],
            [
                'username' => 'nugroho',
                'name' => 'Nugroho Indrio',
                'nip' => 513434,
                'rle_id' => 2,
                'email' => 'nugroho@ilcs.com',
                'password' => Hash::make('admin'),
                'jabatan' => 'Commisioner',
                'sub_jabatan' => 'COMMISSIONER',
                'tgl_lahir' => date('Y-m-d'),
                'tgl_masuk' => "2000-01-01",
                'image_user' => "https://www.ilcs.co.id/cfind/source/thumb/images/management-profile/cover_w361_h390_nugroho.jpg",
            ],

            /* ============================== BOC ============================== */
            [
                'username' => 'natal',
                'name' => 'Natal Iman Ginting',
                'nip' => 232321,
                'rle_id' => 2,
                'email' => 'natal@ilcs.com',
                'password' => Hash::make('admin'),
                'jabatan' => 'Chief Executive Officer (CEO)',
                'sub_jabatan' => 'CHIEF EXECUTIVE OFFICER (CEO)',
                'tgl_lahir' => date('Y-m-d'),
                'tgl_masuk' => "2000-01-01",
                'image_user' => "https://www.ilcs.co.id/cfind/source/thumb/images/management-profile/cover_w361_h390_natal.jpg",
            ],
            [
                'username' => 'agus',
                'name' => 'Agus Dharmawan',
                'nip' => 45653,
                'rle_id' => 2,
                'email' => 'agus@ilcs.com',
                'password' => Hash::make('admin'),
                'jabatan' => 'Chief Marketing Officer (CMO)',
                'sub_jabatan' => 'CHIEF MARKETING OFFICER (CMO)',
                'tgl_lahir' => date('Y-m-d'),
                'tgl_masuk' => "2000-01-01",
                'image_user' => "https://www.ilcs.co.id/cfind/source/thumb/images/management-profile/cover_w361_h390_agus.jpg",
            ],
            [
                'username' => 'judi',
                'name' => 'Judi Ginta Irawan',
                'nip' => 45655673,
                'rle_id' => 2,
                'email' => 'judi@ilcs.com',
                'password' => Hash::make('admin'),
                'jabatan' => 'Chief Technology Officer (CTO) Current Chief Financial Officer (CFO)',
                'sub_jabatan' => 'CHIEF TECHNOLOGY OFFICER (CTO) CURRENT CHIEF FINANCIAL OFFICER (CFO)',
                'tgl_lahir' => date('Y-m-d'),
                'tgl_masuk' => "2000-01-01",
                'image_user' => "https://www.ilcs.co.id/cfind/source/thumb/images/management-profile/cover_w361_h390_judi.jpg",
            ],

            /* ============================== STAFF OF THE MONTH ============================== */
            [
                'username' => 'demas',
                'name' => 'Demas Bermani Surya',
                'nip' => 4123213,
                'rle_id' => 3,
                'email' => 'demas@ilcs.com',
                'password' => Hash::make('admin'),
                'jabatan' => 'UI UX Developer Produk',
                'sub_jabatan' => 'PPR',
                'tgl_lahir' => date('Y-m-d'),
                'tgl_masuk' => "2000-01-01",
                'image_user' => "",
            ],
            [
                'username' => 'dony',
                'name' => 'Dony Sapta Kurniawan',
                'nip' => 543544,
                'rle_id' => 3,
                'email' => 'dony@ilcs.com',
                'password' => Hash::make('admin'),
                'jabatan' => 'UI UX Developer Produk',
                'sub_jabatan' => 'PIP',
                'tgl_lahir' => "2024-05-23",
                'tgl_masuk' => "2000-01-01",
                'image_user' => "",
            ],
            [
                'username' => 'albert',
                'name' => 'Albert Nusantara',
                'nip' => 412312,
                'rle_id' => 3,
                'email' => 'albert@ilcs.com',
                'password' => Hash::make('admin'),
                'jabatan' => 'Project Manager',
                'sub_jabatan' => 'PIP',
                'tgl_lahir' => date('Y-m-d'),
                'tgl_masuk' => "2000-01-01",
                'image_user' => "",
            ],

            /* ============================== UPCOMING BIRTHDAY ============================== */
            [
                'username' => 'nurul',
                'name' => 'Nurul Amelia',
                'nip' => 5545766,
                'rle_id' => 3,
                'email' => 'nurul@ilcs.com',
                'password' => Hash::make('admin'),
                'jabatan' => 'System Analyst',
                'sub_jabatan' => 'PIP',
                'tgl_lahir' => "1990-05-21",
                'tgl_masuk' => "2000-01-01",
                'image_user' => "",
            ],
            [
                'username' => 'ari',
                'name' => 'Ari Panen',
                'nip' => 5543266,
                'rle_id' => 3,
                'email' => 'ari@ilcs.com',
                'password' => Hash::make('admin'),
                'jabatan' => 'System Analyst',
                'sub_jabatan' => 'PIP',
                'tgl_lahir' => "1990-05-22",
                'tgl_masuk' => "2000-01-01",
                'image_user' => "",
            ],
            [
                'username' => 'adit',
                'name' => 'Muhammad Aditya Suazi',
                'nip' => 5543266,
                'rle_id' => 3,
                'email' => 'adit@ilcs.com',
                'password' => Hash::make('admin'),
                'jabatan' => 'UIUX Developer Produk',
                'sub_jabatan' => 'PPR',
                'tgl_lahir' => "1990-05-23",
                'tgl_masuk' => "2000-01-01",
                'image_user' => "",
            ],
            [
                'username' => 'eva',
                'name' => 'Eva Soraya',
                'nip' => 76754,
                'rle_id' => 3,
                'email' => 'eva@ilcs.com',
                'password' => Hash::make('admin'),
                'jabatan' => 'Data Analyst',
                'sub_jabatan' => 'PIP',
                'tgl_lahir' => "1990-05-24",
                'tgl_masuk' => "2000-01-01",
                'image_user' => "",
            ],

            /* ============================== NEW EMPLOYEE ============================== */
            [
                'username' => 'evelyn',
                'name' => 'Evelyn Halim',
                'nip' => 2423425,
                'rle_id' => 3,
                'email' => 'evelyn@ilcs.com',
                'password' => Hash::make('admin'),
                'jabatan' => 'Business Intelligence',
                'sub_jabatan' => 'Produk',
                'tgl_lahir' => "1990-05-24",
                'tgl_masuk' => date('Y-m-d'),
                'image_user' => "",
            ],
            [
                'username' => 'amanda',
                'name' => 'Amanda Najwa Perak',
                'nip' => 51242421,
                'rle_id' => 3,
                'email' => 'amanda@ilcs.com',
                'password' => Hash::make('admin'),
                'jabatan' => '3D Designer',
                'sub_jabatan' => 'Produk',
                'tgl_lahir' => "1990-05-24",
                'tgl_masuk' => date('Y-m-d'),
                'image_user' => "",
            ],
        ];

        User::create($data);
    }
}
