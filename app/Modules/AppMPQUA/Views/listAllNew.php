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
                <h2 class="mb-0 fs-4 fw-bold">All Assessors</h2>
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
                                    <th style="width:150px;">Institute</th>
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
                                            <td>
                                                <h6 class="mb-0 text-sm"><?= $i++ ?></h6>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-sm"><?= esc($asr->asr_name) ?></h6>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-sm" style="white-space:normal; word-break:break-word;">
                                                    <?= esc($asr->qu_code) ?>
                                                </h6>
                                            </td>
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
                                                        <i class="fas fa-eye" style="font-size: 1rem !important;"></i>
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

<!-- View Modal -->
<?php include 'ListAllModal/viewModal.php'; ?>

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
                    targets: [6]
                }, // Disable sorting on the Actions column
                {
                    className: "text-center",
                    targets: [0, 5, 6]
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

                        document.getElementById('modalName').innerText = data.asr_name || '';
                        document.getElementById('modalGender').innerText = data.asr_gender || '';
                        document.getElementById('modalTelephone').innerText = data.asr_phone || '';
                        document.getElementById('modalFax').innerText = data.asr_fax || '';
                        document.getElementById('modalEmail').innerText = data.asr_email || '';
                        document.getElementById('modalInst').innerText = data.qu_name || '';
                        document.getElementById('modalAddress').innerText = data.asr_service_address || '';
                        document.getElementById('modalRetirement').innerText = data.asr_retirement_date || '';
                        document.getElementById('modalid').innerText = data.asr_id || '';

                        // CV
                        const cvContainer = document.getElementById('modalCV');
                        cvContainer.innerHTML = '';
                        if (data.asr_cv_path) {
                            const link = document.createElement('a');
                            link.href = '<?= base_url() ?>' + data.asr_cv_path;
                            link.target = '_blank';
                            link.rel = 'noopener noreferrer';
                            // Display the icon inside a badge
                            link.innerHTML = '<span class="badge bg-secondary"><i class="fas fa-file-alt me-1"></i> Document</span>';
                            link.className = 'btn btn-link p-0';
                            cvContainer.appendChild(link);
                        } else {
                            cvContainer.innerText = '-';
                        }

                        // Expertise
                        const expertiseContainer = document.getElementById('modalExpertise');
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
                        const necContainer = document.getElementById('modalNEC');
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
