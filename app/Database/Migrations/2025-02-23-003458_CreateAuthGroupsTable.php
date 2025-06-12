<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAuthGroupsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ag_id' => [
                'type'           => 'SERIAL',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'ag_name' => ['type' => 'VARCHAR', 'constraint' => 255],
            'ag_description' => ['type' => 'TEXT'],
            'ag_created_at' => [
                'type' => 'TIMESTAMP', 
                'null'    => false,
            ],
            'ag_updated_at' => [
                'type' => 'TIMESTAMP', 
                'null' => true,
            ],
            'ag_deleted_at' => [
                'type' => 'TIMESTAMP', 
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('ag_id');
        $this->forge->createTable('auth_groups', true, ['schema' => 'qvc_upsi']);

        // ✅ Manually Set DEFAULT CURRENT_TIMESTAMP in PostgreSQL
        $db = \Config\Database::connect();
        $db->query("ALTER TABLE qvc_upsi.auth_groups ALTER COLUMN ag_created_at SET DEFAULT CURRENT_TIMESTAMP");
        $db->query("ALTER TABLE qvc_upsi.auth_groups ALTER COLUMN ag_updated_at SET DEFAULT NULL");
        $db->query("ALTER TABLE qvc_upsi.auth_groups ALTER COLUMN ag_deleted_at SET DEFAULT NULL");
    }

    public function down()
    {
        $this->forge->dropTable('auth_groups', true, true);
    }
}
