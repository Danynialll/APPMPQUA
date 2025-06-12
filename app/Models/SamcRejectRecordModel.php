<?php

namespace App\Models;

use CodeIgniter\Model;

class SamcRejectRecordModel extends Model
{
    protected $table = 'qvc_upsi.samc_reject_record'; // Schema name included
    protected $returnType = 'object';
    protected $primaryKey = 'srr_id';
    protected $allowedFields = [
        'srr_id',
        'srr_samc_id',
        'srr_asr_id',
        'srr_rejection_date',
        'srr_reason',
        'srr_created_at',
        'srr_updated_at',
        'srr_deleted_at',
    ];

    protected $useSoftDeletes = true; // Assuming no soft deletes are required for rejection records
    protected $createdField = 'srr_created_at';    // No creation date field for rejection record, but can be added if needed
    protected $updatedField = 'srr_updated_at';    // No update date field for rejection record, but can be added if needed
    protected $deletedField = 'srr_deleted_at';    // No delete field for rejection record
}
