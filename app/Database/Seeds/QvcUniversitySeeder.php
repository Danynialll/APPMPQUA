<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class QvcUniversitySeeder extends Seeder
{
    public function run()
    {
        $data = [
            // **Public Universities**
            ['qu_code' => 'UM',             'qu_name' => 'Universiti Malaya', 'qu_type' => 'Public University'],
            ['qu_code' => 'UKM',            'qu_name' => 'Universiti Kebangsaan Malaysia', 'qu_type' => 'Public University'],
            ['qu_code' => 'USM',            'qu_name' => 'Universiti Sains Malaysia', 'qu_type' => 'Public University'],
            ['qu_code' => 'UPM',            'qu_name' => 'Universiti Putra Malaysia', 'qu_type' => 'Public University'],
            ['qu_code' => 'UTM',            'qu_name' => 'Universiti Teknologi Malaysia', 'qu_type' => 'Public University'],
            ['qu_code' => 'IIUM',           'qu_name' => 'Universiti Islam Antarabangsa Malaysia', 'qu_type' => 'Public University'],
            ['qu_code' => 'UNIMAS',         'qu_name' => 'Universiti Malaysia Sarawak', 'qu_type' => 'Public University'],
            ['qu_code' => 'UMS',            'qu_name' => 'Universiti Malaysia Sabah', 'qu_type' => 'Public University'],
            ['qu_code' => 'UTHM',           'qu_name' => 'Universiti Tun Hussein Onn Malaysia', 'qu_type' => 'Public University'],
            ['qu_code' => 'UUM',            'qu_name' => 'Universiti Utara Malaysia', 'qu_type' => 'Public University'],
            ['qu_code' => 'UniMAP',         'qu_name' => 'Universiti Malaysia Perlis', 'qu_type' => 'Public University'],
            ['qu_code' => 'UniSZA',         'qu_name' => 'Universiti Sultan Zainal Abidin', 'qu_type' => 'Public University'],
            ['qu_code' => 'UMK',            'qu_name' => 'Universiti Malaysia Kelantan', 'qu_type' => 'Public University'],
            ['qu_code' => 'UPSI',           'qu_name' => 'Universiti Pendidikan Sultan Idris', 'qu_type' => 'Public University'],
            ['qu_code' => 'UiTM',           'qu_name' => 'Universiti Teknologi MARA', 'qu_type' => 'Public University'],
            ['qu_code' => 'USIM',           'qu_name' => 'Universiti Sains Islam Malaysia', 'qu_type' => 'Public University'],
            ['qu_code' => 'UPNM',           'qu_name' => 'Universiti Pertahanan Nasional Malaysia', 'qu_type' => 'Public University'],
            ['qu_code' => 'UTeM',           'qu_name' => 'Universiti Teknikal Malaysia Melaka', 'qu_type' => 'Public University'],
            ['qu_code' => 'UMT',            'qu_name' => 'Universiti Malaysia Terengganu', 'qu_type' => 'Public University'],
            ['qu_code' => 'UMPSA',          'qu_name' => 'Universiti Malaysia Pahang Al-Sultan Abdullah', 'qu_type' => 'Public University'],


            // **Private University Universities**
            ['qu_code' => 'UTP',            'qu_name' => 'Universiti Teknologi Petronas', 'qu_type' => 'Private University'],
            ['qu_code' => 'Swinburne',      'qu_name' => 'Swinburne University of Technology Sarawak', 'qu_type' => 'Private University'],
            ['qu_code' => 'APU',            'qu_name' => 'Asia Pacific University of Technology & Innovation', 'qu_type' => 'Private University'],
            ['qu_code' => 'MMU',            'qu_name' => 'Multimedia University', 'qu_type' => 'Private University'],
            ['qu_code' => 'UNITEN',         'qu_name' => 'Universiti Tenaga Nasional', 'qu_type' => 'Private University'],
            ['qu_code' => 'UCSI',           'qu_name' => 'UCSI University', 'qu_type' => 'Private University'],
            ['qu_code' => 'UniKL',          'qu_name' => 'Universiti Kuala Lumpur', 'qu_type' => 'Private University'],
            ['qu_code' => 'UTAR',           'qu_name' => 'Universiti Tunku Abdul Rahman', 'qu_type' => 'Private University'],
            ['qu_code' => 'UNIMY',          'qu_name' => 'University Malaysia of Computer Science & Engineering', 'qu_type' => 'Private University'],
            ['qu_code' => 'UNMC',           'qu_name' => 'University of Nottingham Malaysia', 'qu_type' => 'Private University'],
            ['qu_code' => 'UoRM',           'qu_name' => 'University of Reading Malaysia', 'qu_type' => 'Private University'],
            ['qu_code' => 'USMC',           'qu_name' => 'University of Southampton Malaysia', 'qu_type' => 'Private University'],
            ['qu_code' => 'UOW',            'qu_name' => 'University of Wollongong Malaysia', 'qu_type' => 'Private University'],
            ['qu_code' => 'WOU',            'qu_name' => 'Wawasan Open University', 'qu_type' => 'Private University'],
            ['qu_code' => 'UoC',            'qu_name' => 'University of Cyberjaya', 'qu_type' => 'Private University'],
            ['qu_code' => 'XMUM',           'qu_name' => 'Xiamen University Malaysia', 'qu_type' => 'Private University'],
            ['qu_code' => 'AIU',            'qu_name' => 'Albukhary International University', 'qu_type' => 'Private University'],
            ['qu_code' => 'BERJAYA',        'qu_name' => 'Berjaya University College', 'qu_type' => 'Private University'],
            ['qu_code' => 'FirstCityUC',    'qu_name' => 'First City University College', 'qu_type' => 'Private University'],
            ['qu_code' => 'HanChiangUC',    'qu_name' => 'Han Chiang University College of Communication', 'qu_type' => 'Private University'],
            ['qu_code' => 'SAITOUC',        'qu_name' => 'Saito University College', 'qu_type' => 'Private University'],
            ['qu_code' => 'KUIS',           'qu_name' => 'Kolej Universiti Islam Antarabangsa Selangor', 'qu_type' => 'Private University'],
            ['qu_code' => 'MAHSA',          'qu_name' => 'MAHSA University', 'qu_type' => 'Private University'],
            ['qu_code' => 'IUMW',           'qu_name' => 'International University of Malaya-Wales', 'qu_type' => 'Private University'],
            ['qu_code' => 'HELP',           'qu_name' => 'HELP University', 'qu_type' => 'Private University'],
            ['qu_code' => 'CityUC',         'qu_name' => 'City University Malaysia', 'qu_type' => 'Private University'],
            ['qu_code' => 'SEGi',           'qu_name' => 'SEGi University', 'qu_type' => 'Private University'],
            ['qu_code' => 'NilaiUC',        'qu_name' => 'Nilai University', 'qu_type' => 'Private University'],
            ['qu_code' => 'Linton',         'qu_name' => 'Linton University College', 'qu_type' => 'Private University'],
            ['qu_code' => 'Sunway',         'qu_name' => 'Sunway University', 'qu_type' => 'Private University'],
            ['qu_code' => 'Taylor',         'qu_name' => "Taylor's University", 'qu_type' => 'Private University'],
            ['qu_code' => 'INTI',           'qu_name' => 'INTI International University', 'qu_type' => 'Private University'],
            ['qu_code' => 'MonashMY',       'qu_name' => 'Monash University Malaysia', 'qu_type' => 'Private University'],
            ['qu_code' => 'HeriotWattMY',   'qu_name' => 'Heriot-Watt University Malaysia', 'qu_type' => 'Private University'],

            // **Polytechnics**
            ['qu_code' => 'PMM',            'qu_name' => 'Politeknik Merlimau', 'qu_type' => 'Polytechnic'],
            ['qu_code' => 'PMS',            'qu_name' => 'Politeknik Muadzam Shah', 'qu_type' => 'Polytechnic'],
            ['qu_code' => 'PMJ',            'qu_name' => 'Politeknik Mersing Johor', 'qu_type' => 'Polytechnic'],
            ['qu_code' => 'PMSPK',          'qu_name' => 'Politeknik Sultan Mizan Zainal Abidin', 'qu_type' => 'Polytechnic'],
            ['qu_code' => 'PBU',            'qu_name' => 'Politeknik Balik Pulau', 'qu_type' => 'Polytechnic'],
            ['qu_code' => 'PIS',            'qu_name' => 'Politeknik Ibrahim Sultan', 'qu_type' => 'Polytechnic'],
            ['qu_code' => 'PBS',            'qu_name' => 'Politeknik Banting Selangor', 'qu_type' => 'Polytechnic'],
            ['qu_code' => 'PSA',            'qu_name' => 'Politeknik Sultan Salahuddin Abdul Aziz Shah', 'qu_type' => 'Polytechnic'],
            ['qu_code' => 'PSMZA',          'qu_name' => 'Politeknik Sultan Mizan Zainal Abidin', 'qu_type' => 'Polytechnic'],
            ['qu_code' => 'PKB',            'qu_name' => 'Politeknik Kota Bharu', 'qu_type' => 'Polytechnic'],
            ['qu_code' => 'PKS',            'qu_name' => 'Politeknik Kuching Sarawak', 'qu_type' => 'Polytechnic'],
            ['qu_code' => 'PKT',            'qu_name' => 'Politeknik Kota Kinabalu', 'qu_type' => 'Polytechnic'],
            ['qu_code' => 'PMSB',           'qu_name' => 'Politeknik Mukah Sarawak', 'qu_type' => 'Polytechnic'],
            ['qu_code' => 'PHT',            'qu_name' => 'Politeknik Hulu Terengganu', 'qu_type' => 'Polytechnic'],
            ['qu_code' => 'PMKL',           'qu_name' => 'Politeknik Metro Kuala Lumpur', 'qu_type' => 'Polytechnic'],
            ['qu_code' => 'PSPM',           'qu_name' => 'Politeknik Seberang Perai', 'qu_type' => 'Polytechnic'],
            ['qu_code' => 'PSH',            'qu_name' => 'Politeknik Sandakan Sabah', 'qu_type' => 'Polytechnic'],
            ['qu_code' => 'PBR',            'qu_name' => 'Politeknik Balik Pulau', 'qu_type' => 'Polytechnic'],
            ['qu_code' => 'PKN',            'qu_name' => 'Politeknik Kota Negeri', 'qu_type' => 'Polytechnic'],
            ['qu_code' => 'PSAS',           'qu_name' => 'Politeknik Sultan Azlan Shah', 'qu_type' => 'Polytechnic'],
            ['qu_code' => 'PUO',            'qu_name' => 'Politeknik Ungku Omar', 'qu_type' => 'Polytechnic'],
            ['qu_code' => 'PSIS',           'qu_name' => 'Politeknik Sultan Idris Shah', 'qu_type' => 'Polytechnic'],

            // **University College Institutions**
            ['qu_code' => 'ILP',            'qu_name' => 'Institut Latihan Perindustrian', 'qu_type' => 'University College'],
            ['qu_code' => 'IKM',            'qu_name' => 'Institut Kemahiran MARA', 'qu_type' => 'University College'],
            ['qu_code' => 'ADTEC',          'qu_name' => 'Advanced Technology Training Center', 'qu_type' => 'University College'],
            ['qu_code' => 'GMI',            'qu_name' => 'German-Malaysian Institute', 'qu_type' => 'University College'],
            ['qu_code' => 'KYP',            'qu_name' => 'Kolej Yayasan Pahang', 'qu_type' => 'University College'],
        ];

        // Insert data into the database
        $this->db->table('qvc_upsi.qvc_university')->insertBatch($data);
    }
}
