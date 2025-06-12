<?php

namespace App\Models;

use CodeIgniter\Model;

class SamcAssessmentModel extends Model
{
    protected $table            = 'samc_assessment';
    protected $primaryKey       = 'sa_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'sa_samc_id',
        'sa_desc',
        'sa_type',
        'sa_percentage',
        'sa_instruction_learning_hour',
        'sa_independent_learning_hour',
        'sa_created_at',
        'sa_updated_at',
        'sa_deleted_at'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'sa_created_at';
    protected $updatedField  = 'sa_updated_at';
    protected $deletedField  = 'sa_deleted_at';

    // Validation
    // protected $validationRules      = [
    //     'sa_samc_id' => 'required|integer',
    //     'sa_type' => 'required|string|max_length[50]',
    //     'sa_percentage' => 'required|decimal',
    //     'sa_instruction_learning_hour' => 'required|integer',
    //     'sa_independent_learning_hour' => 'required|integer',
    // ];
    // protected $validationMessages   = [];
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
