<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateQvcAdminTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'qa_id' => [
                'type'           => 'SERIAL',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'qa_name' => ['type' => 'VARCHAR', 'constraint' => 255],
            'qa_email' => ['type' => 'VARCHAR', 'constraint' => 255, 'unique' => true],
            'qa_start_date' => ['type' => 'DATE'],
            'qa_expired_date' => ['type' => 'DATE'],
            'qa_qu_id' => ['type' => 'INT', 'unsigned' => true],
            'qa_level' => ['type' => 'VARCHAR', 'constraint' => 50],
            'qa_verification' => ['type' => 'BOOLEAN', 'default' => false],
            'qa_image' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'qa_created_at' => [
                'type' => 'TIMESTAMP',
                'null'    => false,
            ],
            'qa_updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'qa_deleted_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('qa_id');
        $this->forge->createTable('qvc_admin', true, ['schema' => 'qvc_upsi']);

        // ✅ Manually Set DEFAULT CURRENT_TIMESTAMP in PostgreSQL
        $db = \Config\Database::connect();
        $db->query("ALTER TABLE qvc_upsi.qvc_admin ALTER COLUMN qa_created_at SET DEFAULT CURRENT_TIMESTAMP");
        $db->query("ALTER TABLE qvc_upsi.qvc_admin ALTER COLUMN qa_updated_at SET DEFAULT NULL");
        $db->query("ALTER TABLE qvc_upsi.qvc_admin ALTER COLUMN qa_deleted_at SET DEFAULT NULL");
    }

    public function down()
    {
        $this->forge->dropTable('qvc_admin', true, true);
    }
}
