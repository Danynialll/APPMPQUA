<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSamcPaymentTable extends Migration
{
    public function up()
    {

        $this->forge->addField([
            'sp_id' => [
                'type'              => 'SERIAL',
                'unsigned'          => true,
                'auto_increment'    => true
            ],
            'sp_pvd_id' => [
                'type' => 'INT',
                'null' => false
            ],
            'sp_invoice_number' => [
                'type'          => 'VARCHAR',
                'constraint'    => 50,
                'null'          => true
            ],
            'sp_amount' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => false
            ],
            'sp_method' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false
            ],
            'sp_status' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => false
            ],
            'sp_prove' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'sp_created_at' => [
                'type' => 'TIMESTAMP',
                'null' => false,
            ],
            'sp_updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'sp_deleted_at' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ],
            'sp_remarks' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'sp_log' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'sp_reff_num' => [
                'type'          => 'VARCHAR',
                'constraint'    => 50,
                'null'          => true
            ],
        ]);

        $this->forge->addPrimaryKey('sp_id');
        $this->forge->addForeignKey('sp_pvd_id', 'auth_user', 'au_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('samc_payment', true, ['schema' => 'qvc_upsi']);
    }

    public function down()
    {
        $this->forge->dropTable('samc_payment', true, true);
    }
}
