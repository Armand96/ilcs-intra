<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
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
                'judul' => 'Go Live PTOS-M Tanjung Priok',
                'description' => 'test',
                'tgl_event' => '2024-05-21 10:00:00',
            ],
            [
                'judul' => 'TJSL K3 Donor Darah & Medical Check Up Gratis',
                'description' => 'test',
                'tgl_event' => '2024-05-22 10:00:00',
            ],
        ];

        Event::insert($data);
    }
}
