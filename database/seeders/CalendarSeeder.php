<?php

namespace Database\Seeders;

use App\Models\CalendarEvent;
use Illuminate\Database\Seeder;

class CalendarSeeder extends Seeder
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
                'judul' => "Hari Raya Waisak",
                'description' => "Hari",
                'tgl_cal_event' => "2024-05-23",
            ]
        ];

        CalendarEvent::insert($data);
    }
}
