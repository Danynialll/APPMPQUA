<?php

namespace App\Models;

use CodeIgniter\Model;

class QvcUniversityModel extends Model
{
    protected $table = 'qvc_upsi.qvc_university'; // Schema name included
    protected $returnType = 'object';
    protected $primaryKey = 'qu_id';
    protected $allowedFields = [
        'qu_code',
        'qu_name',
        'qu_type',
    ];

    protected $useSoftDeletes = true;
    protected $createdField = 'qu_created_at';
    protected $updatedField = 'qu_updated_at';
    protected $deletedField = 'qu_deleted_at';
}
