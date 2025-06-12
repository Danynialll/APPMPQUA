<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthGroupsModel extends Model
{
    protected $table = 'qvc_upsi.auth_groups'; // Schema name included
    protected $returnType = 'object';
    protected $primaryKey = 'ag_id';
    protected $allowedFields = [
        'ag_name',
        'ag_description'
    ];

    protected $useSoftDeletes = true;
    protected $createdField = 'ag_created_at';
    protected $updatedField = 'ag_updated_at';
    protected $deletedField = 'ag_deleted_at';
}
