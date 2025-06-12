<?php

namespace App\Models;

use CodeIgniter\Model;

class ExpertiseFieldModel extends Model
{
    protected $table = 'qvc_upsi.expertise_field'; // Schema name included
    protected $returnType = 'object';
    protected $primaryKey = 'ef_id';
    protected $allowedFields = [
        'ef_id',
        'ef_desc',
        'ef_created_at',
        'ef_updated_at',
        'ef_deleted_at',
    ];

    protected $useSoftDeletes = true;
    protected $createdField = 'ef_created_at';
    protected $updatedField = 'ef_updated_at';
    protected $deletedField = 'ef_deleted_at';
}
