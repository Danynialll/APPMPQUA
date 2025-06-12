<?php

namespace App\Models;

use CodeIgniter\Model;

class NotificationModel extends Model
{
    protected $table = 'qvc_upsi.notifications'; // Schema name included
    protected $returnType = 'object';
    protected $primaryKey = 'n_id';
    protected $allowedFields = [
        'n_user_id',
        'n_user_type',
        'n_title',
        'n_message',
        'n_type',
        'n_url',
        'n_is_read',
        'n_created_at',
        'n_updated_at',
        'n_deleted_at',
    ];

    protected $useSoftDeletes = false; // Notifications may not need soft deletes, change if necessary
    protected $createdField = 'n_created_at';
    protected $updatedField = 'n_updated_at';
    protected $deletedField  = 'n_deleted_at';
}
