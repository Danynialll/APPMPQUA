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
                <h2 class="mb-0 fs-4 fw-bold">MPQUA Users</h2>
            </div>
            <div class="card-body p-0 mt-4">
                <div class="row mb-0">
                    <div class="col-xl-3 col-lg-6 col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Registered MPQUA Users</p>
                                            <h5 class="font-weight-bolder mb-0">
                                                <?= esc($total_users) ?>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-gradient-success shadow text-center rounded-circle">
                                            <i class="fas fa-check text-white opacity-10"></i>
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
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Assessors</p>
                                            <h5 class="font-weight-bolder mb-0">
                                                <?= esc($total_assessors) ?>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-gradient-info shadow text-center rounded-circle">
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
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Dummy #1</p>
                                            <h5 class="font-weight-bolder mb-0">

                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow text-center rounded-circle">
                                            <i class="fas fa-sync-alt text-white opacity-10"></i>
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
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Dummy #2</p>
                                            <h5 class="font-weight-bolder mb-0">

                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-gradient-warning shadow text-center rounded-circle">
                                            <i class="fas fa-hourglass-half text-white opacity-10"></i>
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
                                <button class="btn bg-gradient-primary me-2" style="font-size: 12px;" data-bs-toggle="modal" data-bs-target="#addMPQModal">
                                    <i class="fas fa-plus"></i>&nbsp; ADD USER
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
                                    <th>Institute</th>
                                    <th>Code</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Total Assessors</th>
                                    <th style="width:120px;" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($mpqua_count)):
                                    $i = 1; foreach ($mpqua_count as $mpqua): ?>
                                        <tr data-au-id="<?= esc($mpqua['au_id']) ?>">
                                            <td>
                                                <h6 class="mb-0 text-sm"><?= $i++ ?></h6>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-sm"><?= esc($mpqua['qu_name']) ?></h6>
                                            </td>
                                            <td>
                                                <span class="badge bg-light text-dark">
                                                    <?= esc($mpqua['qu_code']) ?>
                                                </span>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-sm"><?= esc($mpqua['au_username']) ?></h6>
                                            </td>
                                            <td>
                                                <span class="password-mask" style="letter-spacing:2px;">••••••••</span>
                                                <span class="real-password d-none"><?= esc($mpqua['au_plain_password']) ?></span>
                                                <button type="button" class="btn btn-link btn-sm btn-toggle-password" tabindex="-1">
                                                    <i class="fas fa-eye" style="font-size: 1rem !important;"></i>&nbsp;
                                                </button>
                                            </td>
                                            <td>
                                                <span class="badge bg-info text-white">
                                                    <i class="fas fa-user"></i>&nbsp;
                                                    <?= esc($mpqua['assessor_count']) ?>
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <div class="action-container">
                                                    <button class="btn btn-warning btn-sm btn-edit-mpq" data-bs-toggle="modal" data-bs-target="#editMPQModal" data-au-id="<?= esc($mpqua['au_id']) ?>">
                                                        <i class="fas fa-pencil"></i>&nbsp; Edit
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

<!-- Edit Modal -->
<?php include 'actions/editModal.php'; ?>
<!-- Add Modal -->
 <?php include 'actions/addModal.php'; ?>

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
                searchPlaceholder: "Search users...",
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
                    targets: [4]
                }, // Disable sorting on the Actions column
                {
                    className: "text-center",
                    targets: [0, 3, 4]
                } // Center align these columns
            ],
            order: [
                [1, 'asc']
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
            const filename = 'MPQUA_User_Data_' + new Date().toISOString().slice(0, 10) + '.xlsx';

            // Create a workbook with all visible data (respecting filters)
            const visibleRows = [];

            // Get headers
            const headers = [];
            table.querySelectorAll('thead th').forEach(th => {
                headers.push(th.textContent.trim());
            });
            visibleRows.push(headers);

            // Get visible data rows
            table.querySelectorAll('tbody tr:not([style*="display: none"])').forEach(tr => {
                const rowData = [];
                tr.querySelectorAll('td').forEach((td, idx) => {
                    // If this is the password column (adjust index as needed, here 4th column = idx 4)
                    if (idx === 4) {
                        const realPwd = td.querySelector('.real-password');
                        rowData.push(realPwd ? realPwd.textContent.trim() : '');
                    } else {
                        rowData.push(td.textContent.trim());
                    }
                });
                visibleRows.push(rowData);
            });

            // Create worksheet from the filtered rows
            const worksheet = XLSX.utils.aoa_to_sheet(visibleRows);

            // Create workbook and add worksheet
            const workbook = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(workbook, worksheet, "User Details");

            // Export workbook to Excel file
            XLSX.writeFile(workbook, filename);
        });

        document.querySelectorAll('.btn-edit-mpq').forEach(btn => {
            btn.addEventListener('click', function () {
                const row = btn.closest('tr');
                const auId = row.getAttribute('data-au-id');
                const username = row.querySelector('td:nth-child(4)').innerText.trim();

                document.getElementById('editUserId').value = auId;
                document.getElementById('editUsername').value = username;
            });
        });

    });
</script>

<!-- Upload Payment Proof Function -->
<script>
    // Add this script at the end of your file, inside the document.addEventListener section
    // or add it to your existing script block

    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.btn-toggle-password').forEach(btn => {
            btn.addEventListener('click', function() {
                const td = btn.closest('td');
                const mask = td.querySelector('.password-mask');
                const real = td.querySelector('.real-password');
                if (real.classList.contains('d-none')) {
                    real.classList.remove('d-none');
                    mask.classList.add('d-none');
                    btn.querySelector('i').classList.remove('fa-eye');
                    btn.querySelector('i').classList.add('fa-eye-slash');
                } else {
                    real.classList.add('d-none');
                    mask.classList.remove('d-none');
                    btn.querySelector('i').classList.remove('fa-eye-slash');
                    btn.querySelector('i').classList.add('fa-eye');
                }
            });
        });

    });
</script>