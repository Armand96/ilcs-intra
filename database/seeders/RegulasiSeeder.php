<?php

namespace Database\Seeders;

use App\Models\Regulasi;
use Illuminate\Database\Seeder;

class RegulasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data1 = [
            [
                'judul' => "Code of Conduct",
                'deskripsi' => "The company has compiled a Code of Conduct as a guide for professional behavior for all company personnel. The purpose of implementing the code of ethics so that every employee has the awareness to practice good ethics and will ultimately improve and strengthen the company's reputation.

                                Therefore, ILCS is determined to actively implement a culture of compliance with ethical behavior in the company, including by encouraging the implementation of reporting on matters that can cause financial or non-financial losses to the company.

                                Company or cause tarnishing of the Company's good name.",
                'file_path' => "https://www.ilcs.co.id/cfind/source/files/complience/pedoman-kode-etik-bisnis-025.umm.doo.2020-2020.pdf",
            ],
            [
                'judul' => "Board Manual",
                "deskripsi" => "The work guidelines and implementation of the duties of the Board of Commissioners, Directors, Supporting Organs of the Board of Commissioners, Supporting Organs of the Board of Directors refer to the Board Manual which is useful as a reference in each of their activities.",
                "file_path" => "https://www.ilcs.co.id/cfind/source/files/complience/board-of-manual-019.hkm.d00.2020-2020.pdf"
            ],
            [
                "judul" => "GCG",
                "deskripsi" => "ILCS is committed to implementing good corporate governance with high moral standards by referring to the Guidelines for the Implementation of Good Corporate Governance.

                                GCG guidelines are guidelines for all company personnel in making decisions and carrying out actions based on high morals, compliance with applicable laws and awareness of the existence of corporate social responsibility towards interested parties (stakeholders) consistently.",
                "file_path" => "https://www.ilcs.co.id/cfind/source/files/complience/pemutakhiran-pedoman-gcg-pt-ilcs-signed-off.pdf"
            ],
            [
                "judul" => "Gratification",
                "deskripsi" => "The Company upholds commitments related to GCG principles and creates a healthy business climate. The management and all employees of the company try to avoid actions, behaviors, or actions that will cause a conflict of interest. In addition, the company also applies rules for every form of giving, requesting, and receiving gratuities, as well as attempts to obtain bribes",
                "file_path" => "https://www.ilcs.co.id/cfind/source/files/complience/pedoman-gratifikasi-027.hkm.d00.2020-2020.pdf"
            ]
        ];

        Regulasi::insert($data1);
    }
}
