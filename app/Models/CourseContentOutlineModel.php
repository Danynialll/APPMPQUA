<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseContentOutlineModel extends Model
{
    protected $table            = 'course_content_outline';
    protected $primaryKey       = 'cco_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'cco_samc_id',
        'cco_desc',
        'cco_clo',
        'cco_presentation',
        'cco_tutorial',
        'cco_practical',
        'cco_others',
        'cco_instruction_learning_hour',
        'cco_independent_learning_hour',
        'cco_created_at',
        'cco_updated_at',
        'cco_deleted_at'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'cco_created_at';
    protected $updatedField  = 'cco_updated_at';
    protected $deletedField  = 'cco_deleted_at';

    // Validation
    // protected $validationRules      = [
    //     'cco_samc_id' => 'required|integer',
    //     'cco_desc' => 'required|string',
    //     'cco_clo' => 'required|string|max_length[255]',
    //     'cco_instruction_learning_hour' => 'required|integer',
    //     'cco_independent_learning_hour' => 'required|integer',
    // ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
