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
    /* Global Styles */
    :root {
        --primary-color: #1e40af;
        --secondary-color: #f8fafc;
        --accent-color: #0284c7;
        --text-color: #334155;
        --border-radius: 8px;
        --box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

    /* Status Badges */
    .badge {
        padding: 6px 10px;
        font-weight: 500;
        font-size: 0.75rem;
    }
</style>

<div class="container-fluid py-4">
    <div class="row">
        <div class="card">
            <!-- Card header -->
            <div class="card-header pb-0 p-3">
                <h2 class="mb-0 fs-4 fw-bold">SAMC Management Dashboard</h2>
                <p>Comprehensive view of all submitted Self-Assessment and Monitoring Checks</p>
            </div>
            <div class="card-body p-3 mt-2">

                <!-- Filter & Controls -->
                <div class="card mb-4">
                    <div class="card-body p-3">
                        <div class="row align-items-center">
                            <div class="col-lg-8 col-md-7">
                                <div class="d-flex flex-wrap gap-2">
                                    <button class="filter-btn btn bg-gradient-warning" data-filter="Pending Payment" style="font-size: 12px;">
                                        <i class="fas fa-spinner me-1"></i> Pending Payment
                                    </button>
                                    <button class="filter-btn btn bg-gradient-success" data-filter="Awaiting Reviewer Assignment" style="font-size: 12px;">
                                        <i class="fas fa-award me-1"></i> Awaiting Reviewer Assignment

                                    </button>
                                    <button class="filter-btn btn bg-gradient-dark" data-filter="" style="font-size: 12px;">
                                        <i class="fas fa-th-list me-1"></i> All
                                    </button>

                                    <!-- <button class="filter-btn btn bg-gradient-info" data-filter="Review In Progress" style="font-size: 12px;">
                                        <i class="fas fa-spinner me-1"></i> In Progress
                                    </button>
                                    <button class="filter-btn btn bg-gradient-primary" data-filter="Reviewed" style="font-size: 12px;">
                                        <i class="fas fa-check-circle me-1"></i> Reviewed
                                    </button>
                                    <button class="filter-btn btn bg-gradient-success" data-filter="Pass" style="font-size: 12px;">
                                        <i class="fas fa-award me-1"></i> Pass
                                    </button>
                                    <button class="filter-btn btn bg-gradient-warning" data-filter="Conditional Pass" style="font-size: 12px;">
                                        <i class="fas fa-clipboard-check me-1"></i> Conditional
                                    </button>-->
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-5 mt-3 mt-md-0">
                                <div class="d-flex align-items-center justify-content-md-end">
                                    <button id="export-btn" class="btn bg-gradient-success me-2" style="font-size: 12px;">
                                        Export
                                    </button>
                                    <div id="datatable-search_filter">
                                        <!-- Search input will be placed here -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table class="table" id="datatable-search">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Provider Name</th>
                                        <th>Course Title</th>
                                        <th>Status</th>
                                        <th>Timeline</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $counter = 1;
                                    foreach ($samc_info as $samc): ?>
                                        <tr>
                                            <td class="text-center"><?= $counter++; ?></td>
                                            <td><?= $samc->pvd_name ?></td>
                                            <td><?= $samc->samc_course_name ?></td>
                                            <td>
                                                <?= get_samc_admin_status_badge($samc->samc_status) ?>
                                            </td>
                                            <td>
                                                <div class="date-container">
                                                    <?php if (!empty($samc->samc_submit_date)): ?>
                                                        <span class="badge bg-light text-dark">
                                                            <i class="fas fa-paper-plane text-primary me-1"></i>
                                                            Submitted: <?= date('d M Y', strtotime($samc->samc_submit_date)) ?>
                                                        </span>
                                                    <?php endif; ?>

                                                    <?php if (!empty($samc->samc_assigned_date)): ?>
                                                        <span class="badge bg-light text-dark">
                                                            <i class="fas fa-user-check text-info me-1"></i>
                                                            Assigned: <?= date('d M Y', strtotime($samc->samc_assigned_date)) ?>
                                                        </span>
                                                    <?php endif; ?>

                                                    <?php if (!empty($samc->samc_reviewed_date)): ?>
                                                        <span class="badge bg-light text-dark">
                                                            <i class="fas fa-clipboard-check text-success me-1"></i>
                                                            Reviewed: <?= date('d M Y', strtotime($samc->samc_reviewed_date)) ?>
                                                        </span>
                                                    <?php endif; ?>

                                                    <?php if (!empty($samc->samc_expired_date)): ?>
                                                        <span class="badge bg-light text-dark">
                                                            <i class="fas fa-calendar-times text-danger me-1"></i>
                                                            Expires: <?= date('d M Y', strtotime($samc->samc_expired_date)) ?>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="action-container justify-content-center">
                                                    <a href="<?= base_url('qvcAdmin/getSamcData/' . $samc->samc_id) ?>"
                                                        class="btn btn-sm bg-gradient-info action-icon" style="background-color: #3b82f6; color: white;"
                                                        data-bs-toggle="tooltip"
                                                        title="View SAMC Details">
                                                        <i class="fas fa-info-circle" style="font-size: 12px;"></i>
                                                    </a>

                                                    <?php if ($samc->samc_status == 'PAID' || $samc->samc_status == 'AWAITING_REVIEWER_ASSIGNMENT'): ?>
                                                        <a href="<?= base_url('qvcAdmin/set_reviewed_samc/' . $samc->samc_id) ?>"
                                                            class="btn btn-sm bg-gradient-success action-icon" style="background-color: #6b7280; color: white;"
                                                            data-bs-toggle="tooltip"
                                                            title="Review & Assign APP">
                                                            <i class="fas fa-clipboard" style="font-size: 12px;"></i>
                                                        </a>
                                                    <?php endif; ?>

                                                    <?php if ($samc->samc_status == 'Assessment Completed'): ?>
                                                        <a href="<?= base_url('qvcAdmin/set_final_reviewed_samc_id/' . $samc->samc_id) ?>"
                                                            class="btn btn-sm bg-gradient-primary action-icon" style="background-color: #0ea5e9; color: white;"
                                                            data-bs-toggle="tooltip"
                                                            title="Final Review">
                                                            <i class="fas fa-check-double" style="font-size: 12px;"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

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
                searchPlaceholder: "Search records...",
                lengthMenu: "Show _MENU_ entries",
                info: "Showing _START_ to _END_ of _TOTAL_ entries",
                infoEmpty: "Showing 0 to 0 of 0 entries",
                infoFiltered: "(filtered from _MAX_ total entries)",
                emptyTable: `<div class="d-flex flex-column align-items-center">
                    <i class="fas fa-folder-open text-muted mb-2" style="font-size: 2rem;"></i>
                    <h6 class="text-muted">No records found</h6>
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
                    targets: [0, 3, 5]
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
            const filename = 'SAMC_Data_' + new Date().toISOString().slice(0, 10) + '.xlsx';

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
                tr.querySelectorAll('td').forEach(td => {
                    // Get text content only, strip HTML
                    rowData.push(td.textContent.trim());
                });
                visibleRows.push(rowData);
            });

            // Create worksheet from the filtered rows
            const worksheet = XLSX.utils.aoa_to_sheet(visibleRows);

            // Create workbook and add worksheet
            const workbook = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(workbook, worksheet, "SAMC Records");

            // Export workbook to Excel file
            XLSX.writeFile(workbook, filename);
        });
    });
</script>