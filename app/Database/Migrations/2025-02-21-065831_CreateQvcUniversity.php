<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateQvcUniversity extends Migration
{
    public function up()
    {
        // Ensure the schema exists
        $this->db->query("CREATE SCHEMA IF NOT EXISTS qvc_upsi");

        // Create ENUM type for PostgreSQL
        $this->db->query("DO $$ BEGIN 
        CREATE TYPE qu_type_enum AS ENUM (
            'Public University', 'Private University', 'Polytechnic', 'University College', 
            'Community College', 'TVET Institute', 'Matriculation College');
    EXCEPTION 
        WHEN duplicate_object THEN NULL; 
    END $$;");

        $this->forge->addField([
            'qu_id' => [
                'type' => 'SERIAL', // PostgreSQL handles auto-increment via SERIAL
            ],
            'qu_code' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'unique' => true,
            ],
            'qu_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'qu_type' => [
                'type' => 'qu_type_enum', // Use the ENUM type we created
                'default' => 'Public University',
            ],
            'qu_created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'qu_updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'qu_deleted_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('qu_id');

        // Ensure the schema is included correctly
        $this->forge->createTable('qvc_university', true, ['schema' => 'qvc_upsi']);

        // ✅ Manually Set DEFAULT CURRENT_TIMESTAMP in PostgreSQL
        $db = \Config\Database::connect();
        $db->query("ALTER TABLE qvc_upsi.qvc_university ALTER COLUMN qu_created_at SET DEFAULT CURRENT_TIMESTAMP");
        $db->query("ALTER TABLE qvc_upsi.qvc_university ALTER COLUMN qu_updated_at SET DEFAULT NULL");
        $db->query("ALTER TABLE qvc_upsi.qvc_university ALTER COLUMN qu_deleted_at SET DEFAULT NULL");
    }

    public function down()
    {
        $this->forge->dropTable('qvc_upsi.qvc_university', true);
        $this->db->query("DROP TYPE IF EXISTS qu_type_enum");
    }
}
