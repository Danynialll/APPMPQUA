<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<style>
    .select2-container {
  width: 100% !important;
}
</style>

<!-- Use the same CSS as createModalNew.php for consistent style -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    /* Copy all style blocks from createModalNew.php here */
    .step-indicator {
        display: flex;
        justify-content: space-between;
        margin-bottom: 2rem;
        position: relative;
    }
    .step-indicator::before {
        content: '';
        position: absolute;
        top: 20px;
        left: 0;
        right: 0;
        height: 2px;
        background: #e9ecef;
        z-index: 1;
    }
    .step-indicator .progress-line {
        position: absolute;
        top: 20px;
        left: 0;
        height: 2px;
        background: linear-gradient(90deg, #0d6efd, #6610f2);
        z-index: 2;
        transition: width 0.3s ease;
    }
    .step {
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
        z-index: 3;
        background: white;
        padding: 0 10px;
    }
    .step-number {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #e9ecef;
        color: #6c757d;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        margin-bottom: 8px;
        transition: all 0.3s ease;
    }
    .step.active .step-number {
        background: linear-gradient(135deg, #0d6efd, #6610f2);
        color: white;
        transform: scale(1.1);
    }
    .step.completed .step-number {
        background: #198754;
        color: white;
    }
    .step-title {
        font-size: 0.875rem;
        font-weight: 500;
        color: #6c757d;
        text-align: center;
    }
    .step.active .step-title {
        color: #0d6efd;
        font-weight: 600;
    }
    .step.completed .step-title {
        color: #198754;
    }
    .step-content {
        display: none;
        animation: fadeIn 0.3s ease;
    }
    .step-content.active {
        display: block;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .form-section {
        background: #f8f9fa;
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        border: 1px solid #e9ecef;
    }
    .form-section-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #495057;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .form-section-title i {
        color: #0d6efd;
    }
    .form-control, .form-select {
        border-radius: 8px;
        border: 1px solid #ced4da;
        transition: all 0.2s ease;
    }
    .form-control:focus, .form-select:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
    }
    .btn-gradient {
        background: linear-gradient(135deg, #0d6efd, #6610f2);
        border: none;
        color: white;
        border-radius: 8px;
        padding: 0.75rem 1.5rem;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    .btn-gradient:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(13, 110, 253, 0.3);
        color: white;
    }
    .selection-display {
        background: white;
        border-radius: 8px;
        padding: 1rem;
        margin-top: 1rem;
        border: 1px solid #e9ecef;
        min-height: 60px;
    }
    .selection-display .no-selection {
        color: #6c757d;
        font-style: italic;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 40px;
    }
    .badge-item {
        background: linear-gradient(135deg, #e7f3ff, #f0f8ff);
        color: #0d6efd;
        border: 1px solid #b6d7ff;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        margin: 0.25rem;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.875rem;
        font-weight: 500;
    }
    .badge-item .remove-btn {
        background: #dc3545;
        color: white;
        border: none;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 0.75rem;
        transition: all 0.2s ease;
    }
    .badge-item .remove-btn:hover {
        background: #c82333;
        transform: scale(1.1);
    }
    .add-item-section {
        background: white;
        border-radius: 8px;
        padding: 1.5rem;
        border: 2px dashed #ced4da;
        margin-top: 1rem;
    }
    .file-upload-area {
        border: 2px dashed #ced4da;
        border-radius: 8px;
        padding: 2rem;
        text-align: center;
        background: #f8f9fa;
        transition: all 0.3s ease;
    }
    .file-upload-area:hover {
        border-color: #0d6efd;
        background: #e7f3ff;
    }
    .file-upload-area input[type="file"] {
        display: none;
    }
    .file-upload-label {
        cursor: pointer;
        color: #0d6efd;
        font-weight: 500;
    }
    .btn-step {
        min-width: 100px;
    }
    .required-field::after {
        content: " *";
        color: #dc3545;
    }
    .form-label {
        font-weight: 500;
        color: #495057;
        margin-bottom: 0.5rem;
    }
    .step-navigation {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 2rem;
        padding-top: 1rem;
        border-top: 1px solid #e9ecef;
    }
    input[readonly], select[readonly], textarea[readonly] {
    background-color: #e9ecef !important;
    color: #6c757d !important;
    cursor: not-allowed;
    opacity: 1;
}
</style>

<!-- Modal structure: replicate the stepper and sections from createModalNew.php, but for editing -->
<div class="modal fade custom-modal" id="editAssessorModal" tabindex="-1" aria-labelledby="editAssessorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAssessorModalLabel">
                    <i class="fas fa-user-edit me-2"></i>Edit Assessor
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Step Indicator -->
                <div class="step-indicator">
                    <div class="progress-line" style="width: 0%"></div>
                    <div class="step active" data-step="1">
                        <div class="step-number">1</div>
                        <div class="step-title">Basic Info</div>
                    </div>
                    <div class="step" data-step="2">
                        <div class="step-number">2</div>
                        <div class="step-title">Expertise</div>
                    </div>
                    <div class="step" data-step="3">
                        <div class="step-number">3</div>
                        <div class="step-title">NEC Fields</div>
                    </div>
                    <div class="step" data-step="4">
                        <div class="step-number">4</div>
                        <div class="step-title">Documents</div>
                    </div>
                </div>
                <form id="editAssessorForm">
                    <?= csrf_field() ?>
                    <input type="hidden" name="asr_id" id="modalIdInput" value="">
                    <!-- Step 1: Basic Information -->
                    <div class="step-content active" data-content="1">
                        <div class="form-section">
                            <div class="form-section-title">
                                <i class="fas fa-user"></i>
                                Personal Information
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="title" class="form-label required-field">Title</label>
                                    <input type="text" name="asr_title_desc" id="modalTitleInput" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label required-field">Full Name</label>
                                    <input type="text" name="asr_name" id="modalNameInput" class="form-control" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label required-field">Gender</label>
                                    <select name="asr_gender" id="modalGenderInput" class="form-select" readonly>
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Retirement Date</label>
                                    <input type="date" name="asr_retirement_date" id="modalRetirementInput" class="form-control">
                                </div>
                                <input type="text" name="asr_qu_id" class="form-control" required style="display: none;" value="<?= esc($qu_id) ?>">
                            </div>
                        </div>
                        <div class="form-section">
                            <div class="form-section-title">
                                <i class="fas fa-address-card"></i>
                                Contact Information
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label required-field">Email</label>
                                    <input type="email" name="asr_email" id="modalEmailInput" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Telephone No.</label>
                                    <input type="text" name="asr_phone" id="modalTelephoneInput" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Fax</label>
                                    <input type="text" name="asr_fax" id="modalFaxInput" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Service Address</label>
                                    <input type="text" name="asr_service_address" id="modalAddressInput" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Step 2: Expertise -->
                    <div class="step-content" data-content="2">
                        <div class="form-section">
                            <div class="form-section-title">
                                <i class="fas fa-lightbulb"></i>
                                Areas of Expertise
                            </div>
                            <div class="selection-display" id="expertiseDisplayEdit">
                                <div class="no-selection">
                                    <i class="fas fa-info-circle me-2"></i>
                                    No expertise selected yet
                                </div>
                            </div>
                            <div class="add-item-section">
                                <div class="row align-items-end">
                                    <div class="col-10">
                                        <label for="expertise" class="form-label">Select Expertise</label>
                                        <select class="form-select select2" name="expertise[]" id="editExpertise">
                                            <option value="">Choose an area of expertise</option>
                                            <?php foreach ($expertise_list as $expertise): ?>
                                                <option value="<?= $expertise->ef_id ?>"><?= $expertise->ef_desc ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <button type="button" class="btn btn-gradient w-100" id="addExpertiseBtnEdit">
                                            <i class="fas fa-plus"></i> Add
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Step 3: NEC Fields -->
                    <div class="step-content" data-content="3">
                        <div class="form-section">
                            <div class="form-section-title">
                                <i class="fas fa-sitemap"></i>
                                NEC Classification Fields
                            </div>
                            <div class="selection-display" id="necDisplayEdit">
                                <div class="no-selection">
                                    <i class="fas fa-info-circle me-2"></i>
                                    No NEC fields selected yet
                                </div>
                            </div>
                            <div class="add-item-section">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="nec_broad" class="form-label">NEC Broad</label>
                                        <select class="form-select select2" id="edit_nec_broad" name="nec_broad">
                                            <option value="">Select NEC Broad</option>
                                            <?php foreach ($nec_broad as $broad): ?>
                                                <option value="<?= $broad->nb_id ?>"><?= $broad->nb_code ?> <?= $broad->nb_name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="nec_narrow" class="form-label">NEC Narrow</label>
                                        <select class="form-select select2" id="edit_nec_narrow" name="nec_narrow" disabled>
                                            <option value="">Select NEC Narrow</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="nec_detail" class="form-label">NEC Detail</label>
                                        <select class="form-select select2" id="edit_nec_detail" name="nec_detail[]" disabled>
                                            <option value="">Select NEC Detail</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="button" class="btn btn-gradient" id="addNECBtnEdit">
                                        <i class="fas fa-plus"></i> Add NEC Field
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Step 4: Documents -->
                    <div class="step-content" data-content="4">
                        <div class="form-section">
                            <div class="form-section-title">
                                <i class="fas fa-file-upload"></i>
                                Document Upload
                            </div>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label">Profile Picture</label>
                                    <div class="file-upload-area" id="profilePictureAreaEdit">
                                        <input type="file" name="asr_image" id="profilePictureEdit" accept=".jpeg,.png,.jpg">
                                        <label for="profilePictureEdit" class="file-upload-label">
                                            <i class="fas fa-camera fa-2x mb-2"></i>
                                            <div>Click to upload profile picture</div>
                                            <small class="text-muted">PNG, JPEG formats only</small>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Curriculum Vitae</label>
                                    <div class="file-upload-area" id="cvFileAreaEdit">
                                        <input type="file" name="asr_cv" id="cvFileEdit" accept=".pdf,.jpeg,.png,.jpg">
                                        <label for="cvFileEdit" class="file-upload-label">
                                            <i class="fas fa-file-pdf fa-2x mb-2"></i>
                                            <div>Click to upload CV</div>
                                            <small class="text-muted">PDF, PNG, JPEG formats</small>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Navigation Buttons -->
                    <div class="step-navigation">
                        <button type="button" class="btn btn-outline-secondary btn-step" id="prevBtnEdit" style="display: none;">
                            <i class="fas fa-arrow-left me-2"></i>Previous
                        </button>
                        <div class="ms-auto">
                            <button type="button" class="btn btn-gradient btn-step" id="nextBtnEdit">
                                Next<i class="fas fa-arrow-right ms-2"></i>
                            </button>
                            <button type="submit" class="btn btn-success btn-step" id="submitBtnEdit" style="display: none;">
                                <i class="fas fa-save me-2"></i>Save Changes
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JS: replicate the stepper, select2, badge, and file preview logic from createModalNew.php, but use the Edit IDs -->
<script>

    jQuery(document).ready(function($) {
        let currentStepEdit = 1;
        const totalStepsEdit = 4;
        const editModal = document.querySelector('#editAssessorModal');

        function updateStepIndicatorEdit() {

            const progressLineEdit = document.querySelector('#editAssessorModal .progress-line');
            const progressPercentEdit = ((currentStepEdit - 1) / (totalStepsEdit - 1)) * 100;
            progressLineEdit.style.width = progressPercentEdit + '%';

            document.querySelectorAll('#editAssessorModal .step').forEach((step, index) => {
                const stepNumber = index + 1;
                step.classList.remove('active', 'completed');
                if (stepNumber < currentStepEdit) {
                    step.classList.add('completed');
                } else if (stepNumber === currentStepEdit) {
                    step.classList.add('active');
                }
            });

            document.querySelectorAll('#editAssessorModal .step-content').forEach((content, index) => {
                content.classList.remove('active');
                if (index + 1 === currentStepEdit) {
                    content.classList.add('active');
                }
            });

            editModal.querySelector('#prevBtnEdit').style.display = currentStepEdit === 1 ? 'none' : 'inline-block';
            editModal.querySelector('#nextBtnEdit').style.display = currentStepEdit === totalStepsEdit ? 'none' : 'inline-block';
            editModal.querySelector('#submitBtnEdit').style.display = currentStepEdit === totalStepsEdit ? 'inline-block' : 'none';
        }

        editModal.querySelector('#nextBtnEdit').addEventListener('click', function() {
            if (validateCurrentStepEdit()) {
                currentStepEdit++;
                updateStepIndicatorEdit();
            }
        });
        
        editModal.querySelector('#prevBtnEdit').addEventListener('click', function() {
            currentStepEdit--;
            updateStepIndicatorEdit();
        });

        function validateCurrentStepEdit() {
            const currentContent = document.querySelector(`#editAssessorModal .step-content[data-content="${currentStepEdit}"]`);
            const requiredFields = currentContent.querySelectorAll('[required]');
            for (let field of requiredFields) {
                if (!field.value.trim()) {
                    field.focus();
                    Swal.fire({
                        icon: 'warning',
                        title: 'Required Field',
                        text: 'Please fill in all required fields before proceeding.',
                    });
                    return false;
                }
            }
            return true;
        }


        $('#editAssessorModal .select2').select2({
            allowClear: false,
            dropdownParent: $('#editAssessorModal'),
            width: '100%',
        });

        // Expertise badge logic
        $('#addExpertiseBtnEdit').on('click', function() {
            var expertiseId = $('#editExpertise').val();
            var expertiseText = $('#editExpertise option:selected').text();
            if (!expertiseId) {
                Swal.fire({ icon: 'warning', title: 'Please select expertise', text: 'You must select an expertise before adding.' });
                return;
            }
            var exists = false;
            $('#expertiseDisplayEdit [data-exp-id="' + expertiseId + '"]').each(function() { exists = true; });
            if (exists) {
                Swal.fire({ icon: 'info', title: 'Already Added', text: 'This expertise is already added.' });
                return;
            }
            var badge = `
                <div class="badge-item" data-exp-id="${expertiseId}">
                    <i class="fas fa-lightbulb"></i>
                    ${expertiseText}
                    <button type="button" class="remove-btn delete-exp-edit">
                        <i class="fas fa-times"></i>
                    </button>
                    <input type="hidden" name="expertise[]" value="${expertiseId}">
                </div>
            `;
            $('#expertiseDisplayEdit').find('.no-selection').remove();
            $('#expertiseDisplayEdit').append(badge);
            $('#editExpertise').val('').trigger('change');
        });
        $(document).on('click', '.delete-exp-edit', function() {
            var badge = $(this).closest('.badge-item');
            badge.fadeOut(300, function() {
                $(this).remove();
                if ($('#expertiseDisplayEdit .badge-item').length === 0) {
                    $('#expertiseDisplayEdit').html('<div class="no-selection"><i class="fas fa-info-circle me-2"></i>No expertise selected yet</div>');
                }
            });
        });

        // NEC badge logic
        $('#addNECBtnEdit').on('click', function() {
            var necDetailId = $('#edit_nec_detail').val();
            var necDetailText = $('#edit_nec_detail option:selected').text();
            if (!necDetailId) {
                Swal.fire({ icon: 'warning', title: 'Please select NEC Detail', text: 'You must select a NEC Detail before adding.' });
                return;
            }
            var exists = false;
            $('#necDisplayEdit [data-nd-id="' + necDetailId + '"]').each(function() { exists = true; });
            if (exists) {
                Swal.fire({ icon: 'info', title: 'Already Added', text: 'This NEC Detail is already added.' });
                return;
            }
            var badge = `
                <div class="badge-item" data-nd-id="${necDetailId}">
                    <i class="fas fa-sitemap"></i>
                    ${necDetailText}
                    <button type="button" class="remove-btn delete-nec-edit">
                        <i class="fas fa-times"></i>
                    </button>
                    <input type="hidden" name="nec_detail[]" value="${necDetailId}">
                </div>
            `;
            $('#necDisplayEdit').find('.no-selection').remove();
            $('#necDisplayEdit').append(badge);
            // Reset selections
            $('#edit_nec_broad').val('').trigger('change');
            $('#edit_nec_narrow').val('').trigger('change').prop('disabled', true);
            $('#edit_nec_detail').val('').trigger('change').prop('disabled', true);
        });
        $(document).on('click', '.delete-nec-edit', function() {
            var badge = $(this).closest('.badge-item');
            badge.fadeOut(300, function() {
                $(this).remove();
                if ($('#necDisplayEdit .badge-item').length === 0) {
                    $('#necDisplayEdit').html('<div class="no-selection"><i class="fas fa-info-circle me-2"></i>No NEC fields selected yet</div>');
                }
            });
        });

        // NEC cascading dropdowns
        $('#edit_nec_broad').on('change', function() {
            var broad_id = $(this).val();
            $('#edit_nec_narrow').prop('disabled', !broad_id);
            $('#edit_nec_detail').prop('disabled', true);
            if (broad_id) {
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
                            $('#edit_nec_narrow').html(options).trigger('change');
                            $("input[name='csrf_test_name']").val(response.csrf_token);
                        } else {
                            $('#edit_nec_narrow').html('<option value="">Select NEC Narrow</option>');
                        }
                    }
                });
            } else {
                $('#edit_nec_narrow').html('<option value="">Select NEC Narrow</option>');
            }
        });
        $('#edit_nec_narrow').on('change', function() {
            var narrow_id = $(this).val();
            $('#edit_nec_detail').prop('disabled', !narrow_id);
            if (narrow_id) {
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
                            $('#edit_nec_detail').html(options).trigger('change');
                            $("input[name='csrf_test_name']").val(response.csrf_token);
                        } else {
                            $('#edit_nec_detail').html('<option value="">Select NEC Detail</option>');
                        }
                    }
                });
            } else {
                $('#edit_nec_detail').html('<option value="">Select NEC Detail</option>');
            }
        });

        // Preview selected profile picture
        $('#profilePictureEdit').on('change', function(e) {
            const file = this.files[0];
            const previewArea = $(this).closest('.file-upload-area');
            previewArea.find('.image-preview').remove();
            if (file && file.type.match('image.*')) {
                const reader = new FileReader();
                reader.onload = function(evt) {
                    const img = $('<img class="image-preview mt-2 mb-2" style="max-width:120px; max-height:120px; border-radius:8px; display:block; margin:auto;">');
                    img.attr('src', evt.target.result);
                    previewArea.append(img);
                };
                reader.readAsDataURL(file);
            }
        });
        // Preview selected CV file
        $('#cvFileEdit').on('change', function(e) {
            const file = this.files[0];
            const previewArea = $(this).closest('.file-upload-area');
            previewArea.find('.cv-preview').remove();
            if (file) {
                let preview;
                if (file.type === 'application/pdf') {
                    preview = $('<div class="cv-preview mt-2 mb-2 text-center"><i class="fas fa-file-pdf fa-2x text-danger"></i><div>' + file.name + '</div></div>');
                } else if (file.type.match('image.*')) {
                    const reader = new FileReader();
                    reader.onload = function(evt) {
                        const img = $('<img class="cv-preview mt-2 mb-2" style="max-width:120px; max-height:120px; border-radius:8px; display:block; margin:auto;">');
                        img.attr('src', evt.target.result);
                        previewArea.append(img);
                    };
                    reader.readAsDataURL(file);
                    return;
                } else {
                    preview = $('<div class="cv-preview mt-2 mb-2 text-center"><i class="fas fa-file-alt fa-2x"></i><div>' + file.name + '</div></div>');
                }
                previewArea.append(preview);
            }
        });

        // Populate form data for edit
        window.openEditModalWithData = function(asrId) {
            // Reset stepper and form
            currentStepEdit = 1;
            updateStepIndicatorEdit();
            $('#editAssessorForm')[0].reset();
            $('#expertiseDisplayEdit').html('<div class="no-selection"><i class="fas fa-info-circle me-2"></i>No expertise selected yet</div>');
            $('#necDisplayEdit').html('<div class="no-selection"><i class="fas fa-info-circle me-2"></i>No NEC fields selected yet</div>');
            $('#profilePictureAreaEdit .image-preview').remove();
            $('#cvFileAreaEdit .cv-preview').remove();

            // Fetch data
            fetch('<?= base_url('appmpqua/get_assessor/') ?>' + asrId)
                .then(response => response.json())
                .then(result => {
                    if (!result.success) return;
                    const data = result.data;
                    $('#modalIdInput').val(data.asr_id || '');
                    $('#modalTitleInput').val(data.asr_title_desc || '');
                    $('#modalNameInput').val(data.asr_name || '');
                    $('#modalGenderInput').val(data.asr_gender || '');
                    $('#modalRetirementInput').val(data.asr_retirement_date || '');
                    $('#modalEmailInput').val(data.asr_email || '');
                    $('#modalTelephoneInput').val(data.asr_phone || '');
                    $('#modalFaxInput').val(data.asr_fax || '');
                    $('#modalAddressInput').val(data.asr_service_address || '');

                    // Expertise badges
                    if (data.expertise_list && data.expertise_list.length > 0) {
                        data.expertise_list.forEach(exp => {
                            let expId = exp.ef_id || exp.id || exp;
                            let expDesc = exp.ef_desc || exp.name || exp;
                            var badge = `
                                <div class="badge-item" data-exp-id="${expId}">
                                    <i class="fas fa-lightbulb"></i>
                                    ${expDesc}
                                    <button type="button" class="remove-btn delete-exp-edit">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    <input type="hidden" name="expertise[]" value="${expId}">
                                </div>
                            `;
                            $('#expertiseDisplayEdit').find('.no-selection').remove();
                            $('#expertiseDisplayEdit').append(badge);
                        });
                    }
                    // NEC badges
                    if (data.nec_detail_list && data.nec_detail_list.length > 0) {
                        data.nec_detail_list.forEach(nec => {
                            let necId = nec.nd_id || nec.id || nec;
                            let necDesc = nec.nd_desc || nec.name || nec;
                            var badge = `
                                <div class="badge-item" data-nd-id="${necId}">
                                    <i class="fas fa-sitemap"></i>
                                    ${necDesc}
                                    <button type="button" class="remove-btn delete-nec-edit">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    <input type="hidden" name="nec_detail[]" value="${necId}">
                                </div>
                            `;
                            $('#necDisplayEdit').find('.no-selection').remove();
                            $('#necDisplayEdit').append(badge);
                        });
                    }
                    // Profile picture preview (if exists)
                    if (data.asr_image) {
                        const img = $('<img class="image-preview mt-2 mb-2" style="max-width:120px; max-height:120px; border-radius:8px; display:block; margin:auto;">');
                        img.attr('src', '<?= base_url() ?>' + data.asr_image);
                        $('#profilePictureAreaEdit').append(img);
                    }
                    // CV preview (if exists)
                    if (data.asr_cv_path) {
                        let preview;
                        if (data.asr_cv_path.endsWith('.pdf')) {
                            preview = $('<div class="cv-preview mt-2 mb-2 text-center"><i class="fas fa-file-pdf fa-2x text-danger"></i><div>Existing CV</div></div>');
                        } else if (data.asr_cv_path.match(/\.(jpg|jpeg|png)$/i)) {
                            preview = $('<img class="cv-preview mt-2 mb-2" style="max-width:120px; max-height:120px; border-radius:8px; display:block; margin:auto;">');
                            preview.attr('src', '<?= base_url() ?>' + data.asr_cv_path);
                        } else {
                            preview = $('<div class="cv-preview mt-2 mb-2 text-center"><i class="fas fa-file-alt fa-2x"></i><div>Existing CV</div></div>');
                        }
                        $('#cvFileAreaEdit').append(preview);
                    }
                });
            // Show modal
            var modal = new bootstrap.Modal(document.getElementById('editAssessorModal'));
            modal.show();
        };

        // Form submission
        $('#editAssessorForm').on('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            Swal.fire({
                title: 'Saving Assessor...',
                text: 'Please wait while we save the assessor information.',
                allowOutsideClick: false,
                didOpen: () => { Swal.showLoading(); }
            });
            fetch("<?= base_url('appmpqua/editAssessor') ?>", {
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
                    }).then(() => { location.reload(); });
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
    });

    $('#editAssessorModal').on('hidden.bs.modal', function () {
        $('#editAssessorForm')[0].reset();
        $('#expertiseDisplayEdit').html('<div class="no-selection"><i class="fas fa-info-circle me-2"></i>No expertise selected yet</div>');
        $('#necDisplayEdit').html('<div class="no-selection"><i class="fas fa-info-circle me-2"></i>No NEC fields selected yet</div>');
        $('#profilePictureAreaEdit .image-preview').remove();
        $('#cvFileAreaEdit .cv-preview').remove();
    });

</script>

