<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSamcAssessmentTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'sa_id' => [
                'type'           => 'SERIAL',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'sa_samc_id' => [
                'type'     => 'INT',
                'unsigned' => true,
            ],
            'sa_desc' => [
                'type' => 'TEXT',
            ],
            'sa_type' => [
                'type'       => 'VARCHAR',
                'constraint' => 50, // Possible values: 'continuous', 'final'
            ],
            'sa_percentage' => [
                'type'       => 'INT',
            ],
            'sa_instruction_learning_hour' => [
                'type' => 'INT',
            ],
            'sa_independent_learning_hour' => [
                'type' => 'INT',
            ],
            'sa_created_at' => [
                'type'    => 'TIMESTAMP',
                'null'    => false,
            ],
            'sa_updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'sa_deleted_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);

        // Primary Key
        $this->forge->addPrimaryKey('sa_id');

        // Foreign Key
        $this->forge->addForeignKey('sa_samc_id', 'samc', 'samc_id', 'CASCADE', 'CASCADE');

        // Create Table in qvc_upsi Schema
        $this->forge->createTable('samc_assessment', true, ['schema' => 'qvc_upsi']);

        // ✅ Manually Set DEFAULT CURRENT_TIMESTAMP in PostgreSQL
        $db = \Config\Database::connect();
        $db->query("ALTER TABLE qvc_upsi.samc_assessment ALTER COLUMN sa_created_at SET DEFAULT CURRENT_TIMESTAMP");
        $db->query("ALTER TABLE qvc_upsi.samc_assessment ALTER COLUMN sa_updated_at SET DEFAULT NULL");
        $db->query("ALTER TABLE qvc_upsi.samc_assessment ALTER COLUMN sa_deleted_at SET DEFAULT NULL");
    }

    public function down()
    {
        $this->forge->dropTable('samc_assessment', true, true);
    }
}
