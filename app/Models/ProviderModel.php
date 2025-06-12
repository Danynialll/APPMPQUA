<?php

namespace App\Models;

use CodeIgniter\Model;

class ProviderModel extends Model
{
    protected $table = 'qvc_upsi.provider'; // Schema name included
    protected $returnType = 'object';
    protected $primaryKey = 'pvd_id';
    protected $allowedFields = [
        'pvd_name',
        'pvd_email',
        'pvd_ssm_number',
        'pvd_ssm_cert',
        'pvd_type',
        'pvd_address',
        'pvd_doe',
        'pvd_phone',
        'pvd_verification',
        'pvd_image'
    ];

    protected $useSoftDeletes = true;
    protected $createdField = 'pvd_created_at';
    protected $updatedField = 'pvd_updated_at';
    protected $deletedField = 'pvd_deleted_at';
}
