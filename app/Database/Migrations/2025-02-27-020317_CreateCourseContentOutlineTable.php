<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCourseContentOutlineTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'cco_id' => [
                'type'           => 'SERIAL',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'cco_samc_id' => [
                'type'     => 'INT',
                'unsigned' => true,
            ],
            'cco_desc' => [
                'type' => 'TEXT',
            ],
            'cco_clo' => [
                'type'       => 'VARCHAR',
                'constraint' => 255, // Example values: 'CLO1', 'CLO2', 'CLO10'
            ],
            'cco_presentation' => [
                'type' => 'INT',
                'null' => true,
            ],
            'cco_tutorial' => [
                'type' => 'INT',
                'null' => true,
            ],
            'cco_practical' => [
                'type' => 'INT',
                'null' => true,
            ],
            'cco_others' => [
                'type' => 'INT',
                'null' => true,
            ],
            'cco_instruction_learning_hour' => [
                'type' => 'INT',
            ],
            'cco_independent_learning_hour' => [
                'type' => 'INT',
            ],
            'cco_created_at' => [
                'type'    => 'TIMESTAMP',
                'null'    => false,
            ],
            'cco_updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'cco_deleted_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);

        // Primary Key
        $this->forge->addPrimaryKey('cco_id');

        // Foreign Key
        $this->forge->addForeignKey('cco_samc_id', 'samc', 'samc_id', 'CASCADE', 'CASCADE');

        // Create Table in qvc_upsi Schema
        $this->forge->createTable('course_content_outline', true, ['schema' => 'qvc_upsi']);

        // ✅ Manually Set DEFAULT CURRENT_TIMESTAMP in PostgreSQL
        $db = \Config\Database::connect();
        $db->query("ALTER TABLE qvc_upsi.course_content_outline ALTER COLUMN cco_created_at SET DEFAULT CURRENT_TIMESTAMP");
        $db->query("ALTER TABLE qvc_upsi.course_content_outline ALTER COLUMN cco_updated_at SET DEFAULT NULL");
        $db->query("ALTER TABLE qvc_upsi.course_content_outline ALTER COLUMN cco_deleted_at SET DEFAULT NULL");
    }

    public function down()
    {
        $this->forge->dropTable('course_content_outline', true, true);
    }
}
