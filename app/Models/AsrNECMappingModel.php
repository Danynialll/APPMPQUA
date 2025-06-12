<?php

namespace App\Models;

use CodeIgniter\Model;

class AsrNECMappingModel extends Model
{
    protected $table = 'qvc_upsi.asr_nec_mapping'; // Schema name included
    protected $returnType = 'object';
    protected $primaryKey = 'anm_id';
    protected $allowedFields = [
        'anm_asr_id',
        'anm_nd_id',
    ];

    protected $useSoftDeletes = true;
    protected $createdField = 'anm_created_at';
    protected $updatedField = 'anm_updated_at';
    protected $deletedField = 'anm_deleted_at';
}
