<?php

namespace App\Models;

use CodeIgniter\Model;

class NECNarrowModel extends Model
{
    protected $table = 'qvc_upsi.nec_narrow'; // Schema name included
    protected $returnType = 'object';
    protected $primaryKey = 'nn_id';
    protected $allowedFields = [
        'nn_nb_id',
        'nn_code',
        'nn_name',
    ];

    protected $useSoftDeletes = true;
    protected $createdField = 'nn_created_at';
    protected $updatedField = 'nn_updated_at';
    protected $deletedField = 'nn_deleted_at';
}
