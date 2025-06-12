<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProviderTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'pvd_id' => [
                'type'           => 'SERIAL',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'pvd_name' => ['type' => 'VARCHAR', 'constraint' => 255],
            'pvd_email' => ['type' => 'VARCHAR', 'constraint' => 255, 'unique' => true],
            'pvd_ssm_number' => ['type' => 'VARCHAR', 'constraint' => 50],
            'pvd_ssm_cert' => ['type' => 'TEXT', 'null' => true],
            'pvd_type' => ['type' => 'VARCHAR', 'constraint' => 100],
            'pvd_address' => ['type' => 'TEXT'],
            'pvd_doe' => ['type' => 'DATE'],
            'pvd_phone' => ['type' => 'VARCHAR', 'constraint' => 20],
            'pvd_verification' => ['type' => 'BOOLEAN', 'default' => false],
            'pvd_image' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'pvd_created_at' => [
                'type' => 'TIMESTAMP',
                'null'    => false,
            ],
            'pvd_updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'pvd_deleted_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('pvd_id');
        $this->forge->createTable('provider', true, ['schema' => 'qvc_upsi']);

        // ✅ Manually Set DEFAULT CURRENT_TIMESTAMP in PostgreSQL
        $db = \Config\Database::connect();
        $db->query("ALTER TABLE qvc_upsi.provider ALTER COLUMN pvd_created_at SET DEFAULT CURRENT_TIMESTAMP");
        $db->query("ALTER TABLE qvc_upsi.provider ALTER COLUMN pvd_updated_at SET DEFAULT NULL");
        $db->query("ALTER TABLE qvc_upsi.provider ALTER COLUMN pvd_deleted_at SET DEFAULT NULL");
    }

    public function down()
    {
        $this->forge->dropTable('provider', true, true);
    }
}
