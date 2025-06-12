<?php

namespace App\Models;

use CodeIgniter\Model;

class SamcPaymentModel extends Model
{
    protected $table = 'qvc_upsi.samc_payment'; // Schema name included
    protected $returnType = 'object';
    protected $primaryKey = 'sp_id';
    protected $allowedFields = [
        'sp_id',
        'sp_pvd_id',
        'sp_invoice_number',
        'sp_amount',
        'sp_method',
        'sp_status',
        'sp_prove',
        'sp_remarks',
        'sp_log',
        'sp_reff_num',
        'sp_created_at',
        'sp_updated_at',
        'sp_deleted_at',
    ];

    protected $useSoftDeletes = true; // Assuming no soft deletes are required for rejection records
    protected $createdField = 'sp_created_at';    // No creation date field for rejection record, but can be added if needed
    protected $updatedField = 'sp_updated_at';    // No update date field for rejection record, but can be added if needed
    protected $deletedField = 'sp_deleted_at';    // No delete field for rejection record
}
