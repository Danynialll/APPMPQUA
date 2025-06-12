<?php

namespace App\Models;

use CodeIgniter\Model;

class AssessorModel extends Model
{
    protected $table = 'qvc_upsi.assessor'; // Schema name included
    protected $returnType = 'object';
    protected $primaryKey = 'asr_id';
    protected $allowedFields = [
        'asr_name',
        'asr_email',
        'asr_phone',
        'asr_service_address',
        'asr_qu_id',
        'asr_image',
        'asr_verification',
        'asr_fax',
        'asr_retirement_date',
        'asr_gender',
        'asr_cv_path',
    ];
    
    protected $useSoftDeletes = true;
    protected $createdField = 'asr_created_at';
    protected $updatedField = 'asr_updated_at';
    protected $deletedField = 'asr_deleted_at';
}
