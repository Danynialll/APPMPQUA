<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!-- Import table styling -->
<link rel="stylesheet" href="<?= base_url('assets/css/custom_table.css'); ?>">

<style>
    /* Modern formal styling */
    :root {
        /* --primary-color: #1e40af; */
        --secondary-color: #f8fafc;
        --accent-color: #0284c7;
        --text-color: #334155;
        --border-radius: 8px;
        --box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        --primary-color: #1a73e8;
        /* --secondary-color: #f8f9fa; */
        /* --accent-color: #34a853; */
        --danger-color: #ea4335;
        --text-dark: #202124;
        --text-light: rgb(0 0 0 / 0.175);
        --border-color: #dadce0;
    }

    .samc-card {
        border-radius: 8px;
        box-shadow: var(--card-shadow);
        border: none;
        background-color: white;
        transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
        margin-bottom: 24px;
    }

    .samc-card:hover {
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
    }

    .samc-header {
        color: white;
        padding: 16px;
        border-radius: 8px 8px 0 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .samc-header h5 {
        margin: 0;
        font-weight: 500;
    }

    .samc-actions {
        position: sticky;
        top: 0;
        z-index: 100;
        display: flex;
        justify-content: flex-end;
        gap: 12px;
    }

    .btn-action {
        border: 1px solid;
        padding: 8px 16px;
        border-radius: 4px;
        font-weight: 500;
        font-size: 12px;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.2s;
    }

    .btn-assign {
        background-color: #0284c700;
        color: white;
    }

    .btn-assign:hover {
        background-color: rgb(255, 255, 255);
        color: var(--primary-color);
    }

    .btn-return {
        background-color: var(--danger-color);
        color: white;
    }

    .btn-return:hover {
        background-color: #d33426;
    }

    .btn-submit {
        background-color: var(--primary-color);
        color: white;
        padding: 10px 24px;
        border: none;
        border-radius: 4px;
        font-weight: 500;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    .btn-submit:hover {
        background-color: #0d62d1;
    }

    .btn-save-draft {
        background-color: #0284c700;
        color: white;
    }

    .btn-save-draft:hover {
        background-color: rgb(255, 255, 255);
        color: var(--primary-color);
    }


    /* Table styling */
    .samc-table {
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 20px;
    }

    .samc-table th,
    .samc-table td {
        border: 1px solid var(--border-color);
        padding: 12px;
    }

    .samc-table th {
        background-color: var(--secondary-color);
        font-weight: 500;
        text-align: left;
    }

    .section-header {
        background-color: var(--primary-color);
        color: white;
        padding: 12px;
        font-weight: 500;
    }

    .section-subheader {
        background-color: var(--secondary-color);
        color: var(--text-dark);
        text-align: center;
        font-weight: 500;
    }

    /* Tabbed navigation */
    .samc-tabs {
        display: flex;
        background-color: var(--bs-light);
        border-bottom: 1px solid var(--border-color);
        overflow-x: auto;
        margin-bottom: 20px;
    }

    .samc-tab {
        padding: 12px 24px;
        cursor: pointer;
        border-bottom: 3px solid transparent;
        white-space: nowrap;
        font-weight: 500;
        transition: all 0.2s ease;
        color: var(--dark-color);
    }

    .samc-tab:hover {
        background-color: rgba(26, 115, 232, 0.05);
    }

    .samc-tab.active {
        border-bottom: 3px solid var(--primary-color);
        color: var(--primary-color);
    }

    .tab-content {
        display: none;
        padding: 20px;
    }

    .tab-content.active {
        display: block;
    }

    /* Badge styling */
    .badge {
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: normal;
    }

    .badge-success {
        background-color: #e6f4ea;
        color: #137333;
    }

    .badge-info {
        background-color: #e8f0fe;
        color: #1967d2;
    }

    .badge-warning {
        background-color: #fef7e0;
        color: #b06000;
    }

    /* Assessment form styling */
    .assessment-form {
        background-color: white;
        border: 1px solid var(--border-color) !important;
        border-radius: 8px;
        box-shadow: var(--card-shadow);
        padding: 24px;
    }

    .assessment-section {
        margin-bottom: 32px;
    }

    .assessment-section-title {
        font-size: 18px;
        font-weight: 500;
        color: var(--primary-color);
        margin-bottom: 16px;
        padding-bottom: 8px;
        border-bottom: 2px solid var(--primary-color);
    }

    .assessment-item {
        margin-bottom: 20px;
        padding: 16px;
        border-radius: 8px;
        border: 1px solid var(--border-color);
        background-color: var(--secondary-color);
        transition: all 0.2s ease;
    }

    .assessment-item:hover {
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .assessment-item-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
    }

    .assessment-item-title {
        font-weight: 500;
        color: var(--text-dark);
        margin-bottom: 8px;
    }

    .assessment-options {
        display: flex;
        gap: 16px;
        align-items: center;
        flex-wrap: wrap;
    }

    .option-group {
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .assessment-remarks {
        margin-top: 12px;
    }

    .assessment-remarks textarea {
        border: 1px solid var(--border-color);
        border-radius: 4px;
        padding: 8px 12px;
        width: 100%;
        min-height: 80px;
        font-size: 14px;
        transition: border-color 0.2s;
    }

    .assessment-remarks textarea:focus {
        border-color: var(--primary-color);
        outline: none;
        box-shadow: 0 0 0 2px rgba(26, 115, 232, 0.2);
    }

    .form-actions {
        display: flex;
        justify-content: space-between;
        margin-top: 32px;
        padding-top: 20px;
        border-top: 1px solid var(--border-color);
    }

    .assessment-summary {
        background-color: #ffffff;
        border: 1px solid var(--border-color) !important;
        border-radius: 8px;
        padding: 16px;
        margin-bottom: 24px;
    }

    .summary-title {
        font-weight: 500;
        margin-bottom: 12px;
        color: var(--text-dark);
    }

    /* Tooltip styling */
    .tooltip-icon {
        color: var(--text-light);
        margin-left: 8px;
        cursor: help;
    }

    /* Radio and checkbox styling */
    .custom-radio,
    .custom-checkbox {
        display: flex;
        align-items: center;
        margin-right: 16px;
        cursor: pointer;
    }

    .custom-radio input,
    .custom-checkbox input {
        margin-right: 8px;
    }

    .custom-radio label,
    .custom-checkbox label {
        color: var(--text-dark);
        cursor: pointer;
    }

    .assessment-summary {
        transition: all 0.3s ease;
    }

    .assessment-summary:hover {
        transform: translateY(-2px);
    }

    .progress-bar {
        transition: width 0.6s ease, background 0.3s ease;
    }

    .progress-stat {
        font-size: 0.9rem;
    }

    .badge {
        font-weight: 600;
    }

    .progress-bar {
        height: 18px !important;
    }

    @media (max-width: 576px) {
        .d-flex.justify-content-between {
            flex-direction: column;
            gap: 8px;
        }
    }

    /* Responsive layout */
    @media (max-width: 768px) {
        .samc-layout {
            flex-direction: column;
        }

        .assessment-item-header {
            flex-direction: column;
        }

        .assessment-options {
            margin-top: 12px;
        }
    }
</style>

<div class="container-fluid py-4">
    <!-- Main card with SAMC details -->
    <div class="samc-card mb-4">
        <!-- Header with status badge -->
        <div class="samc-header bg-gradient-primary">
            <div>
                <h5 class="text-dark"><b><i class="fas fa-certificate me-2"></i>SAMC Validation</b></h5>
                <span class="badge badge-info"> Due in 7 days</span>
            </div>
            <div class="samc-actions">
                <button class="btn-action btn-assign filter-btn" id="jumpToForm">
                    <i class="fas fa-clipboard-check"></i> Jump to Assessment Form
                </button>
            </div>
        </div>

        <!-- Tab Navigation -->
        <div class="samc-tabs">
            <div class="samc-tab active" data-tab="details">Course Details</div>
            <div class="samc-tab" data-tab="outline">Course Outline</div>
            <div class="samc-tab" data-tab="assessment">Assessment</div>
            <div class="samc-tab" data-tab="review">Your Review</div>
        </div>

        <!-- Details Tab Content -->
        <div class="tab-content active" id="details-tab">
            <table class="samc-table">
                <tbody>
                    <tr>
                        <th>Name of the SAMC</th>
                        <td><?= $samc_data->samc_course_name ?></td>
                    </tr>
                    <tr>
                        <th>MQF Level/Levels</th>
                        <td><?= get_mqf_level($samc_data->samc_mqf_level) ?></td>
                    </tr>
                    <tr>
                        <th>Duration (In Hours)</th>
                        <td><?= $samc_data->samc_duration_hours ?></td>
                    </tr>
                    <tr>
                        <th>Classification of Knowledge, Skills or Attitude</th>
                        <td><?= $samc_field ?></td>
                    </tr>
                    <tr>
                        <th>Language of Instruction</th>
                        <td><?= $samc_data->samc_language ?></td>
                    </tr>
                    <tr>
                        <th>Method of Instruction and Learning</th>
                        <td><?= $samc_data->samc_teaching_methods ?></td>
                    </tr>
                    <tr>
                        <th>Academic Credits</th>
                        <td><?= $samc_data->samc_academic_credits ?></td>
                    </tr>
                    <tr>
                        <th>Prior Knowledge / Experience</th>
                        <td><?= $samc_data->samc_prior_knowledge ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Outline Tab Content -->
        <div class="tab-content" id="outline-tab">
            <table class="samc-table">
                <tbody>
                    <tr>
                        <th width="30%">SAMC Synopsis</th>
                        <td><?= $samc_data->samc_synopsis ?></td>
                    </tr>
                    <tr>
                        <th>SAMC Intended Learning Outcomes</th>
                        <td><?= $samc_data->samc_intended_learning_outcomes ?></td>
                    </tr>
                    <tr>
                        <th>Instructor/s</th>
                        <td><?= $samc_data->samc_instructor ?></td>
                    </tr>
                </tbody>
            </table>

            <h6 class="mt-4 mb-3">Course Content Outline</h6>
            <div class="table-responsive">
                <table class="samc-table">
                    <thead>
                        <tr>
                            <th rowspan="3" width="30%">Content</th>
                            <th colspan="7" class="text-center">Instructional and Learning Activities</th>
                        </tr>
                        <tr>
                            <th colspan="4" class="text-center">Guided Instruction (F2F)</th>
                            <th rowspan="2" class="text-center">Guided Instruction (NF2F)</th>
                            <th rowspan="2" class="text-center">Independent Learning</th>
                            <th rowspan="2" class="text-center">Total LT</th>
                        </tr>
                        <tr>
                            <th class="text-center">Presentation</th>
                            <th class="text-center">Tutorial</th>
                            <th class="text-center">Practical</th>
                            <th class="text-center">Others</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total_cco_sum = 0;
                        foreach ($samc_cco_data as $cco):
                            $total_cco = $cco->cco_independent_learning_hour + $cco->cco_instruction_learning_hour + $cco->cco_others + $cco->cco_practical + $cco->cco_presentation + $cco->cco_tutorial;
                            $total_cco_sum += $total_cco;
                        ?>
                            <tr>
                                <td><?= $cco->cco_desc ?></td>
                                <td class="text-center"><?= $cco->cco_presentation ?></td>
                                <td class="text-center"><?= $cco->cco_tutorial ?></td>
                                <td class="text-center"><?= $cco->cco_practical ?></td>
                                <td class="text-center"><?= $cco->cco_others ?></td>
                                <td class="text-center"><?= $cco->cco_instruction_learning_hour ?></td>
                                <td class="text-center"><?= $cco->cco_independent_learning_hour ?></td>
                                <td class="text-center"><?= $total_cco ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Assessment Tab Content -->
        <div class="tab-content" id="assessment-tab">
            <h6 class="mb-3">Continuous Assessment</h6>
            <div class="table-responsive">
                <table class="samc-table">
                    <thead>
                        <tr>
                            <th width="30%">Description</th>
                            <th>Percentage</th>
                            <th>Guided Learning</th>
                            <th>Independent Learning</th>
                            <th>Total LT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total_ca_sum = 0;
                        foreach ($samc_continuous_assessment_data as $ca):
                            $total_ca = $ca->sa_independent_learning_hour + $ca->sa_instruction_learning_hour;
                            $total_ca_sum += $total_ca;
                        ?>
                            <tr>
                                <td><?= $ca->sa_desc ?></td>
                                <td class="text-center"><?= $ca->sa_percentage ?>%</td>
                                <td class="text-center"><?= $ca->sa_instruction_learning_hour ?></td>
                                <td class="text-center"><?= $ca->sa_independent_learning_hour ?></td>
                                <td class="text-center"><?= $total_ca ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <h6 class="mt-4 mb-3">Final Assessment</h6>
            <div class="table-responsive">
                <table class="samc-table">
                    <thead>
                        <tr>
                            <th width="30%">Description</th>
                            <th>Percentage</th>
                            <th>Guided Learning</th>
                            <th>Independent Learning</th>
                            <th>Total LT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total_fa_sum = 0;
                        if ($samc_final_assessment_data):
                            foreach ($samc_final_assessment_data as $fa):
                                $total_fa = $fa->sa_independent_learning_hour + $fa->sa_instruction_learning_hour;
                                $total_fa_sum += $total_fa;
                        ?>
                                <tr>
                                    <td><?= $fa->sa_desc ?></td>
                                    <td class="text-center"><?= $fa->sa_percentage ?>%</td>
                                    <td class="text-center"><?= $fa->sa_instruction_learning_hour ?></td>
                                    <td class="text-center"><?= $fa->sa_independent_learning_hour ?></td>
                                    <td class="text-center"><?= $total_fa ?></td>
                                </tr>
                            <?php
                            endforeach;
                        else:
                            ?>
                            <tr>
                                <td colspan="5" class="text-center">No final assessment data available</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="mt-4 p-3 bg-light rounded">
                <h6 class="mb-0">TOTAL LEARNING TIME (LT): <span class="float-end"><?= $total_cco_sum + $total_ca_sum + $total_fa_sum ?> hours</span></h6>
            </div>
        </div>

        <!-- Review Tab Content -->
        <div class="tab-content" id="review-tab">
            <!-- SAMC COURSE FRAMEWORK ASSESSMENT FORM -->
            <div class="assessment-form" id="assessment-form">
                <h5 class="mb-4"><i class="fas fa-clipboard-check me-2"></i>SAMC Course Framework Assessment Form</h5>

                <form id="samcReviewForm">
                    <div class="assessment-section">
                        <div class="assessment-section-title">1. Course Details Evaluation</div>

                        <div class="assessment-item-header">
                            <div class="assessment-item-title">
                                <span>Name of the SAMC</span>
                            </div>
                            <div class="assessment-options">
                                <div class="option-group">
                                    <?= (isset($reviews_1->sr_samc_name_status)) ? get_samc_review_status_badge($reviews_1->sr_samc_name_status) : ''; ?>
                                </div>
                            </div>
                        </div>
                        <div class="review-remarks p-3 bg-light rounded">
                            <?= isset($reviews_1->sr_samc_name) && !empty($reviews_1->sr_samc_name) ? nl2br(esc($reviews_1->sr_samc_name)) : '<em class="text-muted">No remarks provided</em>'; ?>
                        </div>
                        <br>

                        <div class="assessment-item-header">
                            <div class="assessment-item-title">
                                <span>MQF level/levels</span>
                            </div>
                            <div class="assessment-options">
                                <div class="option-group">
                                    <?= (isset($reviews_1->sr_mqf_level_status)) ? get_samc_review_status_badge($reviews_1->sr_mqf_level_status) : ''; ?>
                                </div>
                            </div>
                        </div>
                        <div class="review-remarks p-3 bg-light rounded">
                            <?= isset($reviews_1->sr_mqf_level) && !empty($reviews_1->sr_mqf_level) ? nl2br(esc($reviews_1->sr_mqf_level)) : '<em class="text-muted">No remarks provided</em>'; ?>
                        </div>
                        <br>

                        <div class="assessment-item-header">
                            <div class="assessment-item-title">
                                <span>Duration (in hours)</span>
                            </div>
                            <div class="assessment-options">
                                <div class="option-group">
                                    <?= (isset($reviews_1->sr_duration_hours_status)) ? get_samc_review_status_badge($reviews_1->sr_duration_hours_status) : ''; ?>
                                </div>
                            </div>
                        </div>
                        <div class="review-remarks p-3 bg-light rounded">
                            <?= isset($reviews_1->sr_duration_hours) && !empty($reviews_1->sr_duration_hours) ? nl2br(esc($reviews_1->sr_duration_hours)) : '<em class="text-muted">No remarks provided</em>'; ?>
                        </div>
                        <br>

                        <div class="assessment-item-header">
                            <div class="assessment-item-title">
                                <span>Method of Instruction and Learning</span>
                            </div>
                            <div class="assessment-options">
                                <div class="option-group">
                                    <?= (isset($reviews_1->sr_teaching_methods_status)) ? get_samc_review_status_badge($reviews_1->sr_teaching_methods_status) : ''; ?>
                                </div>
                            </div>
                        </div>
                        <div class="review-remarks p-3 bg-light rounded">
                            <?= isset($reviews_1->sr_teaching_methods) && !empty($reviews_1->sr_teaching_methods) ? nl2br(esc($reviews_1->sr_teaching_methods)) : '<em class="text-muted">No remarks provided</em>'; ?>
                        </div>
                        <br>

                        <div class="assessment-item-header">
                            <div class="assessment-item-title">
                                <span>Academic Credits</span>
                            </div>
                            <div class="assessment-options">
                                <div class="option-group">
                                    <?= (isset($reviews_1->sr_academic_credits_status)) ? get_samc_review_status_badge($reviews_1->sr_academic_credits_status) : ''; ?>
                                </div>
                            </div>
                        </div>
                        <div class="review-remarks p-3 bg-light rounded">
                            <?= isset($reviews_1->sr_academic_credits) && !empty($reviews_1->sr_academic_credits) ? nl2br(esc($reviews_1->sr_academic_credits)) : '<em class="text-muted">No remarks provided</em>'; ?>
                        </div>
                    </div>
                    <div class="assessment-section">
                        <div class="assessment-section-title">2. Course Content Evaluation</div>

                        <div class="assessment-item-header">
                            <div class="assessment-item-title">
                                <span>SAMC Synopsis</span>
                            </div>
                            <div class="assessment-options">
                                <div class="option-group">
                                    <?= (isset($reviews_1->sr_synopsis_status)) ? get_samc_review_status_badge($reviews_1->sr_synopsis_status) : ''; ?>
                                </div>
                            </div>
                        </div>
                        <div class="review-remarks p-3 bg-light rounded">
                            <?= isset($reviews_1->sr_synopsis) && !empty($reviews_1->sr_synopsis) ? nl2br(esc($reviews_1->sr_synopsis)) : '<em class="text-muted">No remarks provided</em>'; ?>
                        </div>
                        <br>
                        <div class="assessment-item-header">
                            <div class="assessment-item-title">
                                <span>SAMC Intended Learning Outcomes</span>
                            </div>
                            <div class="assessment-options">
                                <div class="option-group">
                                    <?= (isset($reviews_1->sr_intended_learning_outcomes_status)) ? get_samc_review_status_badge($reviews_1->sr_intended_learning_outcomes_status) : ''; ?>
                                </div>
                            </div>
                        </div>
                        <div class="review-remarks p-3 bg-light rounded">
                            <?= isset($reviews_1->sr_intended_learning_outcomes) && !empty($reviews_1->sr_intended_learning_outcomes) ? nl2br(esc($reviews_1->sr_intended_learning_outcomes)) : '<em class="text-muted">No remarks provided</em>'; ?>
                        </div>
                        <br>
                        <div class="assessment-item-header">
                            <div class="assessment-item-title">
                                <span>Course Content Outline</span>
                            </div>
                            <div class="assessment-options">
                                <div class="option-group">
                                    <?= (isset($reviews_1->sr_content_outline_status)) ? get_samc_review_status_badge($reviews_1->sr_content_outline_status) : ''; ?>
                                </div>
                            </div>
                        </div>
                        <div class="review-remarks p-3 bg-light rounded">
                            <?= isset($reviews_1->sr_content_outline) && !empty($reviews_1->sr_content_outline) ? nl2br(esc($reviews_1->sr_content_outline)) : '<em class="text-muted">No remarks provided</em>'; ?>
                        </div>
                        <br>

                        <div class="assessment-item-header">
                            <div class="assessment-item-title">
                                <span>Assessment</span>
                            </div>
                            <div class="assessment-options">
                                <div class="option-group">
                                    <?= (isset($reviews_1->sr_assessment_status)) ? get_samc_review_status_badge($reviews_1->sr_assessment_status) : ''; ?>
                                </div>
                            </div>
                        </div>
                        <div class="review-remarks p-3 bg-light rounded">
                            <?= isset($reviews_1->sr_assessment) && !empty($reviews_1->sr_assessment) ? nl2br(esc($reviews_1->sr_assessment)) : '<em class="text-muted">No remarks provided</em>'; ?>
                        </div>
                        <br>
                    </div>

                    <div class="assessment-section">
                        <div class="assessment-section-title">3. Review Result</div>

                        <div class="assessment-item-header">
                            <div class="assessment-item-title">
                                <span>Overall Result</span>
                                <i class="fas fa-info-circle tooltip-icon" title="Your final decision on the SAMC submission"></i>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="review-remarks p-3 bg-light rounded">
                                <?= isset($reviews_1->sr_review_status) && !empty($reviews_1->sr_review_status) ? nl2br(esc($reviews_1->sr_review_status)) : '<em class="text-muted">No remarks provided</em>'; ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Tab navigation functionality
        const tabs = document.querySelectorAll('.samc-tab');
        const tabContents = document.querySelectorAll('.tab-content');

        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                const tabName = this.getAttribute('data-tab');

                // Remove active class from all tabs and contents
                tabs.forEach(t => t.classList.remove('active'));
                tabContents.forEach(content => content.classList.remove('active'));

                // Add active class to current tab and content
                this.classList.add('active');
                document.getElementById(`${tabName}-tab`).classList.add('active');
            });
        });

        // Jump to assessment form button
        const jumpToFormBtn = document.getElementById('jumpToForm');
        if (jumpToFormBtn) {
            jumpToFormBtn.addEventListener('click', function() {
                // Switch to review tab first
                tabs.forEach(t => t.classList.remove('active'));
                tabContents.forEach(content => content.classList.remove('active'));

                document.querySelector('[data-tab="review"]').classList.add('active');
                document.getElementById('review-tab').classList.add('active');

                // Scroll to assessment form
                document.getElementById('assessment-form').scrollIntoView({
                    behavior: 'smooth'
                });
            });
        }

        // Save draft functionality
        // Get form elements
        const samcReviewForm = document.getElementById('samcReviewForm');
        const saveFormDraftBtn = document.getElementById('saveFormDraft');
        const submitBtn = document.querySelector('button[type="submit"]');

        // Prevent default form submission
        samcReviewForm.addEventListener('submit', function(e) {
            e.preventDefault();
            submitForm('submit');
        });

        // Save draft functionality
        if (saveFormDraftBtn) {
            saveFormDraftBtn.addEventListener('click', function() {
                submitForm('draft');
            });
        }

        function submitForm(type) {
            // Show loading indicator
            const submitButton = (type === 'draft') ? saveFormDraftBtn : submitBtn;
            const originalText = submitButton.innerHTML;
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Saving...';
            submitButton.disabled = true;

            // Get form data
            const formData = new FormData(samcReviewForm);

            // Add form submission type
            formData.append('submission_type', type);

            // Handle "Decide Later" checkboxes
            document.querySelectorAll('.dont-know').forEach(checkbox => {
                if (checkbox.checked) {
                    const index = checkbox.getAttribute('data-index');
                    formData.set(`status[${index}]`, 'decide_later');
                }
            });

            // Convert FormData to object (for easier debugging)
            const formDataObj = {};
            for (let [key, value] of formData.entries()) {
                formDataObj[key] = value;
            }

            // Get CSRF token
            const csrfToken = document.querySelector('input[name="<?= csrf_token() ?>"]').value;

            // Send AJAX request
            fetch(type === 'draft' ?
                    '<?= base_url('assessor/samc/save_review_as_draft'); ?>' :
                    '<?= base_url('assessor/samc/submit_review'); ?>', {
                        method: 'POST',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: formData
                    })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    // Reset button state
                    submitButton.innerHTML = originalText;
                    submitButton.disabled = false;

                    if (data.status === 'success') {
                        // Show success message
                        Swal.fire({
                            icon: 'success',
                            title: type === 'draft' ? 'Draft Saved' : 'Assessment Submitted',
                            text: data.message || (type === 'draft' ? 'Your draft has been saved successfully.' : 'Your assessment has been submitted successfully.'),
                            confirmButtonColor: '#3085d6'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload(); // Reload the page instead of redirecting
                            }
                        });
                    } else {
                        // Show error message
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: data.message || 'An error occurred. Please try again.',
                            confirmButtonColor: '#3085d6'
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    submitButton.innerHTML = originalText;
                    submitButton.disabled = false;

                    // Show error message
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred while processing your request. Please try again.',
                        confirmButtonColor: '#3085d6'
                    });
                });
        }

        // Handle radio button and checkbox interactions
        document.querySelectorAll('.dont-know').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const index = this.getAttribute('data-index');
                const radioButtons = document.querySelectorAll(`input[name="status[${index}]"]`);

                if (this.checked) {
                    // Uncheck radio buttons when "Decide Later" is checked
                    radioButtons.forEach(radio => {
                        radio.checked = false;
                        radio.disabled = true;
                    });
                } else {
                    // Enable radio buttons when "Decide Later" is unchecked
                    radioButtons.forEach(radio => {
                        radio.disabled = false;
                    });
                }
            });
        });

        // Initialize on page load - check for already checked "Decide Later" boxes
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.dont-know').forEach(checkbox => {
                if (checkbox.checked) {
                    const index = checkbox.getAttribute('data-index');
                    const radioButtons = document.querySelectorAll(`input[name="status[${index}]"]`);

                    radioButtons.forEach(radio => {
                        radio.disabled = true;
                    });
                }
            });
        });

        function initCheckboxRadioInteraction() {
            document.querySelectorAll('.dont-know').forEach(checkbox => {
                const index = checkbox.getAttribute('data-index');
                const radioButtons = document.querySelectorAll(`input[name="status[${index}]"]`);

                // Initial state - disable radio buttons if checkbox is already checked
                if (checkbox.checked) {
                    radioButtons.forEach(radio => {
                        radio.checked = false;
                        radio.disabled = true;
                    });
                }

                // Add event listener for future changes
                checkbox.addEventListener('change', function() {
                    if (this.checked) {
                        radioButtons.forEach(radio => {
                            radio.checked = false;
                            radio.disabled = true;
                        });
                    } else {
                        radioButtons.forEach(radio => {
                            radio.disabled = false;
                        });
                    }

                    // Update progress
                    updateProgress();
                });
            });
        }

        // Initialize once the DOM is fully loaded
        initCheckboxRadioInteraction();

        // As a safety measure, initialize again after a short delay
        // This helps catch any late-binding elements or race conditions
        setTimeout(initCheckboxRadioInteraction, 100);

        // Track form progress
        function updateProgress() {
            let completedCount = 0;
            let dontKnowCount = 0;
            const totalItems = 9; // Total number of assessment items

            // Count completed items and "Decide Later" items
            document.querySelectorAll('.assessment-item[data-item-id]').forEach(item => {
                const itemId = item.getAttribute('data-item-id');
                const dontKnowChecked = item.querySelector(`.dont-know[data-index="${itemId}"]`)?.checked;
                const radioChecked = item.querySelector(`input[name="status[${itemId}]"]:checked`);

                if (dontKnowChecked) {
                    dontKnowCount++;
                    completedCount++;
                } else if (radioChecked) {
                    completedCount++;
                }
            });

            // Update counts in the UI
            document.getElementById('completed-count').textContent = completedCount;
            document.getElementById('dont-know-count').textContent = dontKnowCount;

            // Update progress bar
            const progressPercentage = Math.round((completedCount / totalItems) * 100);
            const progressBar = document.querySelector('.progress-bar');
            progressBar.style.width = `${progressPercentage}%`;
            progressBar.textContent = `${progressPercentage}%`;
            progressBar.setAttribute('aria-valuenow', progressPercentage);

            // Change progress bar color based on percentage
            if (progressPercentage < 30) {
                progressBar.classList.remove('bg-warning', 'bg-success');
                progressBar.classList.add('bg-danger');
            } else if (progressPercentage < 70) {
                progressBar.classList.remove('bg-danger', 'bg-success');
                progressBar.classList.add('bg-warning');
            } else {
                progressBar.classList.remove('bg-danger', 'bg-warning');
                progressBar.classList.add('bg-success');
            }
        }

        // Initialize the page
        // loadDraft();
        updateProgress();

        // Add event listeners to radio buttons for progress tracking
        document.querySelectorAll('input[type="radio"][name^="status"]').forEach(radio => {
            radio.addEventListener('change', updateProgress);
        });
    });
</script>