<!-- Modern CSS Libraries -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

<!-- Required JS Libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

<!-- FontAwesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<!-- Bootstrap CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

<!-- Import table styling -->
<link rel="stylesheet" href="<?= base_url('assets/css/custom_table.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/custom_card.css'); ?>">

<style>
    .nav-link {
        font-weight: 500;
        border-radius: 6px;
        transition: all 0.2s ease;
    }

    .nav-link.active {
        background-color: #5e72e4;
        /* color: white !important; */
        box-shadow: 0 3px 5px rgba(94, 114, 228, 0.3);
    }

    .action-btn {
        border-radius: 6px;
        transition: all 0.2s;
    }

    .action-btn:hover {
        transform: translateY(-2px);
    }

    .pending-card {
        border-left: 4px solid #5e72e4;
        transition: all 0.3s;
    }

    .pending-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 7px 14px rgba(50, 50, 93, 0.1), 0 3px 6px rgba(0, 0, 0, 0.08);
    }

    .badge {
        padding: 6px 10px;
        font-weight: 500;
        font-size: 0.75rem;
    }

    .status-badge {
        border-radius: 6px;
        padding: 8px 10px;
        display: inline-block;
        margin-bottom: 5px;
        font-weight: 500;
    }

    .action-container {
        display: flex;
        gap: 5px;
    }

    .action-icon {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        transition: all 0.2s;
    }

    .action-icon:hover {
        transform: translateY(-2px);
    }

    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
        background: #c8c8c8;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #a1a1a1;
    }
</style>


<div class="container-fluid py-4">
    <div class="row">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center p-0 pt-3">
                <h2 class="mb-0 fs-4 fw-bold"><?= get_university_name($mpq->mpq_qu_id) ?> Assessors</h2>
            </div>
            <div class="card-body p-0 mt-4">
                <div class="row mb-0">
                    <div class="col-xl-3 col-lg-6 col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Assessors</p>
                                            <h5 class="font-weight-bolder mb-0">
                                                <?= esc($total_assessors) ?>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-gradient-success shadow text-center rounded-circle">
                                            <i class="fas fa-users text-white opacity-10"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Male Assessors</p>
                                            <h5 class="font-weight-bolder mb-0">
                                                <?= esc($male_assessors) ?>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-gradient-info shadow text-center rounded-circle">
                                            <i class="fas fa-male text-white opacity-10"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Female Assessors</p>
                                            <h5 class="font-weight-bolder mb-0">
                                                <?= esc($female_assessors) ?>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow text-center rounded-circle">
                                            <i class="fas fa-female text-white opacity-10"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Retired Assessors</p>
                                            <h5 class="font-weight-bolder mb-0">
                                                0
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-gradient-warning shadow text-center rounded-circle">
                                            <i class="fas fa-clock text-white opacity-10"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filter & Controls -->
            <div class="card mb-4 mt-4">
                <div class="card-body p-3">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-md-7">
                            <div class="d-flex flex-wrap gap-2">
                                <button id="export-btn" class="btn bg-gradient-success me-2" style="font-size: 12px;">
                                    Export
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-5 mt-3 mt-md-0">
                            <div class="d-flex align-items-center justify-content-md-end">
                                <button class="btn bg-gradient-primary me-2" data-bs-toggle="modal" data-bs-target="#addAssessorModal">
                                    <i class="fas fa-plus"></i> Add Assessor
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Table -->
            <div class="card mb-3">
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table" id="datatable-search">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width:60px;">No.</th>
                                    <th>Name</th>
                                    <th>Contact No.</th>
                                    <th>Email</th>
                                    <th>Retirement Date</th>
                                    <th style="width:120px;" class="text-center">Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($assessor_list)):
                                    $i = 1; foreach ($assessor_list as $asr): ?>
                                        <tr>
                                            <td><h6 class="mb-0 text-sm"><?= $i++ ?></h6></td>
                                            <td><h6 class="mb-0 text-sm"><?= esc($asr->asr_name) ?></h6></td>
                                            <td>
                                                <strong>Telephone:</strong> <?= esc($asr->asr_phone) ?><br>
                                                <strong>Fax:</strong> <?= esc($asr->asr_fax) ?>
                                            </td>
                                            <td><?= esc($asr->asr_email) ?></td>
                                            <td>
                                                <h6 class="mb-0 text-sm">
                                                    <?php
                                                        if (!empty($asr->asr_retirement_date) && $asr->asr_retirement_date !== '0000-00-00') {
                                                            echo date('d-m-Y', strtotime($asr->asr_retirement_date));
                                                        } else {
                                                            echo '-';
                                                        }
                                                    ?>
                                                </h6>
                                            </td>
                                            <td class="text-center">
                                                <div class="action-container">
                                                    <button class="btn btn-primary btn-view-details"
                                                        data-asr-id="<?= esc($asr->asr_id) ?>"
                                                        data-bs-toggle="modal" data-bs-target="#viewModal">
                                                        <i class="fas fa-eye" style="font-size: 1rem !important;"></i>&nbsp;
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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

<!-- View Modal -->
<?php 
    include 'ListUniFunctionModal/viewModal.php'; 
    include 'ListUniFunctionModal/editModal.php'; 
    include 'ListUniFunctionModal/createModal.php'; 
?>



<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize tooltips
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        // Initialize DataTable with more options
        const dataTable = new DataTable("#datatable-search", {
            responsive: true,
            dom: '<"top"fl>rt<"bottom"ip><"clear">',
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search assessors...",
                lengthMenu: "Show _MENU_ entries",
                info: "Showing _START_ to _END_ of _TOTAL_ entries",
                infoEmpty: "Showing 0 to 0 of 0 entries",
                infoFiltered: "(filtered from _MAX_ total entries)",
                emptyTable: `<div class="d-flex flex-column align-items-center">
                    <i class="fas fa-folder-open text-muted mb-2" style="font-size: 2rem;"></i>
                    <h6 class="text-muted">No users found</h6>
                 </div>`,
                paginate: {
                    first: '<i class="fas fa-angle-double-left"></i>',
                    previous: '<i class="fas fa-angle-left"></i>',
                    next: '<i class="fas fa-angle-right"></i>',
                    last: '<i class="fas fa-angle-double-right"></i>'
                }
            },
            pageLength: 10,
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            columnDefs: [{
                    orderable: false,
                    targets: [5]
                }, // Disable sorting on the Actions column
                {
                    className: "text-center",
                    targets: [0, 5]
                } // Center align these columns
            ],
            order: [
                [0, 'asc']
            ] // Default sort by the first column (No.)
        });

        // Filter button functionality
        document.querySelectorAll(".filter-btn").forEach(button => {
            button.addEventListener("click", () => {
                // Remove active class from all buttons
                document.querySelectorAll('.filter-btn').forEach(btn => {
                    btn.classList.remove('active');
                });

                // Add active class to clicked button
                button.classList.add('active');

                const filterValue = button.getAttribute("data-filter");

                if (filterValue) {
                    dataTable.search(filterValue).draw();
                } else {
                    dataTable.search('').draw(); // Clear search when "All" is clicked
                }
            });
        });

        // Export to Excel functionality
        document.getElementById('export-btn').addEventListener('click', function() {
            const table = document.getElementById('datatable-search');
            const filename = 'MPQUA_Assessors_Data_' + new Date().toISOString().slice(0, 10) + '.xlsx';

            // Create a workbook with all visible data (respecting filters)
            const visibleRows = [];

            // Get headers
            const headers = [];
            table.querySelectorAll('thead th').forEach(th => {
                headers.push(th.textContent.trim());
            });
            // Add Expertise and NEC columns to headers
            headers.push('Expertise');
            headers.push('NEC');
            visibleRows.push(headers);

            // Get visible data rows
            table.querySelectorAll('tbody tr:not([style*="display: none"])').forEach(tr => {
                const rowData = [];
                tr.querySelectorAll('td').forEach((td, idx) => {
                    rowData.push(td.textContent.trim());
                });

                // Get asr_id from the details button in this row
                const detailsBtn = tr.querySelector('.btn-view-details');
                let expertise = '';
                let nec = '';
                if (detailsBtn) {
                    const asrId = detailsBtn.getAttribute('data-asr-id');
                    // Synchronous XHR is deprecated, but for export it's acceptable for small data
                    const xhr = new XMLHttpRequest();
                    xhr.open('GET', '<?= base_url('appmpqua/get_assessor/') ?>' + asrId, false);
                    xhr.send(null);
                    if (xhr.status === 200) {
                        const result = JSON.parse(xhr.responseText);
                        if (result.success) {
                            if (result.data.expertise_list && result.data.expertise_list.length > 0) {
                                expertise = result.data.expertise_list.join(', ');
                            }
                            if (result.data.nec_detail_list && result.data.nec_detail_list.length > 0) {
                                nec = result.data.nec_detail_list.map(n => n.nd_desc).join(', ');
                            }
                        }
                    }
                }
                rowData.push(expertise);
                rowData.push(nec);

                visibleRows.push(rowData);
            });

            // Create worksheet from the filtered rows
            const worksheet = XLSX.utils.aoa_to_sheet(visibleRows);

            // Create workbook and add worksheet
            const workbook = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(workbook, worksheet, "All Assessors Details");

            // Export workbook to Excel file
            XLSX.writeFile(workbook, filename);
        });

            document.querySelector("#datatable-search").addEventListener("click", function(e) {
                const target = e.target.closest(".btn-view-details");
                if (!target) return;

                const asrId = target.getAttribute("data-asr-id");
                fetch('<?= base_url('appmpqua/get_assessor/') ?>' + asrId)
                    .then(response => response.json())
                    .then(result => {
                        if (!result.success) {
                            alert('Assessor not found.');
                            return;
                        }
                        const data = result.data;

                        document.getElementById('modalUniName').innerText = data.asr_name || '';
                        document.getElementById('modalUniGender').innerText = data.asr_gender || '';
                        document.getElementById('modalUniTelephone').innerText = data.asr_phone || '';
                        document.getElementById('modalUniFax').innerText = data.asr_fax || '';
                        document.getElementById('modalUniEmail').innerText = data.asr_email || '';
                        document.getElementById('modalUniAddress').innerText = data.asr_service_address || '';
                        document.getElementById('modalUniRetirement').innerText = data.asr_retirement_date || '';
                        document.getElementById('openEditModalBtn').setAttribute('data-asr-id', data.asr_id);

                        document.getElementById('modalUniCV').innerHTML = '';
                        if (data.asr_cv_path) {
                            // Create a link to open the CV in a new tab
                            const link = document.createElement('a');
                            link.href = '<?= base_url() ?>' + data.asr_cv_path;
                            link.target = '_blank';
                            link.rel = 'noopener noreferrer';
                            link.innerText = 'View CV';
                            link.className = 'btn btn-link p-0';
                            document.getElementById('modalUniCV').appendChild(link);
                        } else {
                            document.getElementById('modalUniCV').innerText = '-';
                        }

                        // Expertise
                        const expertiseContainer = document.getElementById('modalUniExpertise');
                        expertiseContainer.innerHTML = '';
                        if (data.expertise_list && data.expertise_list.length > 0) {
                            data.expertise_list.forEach(item => {
                                const badge = document.createElement('span');
                                badge.className = 'badge bg-info text-dark me-1';
                                badge.innerText = item;
                                expertiseContainer.appendChild(badge);
                            });
                        } else {
                            expertiseContainer.innerText = '-';
                        }

                        // NEC
                        const necContainer = document.getElementById('modalUniNEC');
                        necContainer.innerHTML = '';
                        if (data.nec_detail_list && data.nec_detail_list.length > 0) {
                            data.nec_detail_list.forEach(item => {
                                const badge = document.createElement('span');
                                badge.className = 'badge bg-success text-dark me-1';
                                badge.innerText = item.nd_desc;
                                necContainer.appendChild(badge);
                            });
                        } else {
                            necContainer.innerText = '-';
                        }
                    });
            });
    });
</script>

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
