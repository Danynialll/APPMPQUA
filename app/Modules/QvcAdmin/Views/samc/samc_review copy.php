<!-- Select 2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link href="<?= base_url(); ?>assets/css/select2override.css" rel="stylesheet" />

<div class="d-flex align-items-center justify-content-between">
    <h2 class="mb-0">SAMC Review</h2>
</div>
<div class="row">
    <div class="col-xl-7 mb-4">
        <iframe src="<?= base_url($samc_info->samc_proforma) . '#toolbar=0' ?>" width="100%" height="900px" style="border-radius:1rem;"></iframe>
    </div>
    <div class="col-xl-5">
        <div class="card" id="notifications">
            <div class="card-header">
                <h5>Checklist</h5>
                <p class="text-sm">Please check for completeness of each items</p>
            </div>
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th class="ps-1" colspan="4">
                                    <p class="mb-0">Description</p>
                                </th>
                                <th class="text-center">
                                    <p class="mb-0">Status</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Section 1: SAMC Course Description -->
                            <tr>
                                <td class="ps-1" colspan="4">
                                    <span class="text-dark d-block text-sm">Name of the SAMC Provider</span>
                                </td>
                                <td>
                                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                        <input class="form-check-input" type="checkbox" id="samcProvider">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-1" colspan="4">
                                    <span class="text-dark d-block text-sm">Name of the SAMC</span>
                                </td>
                                <td>
                                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                        <input class="form-check-input" type="checkbox" id="samcName">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-1" colspan="4">
                                    <span class="text-dark d-block text-sm">MQF level/levels</span>
                                </td>
                                <td>
                                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                        <input class="form-check-input" type="checkbox" id="mqfLevel">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-1" colspan="4">
                                    <span class="text-dark d-block text-sm">Duration (in hours)</span>
                                </td>
                                <td>
                                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                        <input class="form-check-input" type="checkbox" id="duration">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-1" colspan="4">
                                    <span class="text-dark d-block text-sm">Classification of knowledge, skills or attitude</span>
                                </td>
                                <td>
                                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                        <input class="form-check-input" type="checkbox" id="classification">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-1" colspan="4">
                                    <span class="text-dark d-block text-sm">Language of Instruction</span>
                                </td>
                                <td>
                                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                        <input class="form-check-input" type="checkbox" id="language">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-1" colspan="4">
                                    <span class="text-dark d-block text-sm">Method of Instruction and Learning</span>
                                </td>
                                <td>
                                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                        <input class="form-check-input" type="checkbox" id="method">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-1" colspan="4">
                                    <span class="text-dark d-block text-sm">Academic Credits</span>
                                </td>
                                <td>
                                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                        <input class="form-check-input" type="checkbox" id="credits">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-1" colspan="4">
                                    <span class="text-dark d-block text-sm">Prior Knowledge/Experience</span>
                                </td>
                                <td>
                                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                        <input class="form-check-input" type="checkbox" id="priorKnowledge">
                                    </div>
                                </td>
                            </tr>
                            <!-- Section 2: SAMC Course Outline -->
                            <tr>
                                <td class="ps-1" colspan="4">
                                    <span class="text-dark d-block text-sm">SAMC Synopsis</span>
                                </td>
                                <td>
                                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                        <input class="form-check-input" type="checkbox" id="synopsis">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-1" colspan="4">
                                    <span class="text-dark d-block text-sm">SAMC Intended Learning Outcomes</span>
                                </td>
                                <td>
                                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                        <input class="form-check-input" type="checkbox" id="learningOutcomes">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-1" colspan="4">
                                    <span class="text-dark d-block text-sm">Instructor/s</span>
                                </td>
                                <td>
                                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                        <input class="form-check-input" type="checkbox" id="instructors">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-1" colspan="4">
                                    <span class="text-dark d-block text-sm">Course Content Outline</span>
                                </td>
                                <td>
                                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                        <input class="form-check-input" type="checkbox" id="contentOutline">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-1" colspan="4">
                                    <span class="text-dark d-block text-sm">Assessment</span>
                                </td>
                                <td>
                                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                        <input class="form-check-input" type="checkbox" id="assessment">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Example textarea</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                    <!-- Buttons -->
                    <div class="col-12 d-flex align-items-center justify-content-end" style="
    overflow: hidden;
">
                        <button class="btn btn-sm bg-primary text-white w-30 mb-0 me-2 d-flex align-items-center justify-content-center"
                            data-id="<?= $samc_id ?>"
                            data-bs-toggle="modal"
                            data-bs-target="#samc_edit_modal">
                            <i class="fas fa-edit" style="font-size: 16px;"></i> Assign APP
                        </button>
                        <button
                            class="btn btn-sm bg-danger text-white w-30 mb-0 d-flex align-items-center justify-content-center"
                            type="button"
                            id="rejectBtn"
                            data-samc-id="<?= $samc_id ?>">
                            <i class="fas fa-times-circle me-2" style="font-size:16px;"></i> Return
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="modal fade" id="samc_edit_modal" tabindex="-1" aria-labelledby="samcEditModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="assign-app-form" method="POST">
            <?= csrf_field() ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="samcEditModalLabel">Assign APP</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Hidden Input for samc_id -->
                    <input type="hidden" name="samc_id" id="modal-samc-id" value="<?= $samc_id ?>">

                    <!-- Dropdown for APP Names -->
                    <div class="mb-3">
                        <label for="app-select" class="form-label">Select APP</label>
                        <select class="form-select" id="app-select" name="app_id" required>
                            <option value="" data-organization="N/A">Select an APP</option>
                            <?php foreach ($app_list as $app) : ?>
                                <option value="<?= $app->asr_id ?>" data-organization="<?= $app->asr_university ?>">
                                    <?= $app->asr_name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Display Organization -->
                    <div class="mb-3">
                        <p><strong>Organization:</strong><span id="app-organization">N/A</span></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="assign-app-submit">Assign</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    jQuery(document).ready(function($) {

        let appSelect = $('#app-select');
        let appOrganization = $('#app-organization');

        if (appSelect.length && appOrganization.length) {

            appSelect.select2();

            appSelect.on('select2:select', function(e) {
                let selectedOption = e.params.data.element;
                let organization = selectedOption.getAttribute('data-organization');
                appOrganization.text(organization || 'N/A');
            });
        }
    });
</script>
<!-- select 2 initialize -->
<script>
    jQuery(document).ready(function($) {
        // Initialize Select2 on the expertise select input inside a modal
        $('#app-select').select2({
            placeholder: "Select Assessor...",
            dropdownParent: $('#samc_edit_modal') // Append dropdown to the modal
        });
    });
</script>

<script>
    jQuery(document).ready(function() {

        // Assign APP to Assessor
        jQuery('#assign-app-submit').click(function(e) {
            e.preventDefault();

            // Gather form data
            const formData = {
                samc_id: jQuery('#modal-samc-id').val(),
                app_id: jQuery('#app-select').val(),
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

            // Send AJAX request
            jQuery.ajax({
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
                            window.location.href = "<?= site_url('qvcAdmin/samc_management') ?>";
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
        jQuery('#rejectBtn').on('click', function() {
            let samcId = jQuery(this).data("samc-id");

            Swal.fire({
                title: "Are you sure?",
                text: "Do you want to return this SAMC to the  Course Provider?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, Return it",
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show input for rejection reason
                    Swal.fire({
                        title: "Reason for Returning",
                        input: "textarea",
                        inputPlaceholder: "Enter the reason for returning here...",
                        showCancelButton: true,
                        confirmButtonText: "Submit",
                        cancelButtonText: "Cancel",
                    }).then((reasonResult) => {
                        if (reasonResult.isConfirmed) {
                            let rejectionReason = reasonResult.value;

                            // Send the rejection data to the server
                            jQuery.ajax({
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
                                            "The assignation has been returned.",
                                            "success"
                                        ).then(() => {
                                            window.location.href = "<?= site_url('qvcAdmin/samc_management') ?>";
                                        });
                                    } else {
                                        Swal.fire(
                                            'Error!',
                                            'There was a problem updating the SAMC.',
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