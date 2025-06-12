<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<!-- Select 2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link href="<?= base_url(); ?>assets/css/select2override.css" rel="stylesheet" />

<div class="container-fluid">
    <div class="page-header min-height-150 border-radius-xl mt-4" style="background-image: url('../../../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
        <span class="mask bg-gradient-primary opacity-6"></span>
    </div>
    <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <img src="../../../assets/img/bruce-mars.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        <?= $assessor_info->asr_name ?>
                    </h5>
                    <p class="mb-0 font-weight-bold text-sm">
                        <?= get_university_name($assessor_info->asr_qu_id) ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-4">
    <div class="row mt-3">
        <!-- Assessor Data -->
        <div class="col-12 col-md-12 col-xl-4 mt-md-0 mt-4">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h6 class="mb-0">Assessor Information</h6>
                        </div>
                        <div class="col-md-4 text-end">
                            <a href="javascript:;" onclick="showEditModal()">
                                <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <hr class="horizontal gray-light my-2">
                    <ul class="list-group">
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Name:</strong> <br><?= $assessor_info->asr_name ?></li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> <br><?= $assessor_info->asr_phone ?></li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Fax:</strong> <br><?= $assessor_info->asr_fax ?></li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> <br><?= $assessor_info->asr_email ?></li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Service Address:</strong> <br><?= $assessor_info->asr_service_address ?></li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Service Retirement Date:</strong> <br><?= $assessor_info->asr_retirement_date ?></li>
                        <li class="list-group-item border-0 ps-0 pb-0">
                            <strong class="text-dark text-sm">Expertise:</strong> <br>
                            <?php foreach ($assessor_expertise as $expert): ?>
                                <span class="badge my-2 badge-secondary"><?= $expert->ef_desc; ?></span>
                            <?php endforeach; ?>

                        </li>
                        <li class="list-group-item border-0 ps-0 pb-0">
                            <strong class="text-dark text-sm">NEC Field:</strong> <br>
                            <?php foreach ($nec_display as $nd): ?>
                                <?php
                                    // Get NEC Detail name by ID
                                    $filtered_detail = array_filter($nec_detail, function($item) use ($nd) {
                                        return $item->nd_id == $nd->anm_nd_id;
                                    });
                                    $filtered_detail = array_values($filtered_detail);
                                ?>
                                <?php if (!empty($filtered_detail)): ?>
                                    <span class="badge my-2 badge-secondary">
                                        <?= $filtered_detail[0]->nd_code; ?> <?= $filtered_detail[0]->nd_name; ?>
                                    </span>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Assessor Field -->
        <div class="col-12 col-md-12 col-xl-8 mt-xl-0 mt-4">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">My Certificate's</h6>
                </div>
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-flush" id="datatable-search">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Quality Management Workshop</td>
                                    <td>2025-01-10</td>
                                    <td>2025-01-12</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-primary btn-md px-3 py-1" title="View">
                                                <i class="fas fa-eye"></i>
                                            </button>

                                            <button type="button" class="btn btn-danger btn-md px-3 py-1" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Annual Provider Evaluation</td>
                                    <td>2025-02-01</td>
                                    <td>2025-02-28</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-primary btn-md px-3 py-1" title="View">
                                                <i class="fas fa-eye"></i>
                                            </button>

                                            <button type="button" class="btn btn-danger btn-md px-3 py-1" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Supplier Quality Audit</td>
                                    <td>2025-03-05</td>
                                    <td>2025-03-07</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-primary btn-md px-3 py-1" title="View">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-md px-3 py-1" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Customer Satisfaction Survey</td>
                                    <td>2025-04-01</td>
                                    <td>2025-04-30</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-primary btn-md px-3 py-1" title="View">
                                                <i class="fas fa-eye"></i>
                                            </button>

                                            <button type="button" class="btn btn-danger btn-md px-3 py-1" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Training Program for Staff</td>
                                    <td>2025-05-15</td>
                                    <td>2025-05-17</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-primary btn-md px-3 py-1" title="View">
                                                <i class="fas fa-eye"></i>
                                            </button>

                                            <button type="button" class="btn btn-danger btn-md px-3 py-1" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
    <div class="modal-lg modal-dialog">
        <div class="modal-content">
            <form id="editProfileForm">
                <?= csrf_field() ?>
                <div class="bg-primary modal-header">
                    <h5 class="modal-title" id="editProfileLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="asr_name" value="<?= $assessor_info->asr_name ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Mobile</label>
                        <input type="text" class="form-control" id="phone" name="asr_phone" value="<?= $assessor_info->asr_phone ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="fax" class="form-label">Fax</label>
                        <input type="text" class="form-control" id="fax" name="asr_fax" value="<?= $assessor_info->asr_fax ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="asr_email" value="<?= $assessor_info->asr_email ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Service Address</label>
                        <input type="text" class="form-control" id="address" name="asr_service_address" value="<?= $assessor_info->asr_service_address ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="retirement_date" class="form-label">Service Retirement Date</label>
                        <input type="date" class="form-control" id="retirement_date" name="asr_retirement_date" value="<?= $assessor_info->asr_retirement_date ?>" required>
                    </div>
                    

                    <!-- My Expertise -->
                    <div class="mb-3">
                        <label for="expertise" class="form-label">My Expertise</label><br>
                        <?php foreach ($assessor_expertise as $expert): ?>
                            <span class="badge my-2 badge-secondary">
                                <?= $expert->ef_desc; ?>
                                <i class="fas fa-times text-danger ms-2 delete-expertise"
                                    data-id="<?= $expert->aef_id; ?>"
                                    style="cursor: pointer;"></i>
                            </span>
                        <?php endforeach; ?>

                    </div>
                    <!-- Expertise Select2 Fields -->
                    <div id="expertiseFields">
                        <div class="mb-3 expertise-field">
                            <label for="expertise" class="form-label">Expertise 1</label>
                            <select class="form-select select2" name="expertise[]" id="expertise">
                                <option value="">Select Expertise</option>
                                <!-- Dynamic expertise options should be populated here -->
                                <?php foreach ($expertise_list as $expertise): ?>
                                    <option value="<?= $expertise->ef_id ?>"><?= $expertise->ef_desc ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <!-- Button to add another expertise -->
                    <button type="button" class="btn btn-primary btn-sm" id="addExpertiseBtn"><i class="fas fa-add" style="font-size: 1rem !important;"></i>&nbsp; Expertise</button>

                    <div class="mb-3">
                        <label for="nec" class="form-label">My NEC Field</label><br>
                        <?php foreach ($nec_display as $nd): ?>
                            <?php
                                // Get NEC Detail name by ID
                                $filtered_detail = array_filter($nec_detail, function($item) use ($nd) {
                                    return $item->nd_id == $nd->anm_nd_id;
                                });
                                $filtered_detail = array_values($filtered_detail);
                            ?>
                            <span class="badge my-2 badge-secondary">
                                <?= $filtered_detail[0]->nd_name; ?>
                                <i class="fas fa-times text-danger ms-2 delete-nec"
                                    data-id="<?= $nd->anm_id; ?>"
                                    style="cursor: pointer;"></i>
                            </span>
                        <?php endforeach; ?>

                    </div>

                    <!-- NEC Selection -->
                    <div class="mb-3">
                        <label for="nec_broad" class="form-label">NEC Broad</label>
                        <select class="form-select select2" id="nec_broad" name="nec_broad">
                            <option value="">Select NEC Broad</option>
                            <?php foreach ($nec_broad as $broad): ?>
                                <option value="<?= $broad->nb_id ?>"><?= $broad->nb_code ?> <?= $broad->nb_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="nec_narrow" class="form-label">NEC Narrow</label>
                        <select class="form-select select2" id="nec_narrow" name="nec_narrow">
                            <option value="">Select NEC Narrow</option>
                            <!-- Options will be populated based on NEC Broad selection -->
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="nec_detail" class="form-label">NEC Detail</label>
                        <select class="form-select select2" id="nec_detail" name="nec_detail">
                            <option value="">Select NEC Detail</option>
                            <!-- Options will be populated based on NEC Narrow selection -->
                        </select>
                    </div>

                    <button type="button" class="btn btn-primary btn-sm" id="addNECBtn"><i class="fas fa-add" style="font-size: 1rem !important;"></i>&nbsp; NEC</button>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary mb-0" data-bs-dismiss="modal"><i class="fas fa-times" style="font-size: 1rem !important;"></i>&nbsp; Close</button>
                    <button type="submit" class="btn btn-primary mb-0"><i class="fas fa-save" style="font-size: 1rem !important;"></i>&nbsp; Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>assets/js/plugins/datatables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    // Initialize Simple DataTable
    const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
        searchable: true,
        fixedHeight: true,
    });
</script>

<!-- Edit Profile Script -->
<script>
    function showEditModal() {
        const editProfileModal = new bootstrap.Modal(document.getElementById('editProfileModal'));
        editProfileModal.show();
    }

    document.getElementById('editProfileForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        fetch("<?= base_url('assessor/update_profile') ?>", {
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
        // Initialize Select2 on the expertise select input inside a modal
        $('#expertise').select2({
            placeholder: "Select Expertise",
            dropdownParent: $('#editProfileModal') // Append dropdown to the modal
        });


        let expertiseCount = 2; // Counter for unique IDs

        $('#addExpertiseBtn').on('click', function() {
            let newId = 'expertise_' + expertiseCount; // Create a unique ID

            let newField = `
            <div class="mb-3 expertise-field">
                <label for="${newId}" class="form-label">Expertise ${expertiseCount}</label>
                <select id="${newId}" class="form-select select2" name="expertise[]" required>
                    <option value="">Select Expertise</option>
                    <?php foreach ($expertise_list as $expertise): ?>
                        <option value="<?= $expertise->ef_id ?>"><?= $expertise->ef_desc ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        `;

            $('#expertiseFields').append(newField); // Append new field

            // Apply Select2 to the new field with the correct dropdownParent
            $('#' + newId).select2({
                placeholder: "Select Expertise",
                dropdownParent: $('#editProfileModal') // Ensure it's inside the modal
            });

            expertiseCount++; // Increment counter for next ID
        });

        // Initialize Select2 for the first field (if exists)
        $('#expertise').select2({
            placeholder: "Select Expertise",
            dropdownParent: $('#editProfileModal')
        });
    });
</script>

<!-- Ajax to delete My Expertise -->
<script>
    jQuery(document).ready(function($) {
        $('.delete-expertise').on('click', function() {
            var expertiseId = $(this).data("id");
            var badge = $(this).closest("span"); // Select the parent badge

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= base_url('assessor/delete_expertise'); ?>",
                        type: "POST",
                        data: {
                            id: expertiseId,
                            csrf_test_name: document.querySelector("input[name='csrf_test_name']").value
                        },
                        dataType: "json", // Ensure JSON response
                        success: function(response) {
                            if (response.success) {
                                if (response.csrf_token) {
                                    // 🔄 Update all CSRF token inputs in the form
                                    document.querySelectorAll("input[name='csrf_test_name']").forEach(input => {
                                        input.value = response.csrf_token;
                                    });
                                }

                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Expertise has been removed.",
                                    icon: "success",
                                    timer: 2000,
                                    showConfirmButton: false
                                });

                                badge.fadeOut(300, function() {
                                    $(this).remove();
                                });
                            } else {
                                Swal.fire({
                                    title: "Failed!",
                                    text: "Failed to delete expertise.",
                                    icon: "error"
                                });
                            }
                        },
                        error: function(xhr) {
                            Swal.fire({
                                title: "Error!",
                                text: "Something went wrong. Please try again.",
                                icon: "error"
                            });
                            console.log(xhr.responseText); // Debugging
                        }
                    });
                }
            });
        });
    });
</script>

<!-- Ajax to delete My NEC Field -->
<script>
    jQuery(document).ready(function($) {
        $('.delete-nec').on('click', function() {
            var necId = $(this).data("id");
            var badge = $(this).closest("span"); // Select the parent badge

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= base_url('assessor/delete_nec'); ?>",
                        type: "POST",
                        data: {
                            id: necId,
                            csrf_test_name: document.querySelector("input[name='csrf_test_name']").value
                        },
                        dataType: "json", // Ensure JSON response
                        success: function(response) {
                            if (response.success) {
                                if (response.csrf_token) {
                                    // 🔄 Update all CSRF token inputs in the form
                                    document.querySelectorAll("input[name='csrf_test_name']").forEach(input => {
                                        input.value = response.csrf_token;
                                    });
                                }

                                Swal.fire({
                                    title: "Deleted!",
                                    text: "NEC has been removed.",
                                    icon: "success",
                                    timer: 2000,
                                    showConfirmButton: false
                                });

                                badge.fadeOut(300, function() {
                                    $(this).remove();
                                });
                            } else {
                                Swal.fire({
                                    title: "Failed!",
                                    text: "Failed to delete NEC.",
                                    icon: "error"
                                });
                            }
                        },
                        error: function(xhr) {
                            Swal.fire({
                                title: "Error!",
                                text: "Something went wrong. Please try again.",
                                icon: "error"
                            });
                            console.log(xhr.responseText); // Debugging
                        }
                    });
                }
            });
        });
    });
</script>

<script>
    jQuery(document).ready(function($) {
        // Hide narrow and detail fields initially
        $('#nec_narrow').closest('.mb-3').hide();
        $('#nec_detail').closest('.mb-3').hide();

        // Show NEC Narrow after selecting Broad
        $('#nec_broad').on('change', function() {
            var broad_id = $(this).val();
            $('#nec_narrow').html('<option value="">Loading...</option>');
            $('#nec_detail').html('<option value="">Select NEC Detail</option>');
            if (broad_id) {
                $('#nec_narrow').closest('.mb-3').show();
                $.ajax({
                    url: "<?= base_url('assessor/get_nec_narrow') ?>",
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
                            $('#nec_narrow').html(options).trigger('change');
                            $("input[name='csrf_test_name']").val(response.csrf_token);
                        } else {
                            $('#nec_narrow').html('<option value="">Select NEC Narrow</option>');
                        }
                    }
                });
            } else {
                $('#nec_narrow').closest('.mb-3').hide();
                $('#nec_detail').closest('.mb-3').hide();
            }
            $('#nec_detail').closest('.mb-3').hide();
        });

        // Show NEC Detail after selecting Narrow
        $('#nec_narrow').on('change', function() {
            var narrow_id = $(this).val();
            $('#nec_detail').html('<option value="">Loading...</option>');
            if (narrow_id) {
                $('#nec_detail').closest('.mb-3').show();
                $.ajax({
                    url: "<?= base_url('assessor/get_nec_detail') ?>",
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
                            $('#nec_detail').html(options).trigger('change');
                            $("input[name='csrf_test_name']").val(response.csrf_token);
                        } else {
                            $('#nec_detail').html('<option value="">Select NEC Detail</option>');
                        }
                    }
                });
            } else {
                $('#nec_detail').html('<option value="">Select NEC Detail</option>');
            }
        });
    });
</script>

<script>
jQuery(document).ready(function($) {
    // Add NEC Field
    $('#addNECBtn').on('click', function() {
        // Get selected NEC Detail
        var necDetailId = $('#nec_detail').val();
        var necDetailText = $('#nec_detail option:selected').text();

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
        let badge = `
            <span class="badge my-2 badge-secondary" data-nd-id="${necDetailId}">
                ${necDetailText}
                <i class="fas fa-times text-danger ms-2 delete-nec"
                    data-id=""
                    style="cursor: pointer;"></i>
            </span>
        `;
        // Append before the NEC select fields
        $(badge).insertBefore('#nec_broad').hide().fadeIn(200);

        // Optionally, clear selection
        $('#nec_broad').val('').trigger('change');
        $('#nec_narrow').val('').trigger('change').closest('.mb-3').hide();
        $('#nec_detail').val('').trigger('change').closest('.mb-3').hide();
    });

    // ...existing code...
});
</script>