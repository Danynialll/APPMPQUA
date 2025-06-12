<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    /* Modern formal styling */
    :root {
        --primary-color: #1a73e8;
        --secondary-color: #f8f9fa;
        --accent-color: #34a853;
        --danger-color: #ea4335;
        --text-dark: #202124;
        --text-light: #5f6368;
        --border-color: #dadce0;
        --card-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
    }

    .samc-card {
        border-radius: 8px;
        box-shadow: var(--card-shadow);
        border: none;
        background-color: white;
        transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
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
        border: none;
        padding: 8px 16px;
        border-radius: 4px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.2s;
    }

    .btn-assign {
        background-color: var(--accent-color);
        color: white;
    }

    .btn-assign:hover {
        background-color: #2d8f47;
    }

    .btn-return {
        background-color: var(--danger-color);
        color: white;
    }

    .btn-return:hover {
        background-color: #d33426;
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
        background-color: var(--secondary-color);
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

    /* Better modal styling */
    .modal-content {
        border-radius: 8px;
        border: none;
        box-shadow: var(--card-shadow);
    }

    .modal-header {
        background-color: var(--primary-color);
        color: white;
        border-radius: 8px 8px 0 0;
    }

    .modal-footer {
        border-top: 1px solid var(--border-color);
    }

    .select2-container--default .select2-selection--single {
        height: 38px;
        border: 1px solid var(--border-color);
        border-radius: 4px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 38px;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 36px;
    }

    .select2-container {
        display: block !important;
    }

    /* Badge styling */
    .badge {
        padding: 4px 8px;
        border-radius: 16px;
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

    /* Responsive layout */
    @media (max-width: 768px) {
        .samc-layout {
            flex-direction: column;
        }
    }
</style>

<div class="container-fluid py-4">
    <div class="samc-card mb-4">
        <!-- Header with status badge -->
        <div class="samc-header bg-gradient-primary">
            <div>
                <h5 class="text-dark"><b><i class="fas fa-certificate me-2"></i>SAMC Validation</b></h5>
                <span class="badge badge-info">Pending Assignment</span>
            </div>
            <div class="samc-actions">
                <button class="btn-action btn-assign" data-bs-toggle="modal" data-bs-target="#samc_edit_modal" data-id="<?= $samc_data->samc_id ?>">
                    <i class="fas fa-user-check"></i> Assign APP
                </button>
                <button class="btn-action btn-return" id="rejectBtn" data-samc-id="<?= $samc_data->samc_id ?>">
                    <i class="fas fa-undo-alt"></i> Return to Provider
                </button>
            </div>
        </div>

        <!-- Tab Navigation -->
        <div class="samc-tabs">
            <div class="samc-tab active" data-tab="details">Course Details</div>
            <div class="samc-tab" data-tab="outline">Course Outline</div>
            <div class="samc-tab" data-tab="assessment">Assessment</div>
        </div>

        <!-- Details Tab Content -->
        <div class="tab-content active" id="details-tab">
            <table class="samc-table">
                <tbody>
                    <tr>
                        <th width="30%">Name of the SAMC Provider</th>
                        <td><?= $pvd_name ?></td>
                    </tr>
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
    </div>
</div>

<!-- Assign APP Modal with improved styling -->
<div class="modal fade" id="samc_edit_modal" tabindex="-1" aria-labelledby="samcEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="assign-app-form" method="POST">
            <?= csrf_field() ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="samcEditModalLabel"><i class="fas fa-user-check me-2"></i>Assign APP</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="samc_id" id="modal-samc-id" value="<?= $samc_data->samc_id ?>">

                    <div class="mb-4">
                        <label for="app-select" class="form-label">Select an Appointed Accreditation Panel (APP)</label>
                        <br>
                        <select class="form-select" id="app-select" name="app_id" required>
                            <option value="" data-organization="N/A">Select an APP</option>
                            <?php foreach ($app_list as $app) : ?>
                                <option value="<?= $app->asr_id ?>" data-organization="<?= $app->qu_name ?>">
                                    <?= $app->asr_name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="alert alert-info">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-building me-3 fa-lg"></i>
                            <div class="text-white">
                                <strong>Organization:</strong><br>
                                <span id="app-organization" class="mt-1 d-block">N/A</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i> Cancel
                    </button>
                    <button type="button" class="btn btn-primary" id="assign-app-submit">
                        <i class="fas fa-check me-1"></i> Assign
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    jQuery(document).ready(function($) {
        // Initialize Select2
        $('#app-select').select2({
            placeholder: "Search for an APP...",
            dropdownParent: $('#samc_edit_modal')
        });

        // Tab navigation
        $('.samc-tab').on('click', function() {
            const tabId = $(this).data('tab');

            // Remove active class from all tabs and content
            $('.samc-tab').removeClass('active');
            $('.tab-content').removeClass('active');

            // Add active class to clicked tab and corresponding content
            $(this).addClass('active');
            $('#' + tabId + '-tab').addClass('active');
        });

        // Show organization when APP is selected
        $('#app-select').on('select2:select', function(e) {
            let selectedOption = e.params.data.element;
            let organization = selectedOption.getAttribute('data-organization');
            $('#app-organization').text(organization || 'N/A');
        });

        // Assign APP to Assessor
        $('#assign-app-submit').click(function(e) {
            e.preventDefault();

            // Gather form data
            const formData = {
                samc_id: $('#modal-samc-id').val(),
                app_id: $('#app-select').val(),
                "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
            };

            if (!formData.samc_id || !formData.app_id) {
                Swal.fire({
                    title: 'Error',
                    text: 'Please select an APP.',
                    icon: 'error',
                    confirmButtonText: 'OK',
                });
                return;
            }

            // Show loading state
            Swal.fire({
                title: 'Processing',
                text: 'Assigning APP...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            // Send AJAX request
            $.ajax({
                url: '<?= base_url("qvcAdmin/assign-app") ?>',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            title: 'Success',
                            text: 'APP successfully assigned.',
                            icon: 'success',
                            confirmButtonText: 'OK',
                        }).then(() => {
                            window.location.href = "<?= site_url('qvcAdmin/samc/samc_management') ?>";
                        });
                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: response.message || 'Failed to assign APP. Please try again.',
                            icon: 'error',
                            confirmButtonText: 'OK',
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                    Swal.fire({
                        title: 'Error',
                        text: 'An unexpected error occurred. Please try again later.',
                        icon: 'error',
                        confirmButtonText: 'OK',
                    });
                },
            });
        });

        // Return SAMC to Course Providers
        $('#rejectBtn').on('click', function() {
            let samcId = $(this).data("samc-id");

            Swal.fire({
                title: "Return to Provider?",
                text: "Do you want to return this SAMC to the Course Provider?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, Return it",
                cancelButtonText: "Cancel"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show input for rejection reason
                    Swal.fire({
                        title: "Reason for Returning",
                        html: `
                        <div class="mb-3 text-start">
                            <label class="form-label">Please provide the reason(s) for returning this SAMC:</label>
                            <textarea id="swal-rejection-reason" class="form-control" rows="4" placeholder="Enter the reason for returning here..."></textarea>
                        </div>
                    `,
                        showCancelButton: true,
                        confirmButtonText: "Submit",
                        cancelButtonText: "Cancel",
                        focusConfirm: false,
                        preConfirm: () => {
                            const reason = document.getElementById('swal-rejection-reason').value;
                            if (!reason) {
                                Swal.showValidationMessage('Please provide a reason for returning');
                            }
                            return reason;
                        }
                    }).then((reasonResult) => {
                        if (reasonResult.isConfirmed) {
                            let rejectionReason = reasonResult.value;

                            // Show loading state
                            Swal.fire({
                                title: 'Processing',
                                text: 'Returning SAMC...',
                                allowOutsideClick: false,
                                didOpen: () => {
                                    Swal.showLoading();
                                }
                            });

                            // Send the rejection data to the server
                            $.ajax({
                                url: "<?= site_url('qvcAdmin/returnSamc') ?>",
                                method: "POST",
                                data: {
                                    samc_id: samcId,
                                    reason: rejectionReason,
                                    "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
                                },
                                success: function(response) {
                                    // Check response
                                    if (response.success) {
                                        Swal.fire(
                                            "Returned!",
                                            "The SAMC has been returned to the provider.",
                                            "success"
                                        ).then(() => {
                                            window.location.href = "<?= site_url('qvcAdmin/samc/samc_management') ?>";
                                        });
                                    } else {
                                        Swal.fire(
                                            'Error!',
                                            'There was a problem returning the SAMC.',
                                            'error'
                                        );
                                    }
                                },
                                error: function(xhr) {
                                    Swal.fire(
                                        "Error!",
                                        "Something went wrong. Please try again.",
                                        "error"
                                    );
                                },
                            });
                        }
                    });
                }
            });
        });
    });
</script>