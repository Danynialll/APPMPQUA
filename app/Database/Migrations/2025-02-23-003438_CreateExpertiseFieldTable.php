<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateExpertiseFieldTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ef_id' => [
                'type'           => 'SERIAL',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'ef_desc' => ['type' => 'TEXT'],
            'ef_created_at' => [
                'type' => 'TIMESTAMP', 
                'null'    => false,
            ],
            'ef_updated_at' => [
                'type' => 'TIMESTAMP', 
                'null' => true,
            ],
            'ef_deleted_at' => [
                'type' => 'TIMESTAMP', 
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('ef_id');
        $this->forge->createTable('expertise_field', true, ['schema' => 'qvc_upsi']);

        // ✅ Manually Set DEFAULT CURRENT_TIMESTAMP in PostgreSQL
        $db = \Config\Database::connect();
        $db->query("ALTER TABLE qvc_upsi.expertise_field ALTER COLUMN ef_created_at SET DEFAULT CURRENT_TIMESTAMP");
        $db->query("ALTER TABLE qvc_upsi.expertise_field ALTER COLUMN ef_updated_at SET DEFAULT NULL");
        $db->query("ALTER TABLE qvc_upsi.expertise_field ALTER COLUMN ef_deleted_at SET DEFAULT NULL");
    }

    public function down()
    {
        $this->forge->dropTable('expertise_field', true, true);
    }
}
