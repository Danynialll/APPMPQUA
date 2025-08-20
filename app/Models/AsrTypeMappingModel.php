<?php

namespace App\Models;

use CodeIgniter\Model;

class AsrTypeMappingModel extends Model
{
    protected $table = 'qvc_upsi.asr_type_mapping'; // Schema name included
    protected $returnType = 'object';
    protected $primaryKey = 'atm_id';
    protected $allowedFields = [
        'atm_at_id',
        'atm_asr_id',
    ];

    protected $useSoftDeletes = true;
    protected $createdField = 'atm_created_at';
    protected $updatedField = 'atm_updated_at';
    protected $deletedField = 'atm_deleted_at';
}
