<?php

namespace App\Models;

use CodeIgniter\Model;

class SamcPaymentItemModel extends Model
{
    protected $table = 'qvc_upsi.samc_payment_item'; // Schema name included
    protected $returnType = 'object';
    protected $primaryKey = 'spi_id';
    protected $allowedFields = [
        'spi_id',
        'spi_sp_id',
        'spi_samc_id',
        'spi_created_at',
        'spi_updated_at',
        'spi_deleted_at',
    ];

    protected $useSoftDeletes = true; // Assuming no soft deletes are required for rejection records
    protected $createdField = 'spi_created_at';    // No creation date field for rejection record, but can be added if needed
    protected $updatedField = 'spi_updated_at';    // No update date field for rejection record, but can be added if needed
    protected $deletedField = 'spi_deleted_at';    // No delete field for rejection record
}
