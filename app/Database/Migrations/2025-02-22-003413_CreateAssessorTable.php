<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAssessorTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'asr_id' => [
                'type'           => 'SERIAL',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'asr_name' => ['type' => 'VARCHAR', 'constraint' => 255],
            'asr_email' => ['type' => 'VARCHAR', 'constraint' => 255, 'unique' => true],
            'asr_phone' => ['type' => 'VARCHAR', 'constraint' => 20],
            'asr_service_address' => ['type' => 'TEXT'],
            'asr_qu_id' => ['type' => 'INT', 'unsigned' => true],
            'asr_image' => ['type' => 'TEXT', 'null' => true],
            'asr_verification' => ['type' => 'BOOLEAN', 'default' => false],
            'asr_created_at' => [
                'type' => 'TIMESTAMP', 
                'null'    => false,
            ],
            'asr_updated_at' => [
                'type' => 'TIMESTAMP', 
                'null' => true,
            ],
            'asr_deleted_at' => [
                'type' => 'TIMESTAMP', 
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('asr_id');
        $this->forge->addForeignKey('asr_qu_id', 'qvc_university', 'qu_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('assessor', true, ['schema' => 'qvc_upsi']);

        // ✅ Manually Set DEFAULT CURRENT_TIMESTAMP in PostgreSQL
        $db = \Config\Database::connect();
        $db->query("ALTER TABLE qvc_upsi.assessor ALTER COLUMN asr_created_at SET DEFAULT CURRENT_TIMESTAMP");
        $db->query("ALTER TABLE qvc_upsi.assessor ALTER COLUMN asr_updated_at SET DEFAULT NULL");
        $db->query("ALTER TABLE qvc_upsi.assessor ALTER COLUMN asr_deleted_at SET DEFAULT NULL");
    }

    public function down()
    {
        $this->forge->dropTable('assessor', true, true);
    }
}
