<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MPQUASeeder extends Seeder
{
    public function run()
    {
        $data_mpqua = [
            ['mpq_id' => '1',   'mpq_address' => '',    'mpq_email' => '', 'mpq_phone' => '', 'mpq_fax' => '', 'mpq_qu_id' => '1'],
            ['mpq_id' => '2',   'mpq_address' => '',    'mpq_email' => '', 'mpq_phone' => '', 'mpq_fax' => '', 'mpq_qu_id' => '2'],
            ['mpq_id' => '3',   'mpq_address' => '',    'mpq_email' => '', 'mpq_phone' => '', 'mpq_fax' => '', 'mpq_qu_id' => '3'],
            ['mpq_id' => '4',   'mpq_address' => '',    'mpq_email' => '', 'mpq_phone' => '', 'mpq_fax' => '', 'mpq_qu_id' => '4'],
            ['mpq_id' => '5',   'mpq_address' => '',    'mpq_email' => '', 'mpq_phone' => '', 'mpq_fax' => '', 'mpq_qu_id' => '5'],
            ['mpq_id' => '6',   'mpq_address' => '',    'mpq_email' => '', 'mpq_phone' => '', 'mpq_fax' => '', 'mpq_qu_id' => '6'],
            ['mpq_id' => '7',   'mpq_address' => '',    'mpq_email' => '', 'mpq_phone' => '', 'mpq_fax' => '', 'mpq_qu_id' => '7'],
            ['mpq_id' => '8',   'mpq_address' => '',    'mpq_email' => '', 'mpq_phone' => '', 'mpq_fax' => '', 'mpq_qu_id' => '8'],
            ['mpq_id' => '9',   'mpq_address' => '',    'mpq_email' => '', 'mpq_phone' => '', 'mpq_fax' => '', 'mpq_qu_id' => '9'],
            ['mpq_id' => '10',   'mpq_address' => '',    'mpq_email' => '', 'mpq_phone' => '', 'mpq_fax' => '', 'mpq_qu_id' => '10'],
            ['mpq_id' => '11',   'mpq_address' => '',    'mpq_email' => '', 'mpq_phone' => '', 'mpq_fax' => '', 'mpq_qu_id' => '11'],
            ['mpq_id' => '12',   'mpq_address' => '',    'mpq_email' => '', 'mpq_phone' => '', 'mpq_fax' => '', 'mpq_qu_id' => '12'],
            ['mpq_id' => '13',   'mpq_address' => '',    'mpq_email' => '', 'mpq_phone' => '', 'mpq_fax' => '', 'mpq_qu_id' => '13'],
            ['mpq_id' => '14',   'mpq_address' => '',    'mpq_email' => '', 'mpq_phone' => '', 'mpq_fax' => '', 'mpq_qu_id' => '14'],
            ['mpq_id' => '15',   'mpq_address' => '',    'mpq_email' => '', 'mpq_phone' => '', 'mpq_fax' => '', 'mpq_qu_id' => '15'],
            ['mpq_id' => '16',   'mpq_address' => '',    'mpq_email' => '', 'mpq_phone' => '', 'mpq_fax' => '', 'mpq_qu_id' => '16'],
            ['mpq_id' => '17',   'mpq_address' => '',    'mpq_email' => '', 'mpq_phone' => '', 'mpq_fax' => '', 'mpq_qu_id' => '17'],
            ['mpq_id' => '18',   'mpq_address' => '',    'mpq_email' => '', 'mpq_phone' => '', 'mpq_fax' => '', 'mpq_qu_id' => '18'],
            ['mpq_id' => '19',   'mpq_address' => '',    'mpq_email' => '', 'mpq_phone' => '', 'mpq_fax' => '', 'mpq_qu_id' => '19'],
            ['mpq_id' => '20',   'mpq_address' => '',    'mpq_email' => '', 'mpq_phone' => '', 'mpq_fax' => '', 'mpq_qu_id' => '20'],
        ];

        // Insert data into the database
        $this->db->table('qvc_upsi.mpqua')->insertBatch($data_mpqua);

        $data_auth_user = [
            ['au_user_id' => '1',   'au_username' => 'ummpq',    'au_password' => '$2y$10$WQTu1MgTCTentDOFDQ7JLeV0rIF4w9n90890kgint19IVEOi/Da/e',  'au_type' => 'mpqua', 'au_qu_id' => '1', 'au_plain_password' => 'abcd1234'],
            ['au_user_id' => '2',   'au_username' => 'ukmmpq',    'au_password' => '$2y$10$WQTu1MgTCTentDOFDQ7JLeV0rIF4w9n90890kgint19IVEOi/Da/e',  'au_type' => 'mpqua', 'au_qu_id' => '2', 'au_plain_password' => 'abcd1234'],
            ['au_user_id' => '3',   'au_username' => 'usmmpq',    'au_password' => '$2y$10$WQTu1MgTCTentDOFDQ7JLeV0rIF4w9n90890kgint19IVEOi/Da/e',  'au_type' => 'mpqua', 'au_qu_id' => '3', 'au_plain_password' => 'abcd1234'],
            ['au_user_id' => '4',   'au_username' => 'upmmpq',    'au_password' => '$2y$10$WQTu1MgTCTentDOFDQ7JLeV0rIF4w9n90890kgint19IVEOi/Da/e',  'au_type' => 'mpqua', 'au_qu_id' => '4', 'au_plain_password' => 'abcd1234'],
            ['au_user_id' => '5',   'au_username' => 'utmmpq',    'au_password' => '$2y$10$WQTu1MgTCTentDOFDQ7JLeV0rIF4w9n90890kgint19IVEOi/Da/e',  'au_type' => 'mpqua', 'au_qu_id' => '5', 'au_plain_password' => 'abcd1234'],
            ['au_user_id' => '6',   'au_username' => 'iiummpq',    'au_password' => '$2y$10$WQTu1MgTCTentDOFDQ7JLeV0rIF4w9n90890kgint19IVEOi/Da/e',  'au_type' => 'mpqua', 'au_qu_id' => '6', 'au_plain_password' => 'abcd1234'],
            ['au_user_id' => '7',   'au_username' => 'unimasmpq',    'au_password' => '$2y$10$WQTu1MgTCTentDOFDQ7JLeV0rIF4w9n90890kgint19IVEOi/Da/e',  'au_type' => 'mpqua', 'au_qu_id' => '7', 'au_plain_password' => 'abcd1234'],
            ['au_user_id' => '8',   'au_username' => 'umsmpq',    'au_password' => '$2y$10$WQTu1MgTCTentDOFDQ7JLeV0rIF4w9n90890kgint19IVEOi/Da/e',  'au_type' => 'mpqua', 'au_qu_id' => '8', 'au_plain_password' => 'abcd1234'],
            ['au_user_id' => '9',   'au_username' => 'uthmmpq',    'au_password' => '$2y$10$WQTu1MgTCTentDOFDQ7JLeV0rIF4w9n90890kgint19IVEOi/Da/e',  'au_type' => 'mpqua', 'au_qu_id' => '9', 'au_plain_password' => 'abcd1234'],
            ['au_user_id' => '10',   'au_username' => 'uummpq',    'au_password' => '$2y$10$WQTu1MgTCTentDOFDQ7JLeV0rIF4w9n90890kgint19IVEOi/Da/e',  'au_type' => 'mpqua', 'au_qu_id' => '10', 'au_plain_password' => 'abcd1234'],
            ['au_user_id' => '11',   'au_username' => 'unimapmpq',    'au_password' => '$2y$10$WQTu1MgTCTentDOFDQ7JLeV0rIF4w9n90890kgint19IVEOi/Da/e',  'au_type' => 'mpqua', 'au_qu_id' => '11', 'au_plain_password' => 'abcd1234'],
            ['au_user_id' => '12',   'au_username' => 'uniszampq',    'au_password' => '$2y$10$WQTu1MgTCTentDOFDQ7JLeV0rIF4w9n90890kgint19IVEOi/Da/e',  'au_type' => 'mpqua', 'au_qu_id' => '12', 'au_plain_password' => 'abcd1234'],
            ['au_user_id' => '13',   'au_username' => 'umkmpq',    'au_password' => '$2y$10$WQTu1MgTCTentDOFDQ7JLeV0rIF4w9n90890kgint19IVEOi/Da/e',  'au_type' => 'mpqua', 'au_qu_id' => '13', 'au_plain_password' => 'abcd1234'],
            ['au_user_id' => '14',   'au_username' => 'upsimpq',    'au_password' => '$2y$10$WQTu1MgTCTentDOFDQ7JLeV0rIF4w9n90890kgint19IVEOi/Da/e',  'au_type' => 'mpqua', 'au_qu_id' => '14', 'au_plain_password' => 'abcd1234'],
            ['au_user_id' => '15',   'au_username' => 'uitmmpq',    'au_password' => '$2y$10$WQTu1MgTCTentDOFDQ7JLeV0rIF4w9n90890kgint19IVEOi/Da/e',  'au_type' => 'mpqua', 'au_qu_id' => '15', 'au_plain_password' => 'abcd1234'],
            ['au_user_id' => '16',   'au_username' => 'usimmpq',    'au_password' => '$2y$10$WQTu1MgTCTentDOFDQ7JLeV0rIF4w9n90890kgint19IVEOi/Da/e',  'au_type' => 'mpqua', 'au_qu_id' => '16', 'au_plain_password' => 'abcd1234'],
            ['au_user_id' => '17',   'au_username' => 'upnmmpq',    'au_password' => '$2y$10$WQTu1MgTCTentDOFDQ7JLeV0rIF4w9n90890kgint19IVEOi/Da/e',  'au_type' => 'mpqua', 'au_qu_id' => '17', 'au_plain_password' => 'abcd1234'],
            ['au_user_id' => '18',   'au_username' => 'utemmpq',    'au_password' => '$2y$10$WQTu1MgTCTentDOFDQ7JLeV0rIF4w9n90890kgint19IVEOi/Da/e',  'au_type' => 'mpqua', 'au_qu_id' => '18', 'au_plain_password' => 'abcd1234'],
            ['au_user_id' => '19',   'au_username' => 'umtmpq',    'au_password' => '$2y$10$WQTu1MgTCTentDOFDQ7JLeV0rIF4w9n90890kgint19IVEOi/Da/e',  'au_type' => 'mpqua', 'au_qu_id' => '19', 'au_plain_password' => 'abcd1234'],
            ['au_user_id' => '20',   'au_username' => 'umpsampq',    'au_password' => '$2y$10$WQTu1MgTCTentDOFDQ7JLeV0rIF4w9n90890kgint19IVEOi/Da/e',  'au_type' => 'mpqua', 'au_qu_id' => '20', 'au_plain_password' => 'abcd1234'],

        ];

        // Insert data into the database
        $this->db->table('qvc_upsi.auth_user')->insertBatch($data_auth_user);
    }
}
