<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSamcReviewTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'sr_id' => [
                'type'           => 'SERIAL',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'sr_samc_id' => [
                'type'     => 'INT',
                'unsigned' => true,
            ],
            'sr_counter' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'sr_samc_name' => [
                'type' => 'TEXT',
            ],
            'sr_samc_name_status' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'sr_mqf_level' => [
                'type' => 'TEXT',
            ],
            'sr_mqf_level_status' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'sr_duration_hours' => [
                'type' => 'TEXT',
            ],
            'sr_duration_hours_status' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'sr_teaching_methods' => [
                'type' => 'TEXT',
            ],
            'sr_teaching_methods_status' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'sr_academic_credits' => [
                'type' => 'TEXT',
            ],
            'sr_academic_credits_status' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'sr_synopsis' => [
                'type' => 'TEXT',
            ],
            'sr_synopsis_status' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'sr_intended_learning_outcomes' => [
                'type' => 'TEXT',
            ],
            'sr_intended_learning_outcomes_status' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'sr_content_outline' => [
                'type' => 'TEXT',
            ],
            'sr_content_outline_status' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'sr_assessment' => [
                'type' => 'TEXT',
            ],
            'sr_assessment_status' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'sr_review_status' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'sr_created_at' => [
                'type' => 'TIMESTAMP',
                'null'    => false,
            ],
            'sr_updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'sr_deleted_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('sr_id');
        $this->forge->addForeignKey('sr_samc_id', 'samc', 'samc_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('samc_review', true, ['schema' => 'qvc_upsi']);

        // ✅ Manually Set DEFAULT CURRENT_TIMESTAMP in PostgreSQL
        $db = \Config\Database::connect();
        $db->query("ALTER TABLE qvc_upsi.samc_review ALTER COLUMN sr_created_at SET DEFAULT CURRENT_TIMESTAMP");
        $db->query("ALTER TABLE qvc_upsi.samc_review ALTER COLUMN sr_updated_at SET DEFAULT NULL");
        $db->query("ALTER TABLE qvc_upsi.samc_review ALTER COLUMN sr_deleted_at SET DEFAULT NULL");
    }

    public function down()
    {
        $this->forge->dropTable('samc_review', true, true);
    }
}
