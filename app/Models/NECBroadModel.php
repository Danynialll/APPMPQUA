<?php

namespace App\Models;

use CodeIgniter\Model;

class NECBroadModel extends Model
{
    protected $table = 'qvc_upsi.nec_broad'; // Schema name included
    protected $returnType = 'object';
    protected $primaryKey = 'nb_id';
    protected $allowedFields = [
        'nb_code',
        'nb_name',
    ];

    protected $useSoftDeletes = true;
    protected $createdField = 'nb_created_at';
    protected $updatedField = 'nb_updated_at';
    protected $deletedField = 'nb_deleted_at';
}
