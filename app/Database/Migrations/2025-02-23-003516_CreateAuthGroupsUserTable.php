<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAuthGroupsUserTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'agu_id' => [
                'type'           => 'SERIAL',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'agu_group_id' => ['type' => 'INT', 'unsigned' => true],
            'agu_user_id' => ['type' => 'INT', 'unsigned' => true],
            'agu_created_at' => [
                'type' => 'TIMESTAMP', 
                'null'    => false,
            ],
            'agu_updated_at' => [
                'type' => 'TIMESTAMP', 
                'null' => true,
            ],
            'agu_deleted_at' => [
                'type' => 'TIMESTAMP', 
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('agu_id');
        $this->forge->createTable('auth_groups_user', true, ['schema' => 'qvc_upsi']);

        // ✅ Manually Set DEFAULT CURRENT_TIMESTAMP in PostgreSQL
        $db = \Config\Database::connect();
        $db->query("ALTER TABLE qvc_upsi.auth_groups_user ALTER COLUMN agu_created_at SET DEFAULT CURRENT_TIMESTAMP");
        $db->query("ALTER TABLE qvc_upsi.auth_groups_user ALTER COLUMN agu_updated_at SET DEFAULT NULL");
        $db->query("ALTER TABLE qvc_upsi.auth_groups_user ALTER COLUMN agu_deleted_at SET DEFAULT NULL");
    }

    public function down()
    {
        $this->forge->dropTable('auth_groups_user', true, true);
    }
}
