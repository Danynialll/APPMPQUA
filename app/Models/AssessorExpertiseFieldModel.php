<?php

namespace App\Models;

use CodeIgniter\Model;

class AssessorExpertiseFieldModel extends Model
{
    protected $table = 'qvc_upsi.assessor_expertise_field'; // Schema name included
    protected $returnType = 'object';
    protected $primaryKey = 'aef_id';
    protected $allowedFields = [
        'aef_id',
        'aef_asr_id',
        'aef_ef_id',
        'aef_created_at',
        'aef_updated_at',
        'aef_deleted_at'
    ];

    protected $useSoftDeletes = true;
    protected $createdField = 'aef_created_at';
    protected $updatedField = 'aef_updated_at';
    protected $deletedField = 'aef_deleted_at';
}
