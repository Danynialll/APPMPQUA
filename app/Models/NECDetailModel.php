<?php

namespace App\Models;

use CodeIgniter\Model;

class NECDetailModel extends Model
{
    protected $table = 'qvc_upsi.nec_detail'; // Schema name included
    protected $returnType = 'object';
    protected $primaryKey = 'nd_id';
    protected $allowedFields = [
        'nd_nn_id',
        'nd_code',
        'nd_name',
    ];

    protected $useSoftDeletes = true;
    protected $createdField = 'nd_created_at';
    protected $updatedField = 'nd_updated_at';
    protected $deletedField = 'nd_deleted_at';
}
