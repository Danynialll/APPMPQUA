
<div class="modal fade custom-modal" id="addAssessorModal" tabindex="-1" aria-labelledby="addAssessorModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="addAssessorModalLabel">Add New Assessor</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="addAssessorForm">
        <?= csrf_field() ?>
        <div class="modal-body">
            <div class="row g-3">
                <div class="col-md-6">
                <label class="form-label">Name</label>
                <input type="text" name="asr_name" class="form-control" required>
                </div>
                <div class="col-md-6">
                <label class="form-label">University</label>
                <input type="text" name="asr_university" class="form-control" value="<?= get_university_name($mpq->mpq_qu_id) ?>" disabled>
                <input type="text" name="asr_qu_id" class="form-control" required style="display: none;" value="<?= $mpq->mpq_qu_id ?>">
                </div>
                <div class="col-md-6">
                <label class="form-label">Gender</label>
                <select name="asr_gender" class="form-select" required>
                    <option value="">Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                </div>
                <div class="col-md-6">
                <label class="form-label">Telephone No.</label>
                <input type="text" name="asr_phone" class="form-control">
                </div>
                <div class="col-md-6">
                <label class="form-label">Fax</label>
                <input type="text" name="asr_fax" class="form-control">
                </div>
                <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" name="asr_email" class="form-control" required>
                </div>
                <div class="col-md-6">
                <label class="form-label">Service Address</label>
                <input type="text" name="asr_service_address" class="form-control">
                </div>
                <div class="col-md-6">
                <label class="form-label">Retirement Date</label>
                <input type="date" name="asr_retirement_date" class="form-control">
                </div>

                <!-- My Expertise -->
                <div class="mb-3">
                    <label for="expertise" class="form-label" id="addExpertiseSelect">Selected Expertise:</label><br>
                    <!-- No pre-filled expertise for create form -->
                </div>

                <!-- Expertise Select2 Fields -->
                <div id="expertiseFields">
                    <div class="mb-3 expertise-field">
                        <label for="expertise" class="form-label">Expertise</label>
                        <select class="form-select select2" name="expertise[]" id="addExpertise">
                            <option value="">Select Expertise</option>
                            <?php foreach ($expertise_list as $expertise): ?>
                                <option value="<?= $expertise->ef_id ?>"><?= $expertise->ef_desc ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <!-- Button to add another expertise -->
                <button type="button" class="btn btn-primary btn-sm" id="addExpertiseBtnAdd">
                    <i class="fas fa-add" style="font-size: 1rem !important;"></i>&nbsp; Add Expertise
                </button>

                <!-- My NEC Field -->
                <div class="mb-3">
                    <label for="nec" class="form-label" id="addNECField">Selected NEC Field:</label><br>
                </div>

                <!-- NEC Selection -->
                <div class="mb-3">
                    <label for="nec_broad" class="form-label">NEC Broad</label>
                    <select class="form-select select2" id="add_nec_broad" name="nec_broad">
                        <option value="">Select NEC Broad</option>
                        <?php foreach ($nec_broad as $broad): ?>
                            <option value="<?= $broad->nb_id ?>"><?= $broad->nb_code ?> <?= $broad->nb_name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="nec_narrow" class="form-label">NEC Narrow</label>
                    <select class="form-select select2" id="add_nec_narrow" name="nec_narrow">
                        <option value="">Select NEC Narrow</option>
                        <!-- Options will be populated via JS -->
                    </select>
                </div>

                <div class="mb-3">
                    <label for="nec_detail" class="form-label">NEC Detail</label>
                    <select class="form-select select2" id="add_nec_detail" name="nec_detail[]">
                        <option value="">Select NEC Detail</option>
                        <!-- Options will be populated via JS -->
                    </select>
                </div>

                <button type="button" class="btn btn-primary btn-sm" id="addNECBtnAdd">
                    <i class="fas fa-add" style="font-size: 1rem !important;"></i>&nbsp; Add NEC Field
                </button>

                <div class="mb-3">
                    <label for="asr_cv" class="form-label">CV</label>
                    <input type="file" name="asr_cv" class="form-control" accept=".pdf,.image/*">
                    <small class="form-text text-muted">Accepted formats: PDF, PNG, JPEG</small>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
    jQuery(document).ready(function($) {
        // Add Expertise
        $('#addExpertiseBtnAdd').on('click', function() {
            // Get selected Expertise
            var expertiseId = $('#addExpertise').val();
            var expertiseText = $('#addExpertise option:selected').text();

            if (!expertiseId) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Please select expertise',
                    text: 'You must select an expertise before adding.',
                });
                return;
            }

            // Prevent duplicate Expertise
            var exists = false;
            $('.delete-expertise').each(function() {
                if ($(this).closest('span').data('exp-id') == expertiseId) {
                    exists = true;
                }
            });
            if (exists) {
                Swal.fire({
                    icon: 'info',
                    title: 'Already Added',
                    text: 'This expertise is already added.',
                });
                return;
            }

            // Optionally, send AJAX to save to DB here, or just append visually
            let badge = `
                <span class="badge my-2 badge-secondary" data-exp-id="${expertiseId}">
                    ${expertiseText}
                    <i class="fas fa-times text-danger ms-2 delete-exp" style="cursor: pointer;"></i>
                </span>
                <input type="hidden" name="expertise[]" value="${expertiseId}" data-exp-id="${expertiseId}">
            `;
            // Append after #expertiseSelect
            $(badge).insertAfter('#addExpertiseSelect').hide().fadeIn(200);

            // Collect all NEC Detail IDs from badges
            let expIds = [];
            $('.badge[data-exp-id]').each(function() {
                expIds.push($(this).data('exp-id'));
            });

            $('#addExpertise').val('').trigger('change');
        });
    });
</script>

<script>
    jQuery(document).ready(function($) {
        // Hide narrow and detail fields initially
        $('#add_nec_narrow').closest('.mb-3').hide();
        $('#add_nec_detail').closest('.mb-3').hide();

        // Show NEC Narrow after selecting Broad
        $('#add_nec_broad').on('change', function() {
            var broad_id = $(this).val();
            $('#add_nec_narrow').html('<option value="">Loading...</option>');
            $('#add_nec_detail').html('<option value="">Select NEC Detail</option>');
            if (broad_id) {
                $('#add_nec_narrow').closest('.mb-3').show();
                $.ajax({
                    url: "<?= base_url('appmpqua/get_nec_narrow') ?>",
                    type: "POST",
                    data: {
                        broad_id: broad_id,
                        csrf_test_name: $("input[name='csrf_test_name']").val()
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            var options = '<option value="">Select NEC Narrow</option>';
                            $.each(response.data, function(i, item) {
                                options += `<option value="${item.nn_id}">${item.nn_code} ${item.nn_name}</option>`;
                            });
                            $('#add_nec_narrow').html(options).trigger('change');
                            $("input[name='csrf_test_name']").val(response.csrf_token);
                        } else {
                            $('#add_nec_narrow').html('<option value="">Select NEC Narrow</option>');
                        }
                    }
                });
            } else {
                $('#add_nec_narrow').closest('.mb-3').hide();
                $('#add_nec_detail').closest('.mb-3').hide();
            }
            $('#add_nec_detail').closest('.mb-3').hide();
        });

        // Show NEC Detail after selecting Narrow
        $('#add_nec_narrow').on('change', function() {
            var narrow_id = $(this).val();
            $('#add_nec_detail').html('<option value="">Loading...</option>');
            if (narrow_id) {
                $('#add_nec_detail').closest('.mb-3').show();
                $.ajax({
                    url: "<?= base_url('appmpqua/get_nec_detail') ?>",
                    type: "POST",
                    data: {
                        narrow_id: narrow_id,
                        csrf_test_name: $("input[name='csrf_test_name']").val()
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            var options = '<option value="">Select NEC Detail</option>';
                            $.each(response.data, function(i, item) {
                                options += `<option value="${item.nd_id}">${item.nd_code} ${item.nd_name}</option>`;
                            });
                            $('#add_nec_detail').html(options).trigger('change');
                            $("input[name='csrf_test_name']").val(response.csrf_token);
                        } else {
                            $('#add_nec_detail').html('<option value="">Select NEC Detail</option>');
                        }
                    }
                });
            } else {
                $('#add_nec_detail').html('<option value="">Select NEC Detail</option>');
            }
        });
    });
</script>

<script>
    jQuery(document).ready(function($) {
        // Add NEC Field
        $('#addNECBtnAdd').on('click', function() {
            // Get selected NEC Detail
            var necDetailId = $('#add_nec_detail').val();
            var necDetailText = $('#add_nec_detail option:selected').text();

            if (!necDetailId) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Please select NEC Detail',
                    text: 'You must select a NEC Detail before adding.',
                });
                return;
            }

            // Prevent duplicate NEC
            var exists = false;
            $('.delete-nec').each(function() {
                if ($(this).closest('span').data('nd-id') == necDetailId) {
                    exists = true;
                }
            });
            if (exists) {
                Swal.fire({
                    icon: 'info',
                    title: 'Already Added',
                    text: 'This NEC Detail is already added.',
                });
                return;
            }

            // Optionally, send AJAX to save to DB here, or just append visually
            let necBadge = `
                <span class="badge my-2 badge-secondary" data-nd-id="${necDetailId}">
                    ${necDetailText}
                    <i class="fas fa-times text-danger ms-2 delete-nec" style="cursor: pointer;"></i>
                </span>
                <input type="hidden" name="nec_detail[]" value="${necDetailId}" data-nd-id="${necDetailId}">
            `;
            $(necBadge).insertAfter('#addNECField').hide().fadeIn(200);

            // Collect all NEC Detail IDs from badges
            let necIds = [];
            $('.badge[data-nd-id]').each(function() {
                necIds.push($(this).data('nd-id'));
            });

            // Optionally, clear selection
            $('#add_nec_broad').val('').trigger('change');
            $('#add_nec_narrow').val('').trigger('change').closest('.mb-3').hide();
            $('#add_nec_detail').val('').trigger('change').closest('.mb-3').hide();
        });
    });
</script>

<script>
    document.getElementById('addAssessorForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        fetch("<?= base_url('appmpqua/createAssessor') ?>", {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data.message,
                    }).then(() => {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message || 'Failed to update profile.',
                    });
                }
            })
            .catch(() => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An unexpected error occurred.',
                });
            });
    });
</script>

<script>
jQuery(document).ready(function($) {
    // Delegate event for dynamically added .delete-nec buttons
    $(document).on('click', '.delete-nec', function() {
        var badge = $(this).closest("span"); // Select the parent badge
        var necId = badge.data("nd-id"); // Get the NEC Detail ID

        Swal.fire({
            title: "Are you sure to delete NEC?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                // Remove the badge visually
                badge.fadeOut(300, function() {
                    $(this).remove();
                    $('input[type="hidden"][name="nec_detail[]"][data-nd-id="' + necId + '"]').remove();

                    // After removal, collect all remaining NEC IDs
                    let necIds = [];
                    $('.badge[data-nd-id]').each(function() {
                        necIds.push($(this).data('nd-id'));
                    });
                });
            }
        });
    });

    $(document).on('click', '.delete-exp', function() {
        var badge = $(this).closest("span"); // Select the parent badge
        var expId = badge.data("exp-id"); // Get the Expertise ID

        Swal.fire({
            title: "Are you sure to delete expertise?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                // Remove the badge visually
                badge.fadeOut(300, function() {
                    $(this).remove();
                    $('input[type="hidden"][name="expertise[]"][data-exp-id="' + expId + '"]').remove();

                    // After removal, collect all remaining NEC IDs
                    let expIds = [];
                    $('.badge[data-exp-id]').each(function() {
                        expIds.push($(this).data('exp-id'));
                    });
                });
            }
        });
    });
});
</script>