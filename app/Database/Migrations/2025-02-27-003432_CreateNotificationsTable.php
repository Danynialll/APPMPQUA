<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateNotificationsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'n_id' => [
                'type'           => 'SERIAL',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'n_user_id' => [
                'type' => 'INT',
                'unsigned' => true
            ],
            'n_user_type' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'n_title' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'n_message' => [
                'type' => 'TEXT'
            ],
            'n_type' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'n_url' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'n_is_read' => [
                'type' => 'BOOLEAN',
                'default' => false
            ],
            'n_created_at' => [
                'type' => 'TIMESTAMP',
                'null'    => false,
            ],
            'n_updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'n_deleted_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('n_id');
        $this->forge->createTable('notifications', true, ['schema' => 'qvc_upsi']);

        // ✅ Manually Set DEFAULT CURRENT_TIMESTAMP in PostgreSQL
        $db = \Config\Database::connect();
        $db->query("ALTER TABLE qvc_upsi.notifications ALTER COLUMN n_created_at SET DEFAULT CURRENT_TIMESTAMP");
        $db->query("ALTER TABLE qvc_upsi.notifications ALTER COLUMN n_updated_at SET DEFAULT NULL");
        $db->query("ALTER TABLE qvc_upsi.notifications ALTER COLUMN n_deleted_at SET DEFAULT NULL");
    }

    public function down()
    {
        $this->forge->dropTable('notifications', true, true);
    }
}
