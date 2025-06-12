<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAssessorExpertiseFieldTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'aef_id' => [
                'type'           => 'SERIAL',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'aef_asr_id' => ['type' => 'INT', 'unsigned' => true],
            'aef_ef_id' => ['type' => 'INT', 'unsigned' => true],
            'aef_created_at' => [
                'type' => 'TIMESTAMP', 
                'null'    => false,
            ],
            'aef_updated_at' => [
                'type' => 'TIMESTAMP', 
                'null' => true,
            ],
            'aef_deleted_at' => [
                'type' => 'TIMESTAMP', 
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('aef_id');
        $this->forge->addForeignKey('aef_asr_id', 'assessor', 'asr_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('aef_ef_id', 'expertise_field', 'ef_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('assessor_expertise_field', true, ['schema' => 'qvc_upsi']);

        
        // ✅ Manually Set DEFAULT CURRENT_TIMESTAMP in PostgreSQL
        $db = \Config\Database::connect();
        $db->query("ALTER TABLE qvc_upsi.assessor_expertise_field ALTER COLUMN aef_created_at SET DEFAULT CURRENT_TIMESTAMP");
        $db->query("ALTER TABLE qvc_upsi.assessor_expertise_field ALTER COLUMN aef_updated_at SET DEFAULT NULL");
        $db->query("ALTER TABLE qvc_upsi.assessor_expertise_field ALTER COLUMN aef_deleted_at SET DEFAULT NULL");
    }

    public function down()
    {
        $this->forge->dropTable('assessor_expertise_field', true, true);
    }
}
