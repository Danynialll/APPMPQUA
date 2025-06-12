<?php

namespace App\Models;

use CodeIgniter\Model;

class SamcModel extends Model
{
    protected $table = 'qvc_upsi.samc'; // Schema name included
    protected $returnType = 'object';
    protected $primaryKey = 'samc_id';
    protected $allowedFields = [
        'samc_pvd_id',
        'samc_asr_id',
        'samc_course_name',
        'samc_mqf_level',
        'samc_duration_hours',
        'samc_language',
        'samc_teaching_methods',
        'samc_academic_credits',
        'samc_prior_knowledge',
        'samc_synopsis',
        'samc_intended_learning_outcomes',
        'samc_instructor',
        'samc_ef_id',
        'samc_status',
        'samc_payment_status',
        'samc_submit_date',
        'samc_payment_date',
        'samc_assigned_date',
        'samc_reviewed_date',
        'samc_review_count',
        'samc_start_date',
        'samc_expired_date'
    ];

    protected $useSoftDeletes = true;
    protected $createdField = 'samc_created_at';
    protected $updatedField = 'samc_updated_at';
    protected $deletedField = 'samc_deleted_at';
}
