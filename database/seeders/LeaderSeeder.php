<?php

namespace Database\Seeders;

use App\Models\Leader;
use Illuminate\Database\Seeder;

class LeaderSeeder extends Seeder
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
                'user_id' => 2,
                'divisi' => 'Board Of Comission',
                'description' => "Served as President Commissioner based on Shareholders' Decree Number KP.03/3/10/2/RKTK/PGLS/PLND-22 dated October 3, 2022.".
                                " He earned a Bachelor's degree in Civil Engineering from Gajah Mada University, Yogyakarta, and a Master's in Highways Systems and Engineering at the Institute of Technology Bandung in 1995.".
                                " Served as Project Manager of PT Pelabuhan Indonesia II (Persero) Car Terminal in 2006, Project Manager of PLTD Bali, PLTG Rengat, and PLTD Ambon in 2009, Manager of the Power Plant and Energy Investment Division in 2013, General Manager of the Investment Department in 2017, and served as Technical Director of PT Pelabuhan Indonesia IV (Persero) in 2018. .",
            ],
            [
                'user_id' => 3,
                'divisi' => 'Board Of Comission',
                'description' => "Served as President Director based on Shareholders' Decision Number KP.10.05/10/7/1/RKTK/UTMA/PLND-23 Number SK.03/10/7/1/PAPR/DIUT/PLPL-23 dated July 10, 2023. ".
                                    "He earned a Diploma's degree majoring in Nautica at Jakarta College of Maritime Science in 2001 and Master's degree in Magister's of Administrative Science program at University of Syech Islam Yusuf in 2010.".
                                    "He served as Head of sub-directorate of special sea transportation and related service businesses, directorate of traffic, directorate general of sea relations, Ministry of Transportation (2018-2018), Head of the domestic sea transportation sub-directorate, traffic directorate, directorate general of sea relations, Ministry of Transportation (2018-2020), Head of the academic and cadet administration section, BPSDM (2020-2021), Head of the Tanjung Pinang Class 1 Type A navigation district, Directorate General of Maritime Relations, Ministry of Transportation (2020-2021), and Director of Navigation, Directorate General of Maritime Relations, Ministry of Transportation (2022-now), and as Commissioner of PT ILCS. ."
            ],
            [
                'user_id' => 4,
                'divisi' => 'Board Of Comission',
                'description' => "Served as Commissioner based on Shareholders' Decision KP.03/25/9/1/MTA/UT/PI.11-2021 dated August 25, 2021.".
                                "He earned his Bachelor of Engineering degree from the Bandung Institute of Technology in 1982.".
                                "He served as Head of the Land Transportation Research and Development Center (2002-2005), Secretary of the Directorate General of Railways (2005-2010), as Expert Staff for Technology, Energy, and Environment at the Ministry of Transportation for the period 2014 — 2017, and as Commissioner of PT Tanjung Priok Port."
            ],
            [
                'user_id' => 5,
                'divisi' => 'Board Of Directors',
                'description' => "Served as President Director based on Shareholders' Decision Number KP.03/28/2/1/RKTK/WDUT/PLND-23 Number SK.03/27/2/1/PAPR/DKMT/PLSL-23 dated March 1, 2023.".
                            "He earned a Bachelor’s degree in Industrial Engineering at University of Sumatera Utara in 1991 and Master's degree in Magister's of Business Administration (MBA) Strategic Management program at University of Birmingham in 2000.".
                            "Appointed as President Director of PT Integration Logistik Cipta Solusi (ILCS) in March 2023. Previously he served as Project Director Digital Ecosystem Platform at PT Telkom Indonesia (Tbk) for the 2020-present period."
            ],
            [
                'user_id' => 6,
                'divisi' => 'Board Of Directors',
                'description' => "Served as Chief Marketing Officer (CMO) based on Shareholders' Decision Number KP.03/3/10/2/RKTK/PGLS/PLND-22 dated October 3, 2022.".
                                "He earned a Diploma III in Informatics Engineering from the STIKOM in 1999 at Surabaya.".
                                "Appointed as Acting President Director of PT Integration Logistik Cipta Solusi (ILCS) in October 2022. Previously he served as Group Head of Information and Communication Technology at PT Pelabuhan Indonesia (Persero) Holding."
            ],
            [
                'user_id' => 7,
                'divisi' => 'Board Of Directors',
                'description' => "SServed as Chief Technology Officer (CTO) based on Shareholder Decision Number KP.03/3/11/3/MTA/UT/PI.II-2020 dated November 3, 2020 and concurrently serves as Chief Financial Officer (CFO) based on Commissioner's Decision Number DK/05/10/1/ILCS-2022 dated 5 October 2022.".
                                "He earned a Bachelor's degree in Naval Architecture from the Sepuluh November Institute of Technology, Surabaya in 1996.".
                                "He served as the PMO Team at PT Pelabuhan Indonesia II (Persero) for the 2012-2015 period and as the Information System Manager at PT IPC Terminal Petikemas Koja for the 2016-present period."
            ]
        ];

        Leader::insert($data);
    }
}
