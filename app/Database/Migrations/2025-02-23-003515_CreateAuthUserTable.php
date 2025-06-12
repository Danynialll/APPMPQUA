<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAuthUserTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'au_id' => [
                'type'           => 'SERIAL',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'au_user_id' => [
                'type' => 'INT', 
                'unsigned' => true
            ],
            'au_username' => [
                'type' => 'VARCHAR', 
                'constraint' => 255
            ],
            'au_password' => [
                'type' => 'TEXT'
            ],
            'au_type' => [
                'type' => 'VARCHAR', 
                'constraint' => 50
            ],
            'au_created_at' => [
                'type' => 'TIMESTAMP', 
                'null'    => false,
            ],
            'au_updated_at' => [
                'type' => 'TIMESTAMP', 
                'null' => true,
            ],
            'au_deleted_at' => [
                'type' => 'TIMESTAMP', 
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('au_id');
        $this->forge->createTable('auth_user', true, ['schema' => 'qvc_upsi']);

        // ✅ Manually Set DEFAULT CURRENT_TIMESTAMP in PostgreSQL
        $db = \Config\Database::connect();
        $db->query("ALTER TABLE qvc_upsi.auth_user ALTER COLUMN au_created_at SET DEFAULT CURRENT_TIMESTAMP");
        $db->query("ALTER TABLE qvc_upsi.auth_user ALTER COLUMN au_updated_at SET DEFAULT NULL");
        $db->query("ALTER TABLE qvc_upsi.auth_user ALTER COLUMN au_deleted_at SET DEFAULT NULL");
    }

    public function down()
    {
        $this->forge->dropTable('auth_user', true, true);
    }
}
