<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSamcPaymentItemTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'spi_id' => [
                'type' => 'SERIAL',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'spi_sp_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => false
            ],
            'spi_samc_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => false
            ],
            'spi_created_at' => [
                'type' => 'TIMESTAMP',
                'null' => false,
            ],
            'spi_updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'spi_deleted_at' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ]
        ]);

        $this->forge->addPrimaryKey('spi_id');
        $this->forge->addForeignKey('spi_sp_id', 'qvc_upsi.samc_payment', 'sp_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('spi_samc_id', 'qvc_upsi.samc', 'samc_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('samc_payment_item', true, ['schema' => 'qvc_upsi']);
    }

    public function down()
    {
        $this->forge->dropTable('samc_payment_item', true, true);
    }
}
