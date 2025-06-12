<?php

namespace App\Models;

use CodeIgniter\Model;

class QvcAdminModel extends Model
{
    protected $table = 'qvc_upsi.qvc_admin'; // Schema name included
    protected $returnType = 'object';
    protected $primaryKey = 'qa_id';
    protected $allowedFields = [
        'qa_name',
        'qa_email',
        'qa_start_date',
        'qa_expired_date',
        'qa_qu_id',
        'qa_verification',
        'qa_level',
        'qa_image'
    ];

    protected $useSoftDeletes = true;
    protected $createdField = 'qa_created_at';
    protected $updatedField = 'qa_updated_at';
    protected $deletedField = 'qa_deleted_at';
}
