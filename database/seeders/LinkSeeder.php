<?php

namespace Database\Seeders;

use App\Models\Link;
use Illuminate\Database\Seeder;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            /* ================================ SOSMED ================================ */
            [
                'name' => "Facebook",
                'image_path' => "https://www.ilcs.co.id/cfind/source/thumb/images/dev/material/cover_w24_h24_soc-facebook.png",
                'tipe' => "sosmed",
                'link_tujuan' => "https://facebook.com/",
            ],
            [
                'name' => "Linked In",
                'image_path' => "https://www.ilcs.co.id/cfind/source/thumb/images/dev/material/cover_w24_h24_soc-linkedin.png",
                'tipe' => "sosmed",
                'link_tujuan' => "https://www.linkedin.com/company/pt-integrasi-logistik-cipta-solusi/",
            ],
            [
                'name' => "Youtube",
                'image_path' => "https://www.ilcs.co.id/cfind/source/thumb/images/dev/material/cover_w24_h24_soc-youtube.png",
                'tipe' => "sosmed",
                'link_tujuan' => "https://www.youtube.com/channel/UCaNGVfUSepfhUdIUkf5jN5w",
            ],
            [
                'name' => "Youtube",
                'image_path' => "https://www.ilcs.co.id/cfind/source/thumb/images/dev/material/cover_w24_h24_soc-twitter.png",
                'tipe' => "sosmed",
                'link_tujuan' => "https://twitter.com/ilcs_id/",
            ],

            /* ================================ BACK OFFICE LINK ================================ */
            [
                'name' => "PEO",
                'image_path' => "https://www.ilcs.co.id/cfind/source/thumb/images/dev/material/cover_w24_h24_soc-twitter.png",
                'tipe' => "other",
                'link_tujuan' => "http://peo.ilcs.co.id",
            ],
            [
                'name' => "Zimbra",
                'image_path' => "https://www.ilcs.co.id/cfind/source/thumb/images/dev/material/cover_w24_h24_soc-twitter.png",
                'tipe' => "other",
                'link_tujuan' => "http://peo.ilcs.co.id",
            ],
            [
                'name' => "E-Office",
                'image_path' => "https://www.ilcs.co.id/cfind/source/thumb/images/dev/material/cover_w24_h24_soc-twitter.png",
                'tipe' => "other",
                'link_tujuan' => "http://peo.ilcs.co.id",
            ],
            [
                'name' => "PCICO",
                'image_path' => "https://www.ilcs.co.id/cfind/source/thumb/images/dev/material/cover_w24_h24_soc-twitter.png",
                'tipe' => "other",
                'link_tujuan' => "http://peo.ilcs.co.id",
            ],
            [
                'name' => "ilcs.co.id",
                'image_path' => "https://www.ilcs.co.id/cfind/source/thumb/images/dev/material/cover_w24_h24_soc-twitter.png",
                'tipe' => "other",
                'link_tujuan' => "http://peo.ilcs.co.id",
            ],
        ];

        Link::insert($data);
    }
}
