<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            RegulasiSeeder::class,
            EventSeeder::class,
            CalendarSeeder::class,
            LeaderSeeder::class,
            LinkSeeder::class,
        ]);
    }
}
