<?php

namespace App\Models;

use CodeIgniter\Model;

class SamcReviewModel extends Model
{
    protected $table            = 'samc_review';
    protected $primaryKey       = 'sr_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'sr_samc_id',
        'sr_counter',
        'sr_samc_name',
        'sr_samc_name_status',
        'sr_mqf_level',
        'sr_mqf_level_status',
        'sr_duration_hours',
        'sr_duration_hours_status',
        'sr_teaching_methods',
        'sr_teaching_methods_status',
        'sr_academic_credits',
        'sr_academic_credits_status',
        'sr_synopsis',
        'sr_synopsis_status',
        'sr_intended_learning_outcomes',
        'sr_intended_learning_outcomes_status',
        'sr_content_outline',
        'sr_content_outline_status',
        'sr_assessment',
        'sr_assessment_status',
        'sr_review_status',
        'sr_created_at',
        'sr_updated_at',
        'sr_deleted_at'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'sr_created_at';
    protected $updatedField  = 'sr_updated_at';
    protected $deletedField  = 'sr_deleted_at';

    // Optional
    // Validation
    // protected $validationRules      = [
    //     'sr_samc_id' => 'required|integer',
    //     'sr_counter' => 'required|string|max_length[50]',
    //     'sr_samc_name' => 'required|string|max_length[50]',
    //     'sr_mqf_level' => 'required|string|max_length[50]',
    //     'sr_duration_hours' => 'required|integer',
    //     'sr_academic_credits' => 'required|decimal',
    //     'sr_synopsis' => 'required|string',
    //     'sr_intended_learning_outcomes' => 'required|string',
    //     'sr_content_outline' => 'required|string',
    //     'sr_assessment' => 'required|string',
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
