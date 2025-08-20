<?php

namespace App\Models;

use CodeIgniter\Model;

class AsrTypesModel extends Model
{
    protected $table = 'qvc_upsi.asr_types'; // Schema name included
    protected $returnType = 'object';
    protected $primaryKey = 'at_id';
    protected $allowedFields = [
        'at_type',
        'at_desc',
    ];

    protected $useSoftDeletes = true;
    protected $createdField = 'at_created_at';
    protected $updatedField = 'at_updated_at';
    protected $deletedField = 'at_deleted_at';
}
