<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSamcTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'samc_id' => [
                'type'           => 'SERIAL',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'samc_pvd_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'samc_asr_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null' => true
            ],
            'samc_course_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'samc_mqf_level' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'samc_duration_hours' => [
                'type'       => 'INT',
            ],
            'samc_language' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'samc_teaching_methods' => [
                'type' => 'TEXT',
            ],
            'samc_academic_credits' => [
                'type'       => 'DECIMAL',
                'constraint' => '3,1',
            ],
            'samc_prior_knowledge' => [
                'type' => 'TEXT',
            ],
            'samc_synopsis' => [
                'type' => 'TEXT',
            ],
            'samc_intended_learning_outcomes' => [
                'type' => 'TEXT',
            ],
            'samc_instructor' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'samc_ef_id' => [
                'type'     => 'INT',
                'unsigned' => true,
            ],
            'samc_status' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'samc_payment_status' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'samc_submit_date' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'samc_payment_date' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'samc_assigned_date' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'samc_reviewed_date' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'samc_review_count' => [
                'type' => 'INT',
                'null' => true,
            ],
            'samc_start_date' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'samc_expired_date' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'samc_created_at' => [
                'type'    => 'TIMESTAMP',
                'null'    => false,
            ],
            'samc_updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ],
            'samc_deleted_at' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ],
        ]);

        $this->forge->addPrimaryKey('samc_id');
        $this->forge->addForeignKey('samc_pvd_id', 'auth_user', 'au_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('samc_asr_id', 'auth_user', 'au_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('samc_ef_id', 'expertise_field', 'ef_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('samc', true, ['schema' => 'qvc_upsi']);

        // ✅ Manually Set DEFAULT CURRENT_TIMESTAMP in PostgreSQL
        $db = \Config\Database::connect();
        $db->query("ALTER TABLE qvc_upsi.samc ALTER COLUMN samc_created_at SET DEFAULT CURRENT_TIMESTAMP");
        $db->query("ALTER TABLE qvc_upsi.samc ALTER COLUMN samc_updated_at SET DEFAULT NULL");
        $db->query("ALTER TABLE qvc_upsi.samc ALTER COLUMN samc_deleted_at SET DEFAULT NULL");
    }

    public function down()
    {
        $this->forge->dropTable('samc', true, true);
    }
}
