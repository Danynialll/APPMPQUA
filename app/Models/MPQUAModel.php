<?php

namespace App\Models;

use CodeIgniter\Model;

class MPQUAModel extends Model
{
    protected $table = 'qvc_upsi.mpqua'; // Schema name included
    protected $returnType = 'object';
    protected $primaryKey = 'mpq_id';
    protected $allowedFields = [
        'mpq_address',
        'mpq_email',
        'mpq_phone',
        'mpq_fax',
        'mpq_qu_id',
        'mpq_image',
    ];

    protected $useSoftDeletes = true;
    protected $createdField = 'mpq_created_at';
    protected $updatedField = 'mpq_updated_at';
    protected $deletedField = 'mpq_deleted_at';
}
