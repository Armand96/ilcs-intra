<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
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
                'role_name' => 'Admin',
                'is_admin' => true
            ],
            [
                'role_name' => 'Leader',
                'is_admin' => false
            ],
            [
                'role_name' => 'Staff',
                'is_admin' => false
            ]
        ];

        Role::insert($data);
    }
}
