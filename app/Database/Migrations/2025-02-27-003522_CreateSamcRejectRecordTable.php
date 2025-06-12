<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSamcRejectRecordTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'srr_id' => [
                'type'           => 'SERIAL',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'srr_samc_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'srr_asr_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'srr_rejection_date' => [
                'type' => 'TIMESTAMP',
                'null' => false,
            ],
            'srr_reason' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'srr_created_at' => [
                'type'    => 'TIMESTAMP',
                'null'    => false,
            ],
            'srr_updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'srr_deleted_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);

        // Primary Key
        $this->forge->addPrimaryKey('srr_id');

        // Foreign Keys
        $this->forge->addForeignKey('srr_samc_id', 'samc', 'samc_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('srr_asr_id', 'assessor', 'asr_id', 'CASCADE', 'CASCADE');

        // Create Table in qvc_upsi Schema
        $this->forge->createTable('samc_reject_record', true, ['schema' => 'qvc_upsi']);

        // ✅ Manually Set DEFAULT CURRENT_TIMESTAMP in PostgreSQL
        $db = \Config\Database::connect();
        $db->query("ALTER TABLE qvc_upsi.samc_reject_record ALTER COLUMN srr_created_at SET DEFAULT CURRENT_TIMESTAMP");
        $db->query("ALTER TABLE qvc_upsi.samc_reject_record ALTER COLUMN srr_updated_at SET DEFAULT NULL");
        $db->query("ALTER TABLE qvc_upsi.samc_reject_record ALTER COLUMN srr_deleted_at SET DEFAULT NULL");
    }

    public function down()
    {
        $this->forge->dropTable('samc_reject_record', true, true);
    }
}
