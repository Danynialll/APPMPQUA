<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthUserModel extends Model
{
    protected $table = 'qvc_upsi.auth_user'; // Schema name included
    protected $returnType = 'object';
    protected $primaryKey = 'au_id';
    protected $allowedFields = [
        'au_user_id',
        'au_username',
        'au_password',
        'au_type',
        'au_qu_id',
        'au_plain_password',
    ];

    protected $useSoftDeletes = true;
    protected $createdField = 'au_created_at';
    protected $updatedField = 'au_updated_at';
    protected $deletedField = 'au_deleted_at';
}
