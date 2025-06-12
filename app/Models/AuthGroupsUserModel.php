<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthGroupsUserModel extends Model
{
    protected $table = 'qvc_upsi.auth_groups_user'; // Schema name included
    protected $returnType = 'object';
    protected $primaryKey = 'agu_id';
    protected $allowedFields = [
        'agu_group_id',
        'agu_user_id'
    ];

    protected $useSoftDeletes = true;
    protected $createdField = 'agu_created_at';
    protected $updatedField = 'agu_updated_at';
    protected $deletedField = 'agu_deleted_at';
}
