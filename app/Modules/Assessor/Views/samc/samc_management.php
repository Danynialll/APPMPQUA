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
        color: white !important;
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
            <div class="card-header d-flex justify-content-between align-items-center pb-0 p-3">
                <h2 class="mb-0 fs-4 fw-bold">SAMC Management</h2>
                <div class="nav-wrapper position-relative ms-auto" style="width: auto; max-width: 500px;">
                    <ul class="nav nav-pills nav-fill p-1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-3 py-2 active" data-bs-toggle="tab" href="#cam1" role="tab" aria-controls="cam1" aria-selected="true">
                                <i class="fas fa-inbox me-2"></i>New Assignments
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-3 py-2" data-bs-toggle="tab" href="#cam2" role="tab" aria-controls="cam2" aria-selected="false">
                                <i class="fas fa-tasks me-2"></i>My SAMC Review
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body p-3 mt-2">

                <div class="tab-content" id="v-pills-tabContent">
                    <!-- Tab 1: New SAMC Assignments -->
                    <div class="tab-pane fade show position-relative active" id="cam1" role="tabpanel" aria-labelledby="cam1">
                        <div class="row">
                            <div class="col-12">
                                <div class="card bg-gradient-info shadow-sm mb-4">
                                    <div class="card-body p-3">
                                        <div class="row">
                                            <div class="col-9">
                                                <h5 class="text-white mb-1">New SAMC Assignments</h5>
                                                <p class="text-white text-sm opacity-8 mb-0">
                                                    This section shows new SAMC assignments that require your acceptance or rejection. Please respond within the given timeframe.
                                                </p>
                                            </div>
                                            <div class="col-3 text-end">
                                                <i class="fas fa-clipboard-list text-white opacity-8" style="font-size: 3rem;"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- PHP if statement for pending assignments -->
                        <?php if (!empty($pending_assignation)): ?>
                            <div class="row" id="pending-assignments">
                                <?php foreach ($pending_assignation as $pending_samc): ?>
                                    <div class="col-12">
                                        <div class="card pending-card shadow-sm mb-3">
                                            <div class="card-body p-3">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-1 col-md-2 text-center">
                                                        <div class="icon-shape bg-gradient-primary shadow text-center rounded-circle mb-3">
                                                            <i class="fas fa-file-alt text-white opacity-8" style="font-size: 1.25rem;"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7 col-md-6">
                                                        <h5 class="mb-1 fw-bold"><?= $pending_samc->samc_course_name ?? 'New SAMC Assignment' ?></h5>
                                                        <div class="d-flex align-items-center mb-2">
                                                            <span class="badge bg-gradient-primary me-2">
                                                                <i class="fas fa-calendar-alt me-1"></i>
                                                                Assigned: <?= date('d M Y', strtotime($pending_samc->samc_assigned_date)) ?>
                                                            </span>
                                                            <span class="badge bg-gradient-warning">
                                                                <i class="fas fa-hourglass-half me-1"></i>
                                                                Due: <?= add_working_days($pending_samc->samc_assigned_date, 3) ?>
                                                            </span>
                                                        </div>
                                                        <p class="text-sm text-muted mb-0">
                                                            <i class="fas fa-info-circle me-1 text-primary"></i>
                                                            Please respond before the due date. If no action is taken within this period, the system will notify the administrator for reassignment.
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 mt-3 mt-md-0 text-end">
                                                        <form method="post" action="<?= base_url('assessor/samc/accept_samc'); ?>" class="accept-form d-inline">
                                                            <?= csrf_field(); ?>
                                                            <input type="hidden" name="samc_id" value="<?= $pending_samc->samc_id; ?>">
                                                            <button class="btn bg-gradient-success action-btn" type="submit" style="font-size: 12px;">
                                                                <i class="fas fa-check-circle me-1"></i> Accept
                                                            </button>
                                                        </form>

                                                        <form method="post" action="<?= base_url('assessor/samc/reject_samc'); ?>" class="reject-form d-inline">
                                                            <?= csrf_field(); ?>
                                                            <input type="hidden" name="samc_id" value="<?= $pending_samc->samc_id; ?>">
                                                            <input type="hidden" name="reason" value=""> <!-- Hidden input for rejection reason -->
                                                            <button class="btn bg-gradient-danger action-btn" type="submit" style="font-size: 12px;">
                                                                <i class="fas fa-times-circle me-1"></i> Reject
                                                            </button>
                                                        </form>



                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body p-4 text-center">
                                            <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle mb-3 mx-auto">
                                                <i class="fas fa-check-circle text-white opacity-8" style="font-size: 1.5rem;"></i>
                                            </div>
                                            <h5 class="mb-1">No Pending Assignments</h5>
                                            <p class="text-muted mb-0">You're all caught up! There are no pending assignments at the moment.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Tab 2: My SAMC Review -->
                    <div class="tab-pane fade position-relative" id="cam2" role="tabpanel" aria-labelledby="cam2">
                        <!-- Summary Cards -->
                        <div class="row mb-4">
                            <div class="col-xl-3 col-lg-6 col-md-6 mb-3">
                                <div class="card">
                                    <div class="card-body p-3">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="numbers">
                                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Assignments</p>
                                                    <h5 class="font-weight-bolder mb-0">
                                                        <?= count($samc_info ?? []) ?>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="col-4 text-end">
                                                <div class="icon icon-shape bg-gradient-primary shadow text-center rounded-circle">
                                                    <i class="fas fa-clipboard text-white opacity-10"></i>
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
                                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">In Progress</p>
                                                    <h5 class="font-weight-bolder mb-0">
                                                        <?php
                                                        $inProgress = 0;
                                                        foreach ($samc_info ?? [] as $samc) {
                                                            if ($samc->samc_status == 'Review In Progress') $inProgress++;
                                                        }
                                                        echo $inProgress;
                                                        ?>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="col-4 text-end">
                                                <div class="icon icon-shape bg-gradient-info shadow text-center rounded-circle">
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
                                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Completed</p>
                                                    <h5 class="font-weight-bolder mb-0">
                                                        <?php
                                                        $completed = 0;
                                                        foreach ($samc_info ?? [] as $samc) {
                                                            if ($samc->samc_status == 'Reviewed' || $samc->samc_status == 'Pass' || $samc->samc_status == 'Conditional Pass') $completed++;
                                                        }
                                                        echo $completed;
                                                        ?>
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
                                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Pending</p>
                                                    <h5 class="font-weight-bolder mb-0">
                                                        <?php
                                                        $pending = 0;
                                                        foreach ($samc_info ?? [] as $samc) {
                                                            if ($samc->samc_status == 'Assign For Review') $pending++;
                                                        }
                                                        echo $pending;
                                                        ?>
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

                        <!-- Filter & Controls -->
                        <div class="card mb-4">
                            <div class="card-body p-3">
                                <div class="row align-items-center">
                                    <div class="col-lg-8 col-md-7">
                                        <div class="d-flex flex-wrap gap-2">
                                            <button class="filter-btn btn bg-gradient-secondary" data-filter="Assign For Review" style="font-size: 12px;">
                                                <i class="fas fa-list-alt me-1"></i> Assigned
                                            </button>
                                            <button class="filter-btn btn bg-gradient-info" data-filter="Review In Progress" style="font-size: 12px;">
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
                                            </button>
                                            <button class="filter-btn btn bg-gradient-dark" data-filter="" style="font-size: 12px;">
                                                <i class="fas fa-th-list me-1"></i> All
                                            </button>
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

                        <!-- SAMC Table -->
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="table-responsive">
                                    <table class="table" id="datatable-search">
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="width:60px;">No.</th>
                                                <th>Course Name</th>
                                                <th style="width:170px;">Status</th>
                                                <th style="width:200px;">Important Dates</th>
                                                <th style="width:120px;" class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $counter = 1;
                                            if (!empty($samc_info)):
                                                foreach ($samc_info as $samc): ?>
                                                    <tr>
                                                        <td class="text-center"><?= $counter++; ?></td>
                                                        <td>
                                                            <h6 class="mb-0 text-sm"><?= $samc->samc_course_name ?></h6>
                                                            <!-- <p class="text-xs text-muted mb-0">ID: <?= $samc->samc_id ?></p> -->
                                                        </td>
                                                        <td>
                                                            <?= get_samc_asr_status_badge($samc->samc_status) ?>
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
                                                                <button class="btn btn-sm bg-gradient-info action-icon" data-bs-toggle="tooltip" title="Details">
                                                                    <i class="fas fa-info-circle" style="font-size: 12px;"></i>
                                                                </button>

                                                                <?php if ($samc->samc_status != 'Assessment Completed'): ?>
                                                                    <a href="<?= base_url('assessor/samc/set_samc_id/' . $samc->samc_id) ?>" class="btn btn-sm bg-gradient-success action-icon" data-bs-toggle="tooltip" title="Review">
                                                                        <i class="fas fa-clipboard" style="font-size: 12px;"></i>
                                                                    </a>
                                                                <?php endif; ?>
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
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function() {
        // Accept button click
        jQuery('.accept-form').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission
            let form = jQuery(this);
            let formData = form.serialize(); // Serialize form data including CSRF token

            Swal.fire({
                title: 'Are you sure?',
                text: "You are about to accept the assignment and start reviewing.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, accept it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    jQuery.ajax({
                        url: form.attr('action'), // Get form action URL
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            if (response.success) {
                                Swal.fire(
                                    'Accepted!',
                                    'The SAMC has been marked as accepted.',
                                    'success'
                                ).then(() => {
                                    location.reload(); // Reload the page
                                });
                            } else {
                                Swal.fire('Error!', 'There was a problem updating the SAMC.', 'error');
                            }
                        },
                        error: function() {
                            Swal.fire('Error!', 'Something went wrong. Please try again.', 'error');
                        }
                    });
                }
            });
        });

        // Reject button click
        jQuery('.reject-form').on('submit', function(e) {
            e.preventDefault();
            let form = jQuery(this);
            let formData = form.serialize(); // Serialize form data including CSRF token

            Swal.fire({
                title: "Are you sure?",
                text: "Do you want to reject this assignment?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, Reject it",
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show input for rejection reason
                    Swal.fire({
                        title: "Reason for rejection",
                        input: "textarea",
                        inputPlaceholder: "Enter the reason for rejection here...",
                        showCancelButton: true,
                        confirmButtonText: "Submit",
                        cancelButtonText: "Cancel",
                    }).then((reasonResult) => {
                        if (reasonResult.isConfirmed) {
                            let rejectionReason = reasonResult.value;
                            form.find('input[name="reason"]').val(rejectionReason); // Set reason value

                            jQuery.ajax({
                                url: form.attr('action'), // Get form action URL
                                type: 'POST',
                                data: form.serialize(),
                                success: function(response) {
                                    if (response.success) {
                                        Swal.fire(
                                            "Rejected!",
                                            "The assignation has been rejected.",
                                            "success"
                                        ).then(() => {
                                            location.reload(); // Reload the page
                                        });
                                    } else {
                                        Swal.fire('Error!', 'There was a problem updating the SAMC.', 'error');
                                    }
                                },
                                error: function() {
                                    Swal.fire('Error!', 'Something went wrong. Please try again.', 'error');
                                }
                            });
                        }
                    });
                }
            });
        });
    });
</script>

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
                emptyTable: `<div class="d-flex flex-column align-items-center">
                    <i class="fas fa-folder-open text-muted mb-2" style="font-size: 2rem;"></i>
                    <h6 class="text-muted">No records found</h6>
                 </div>`,
                infoFiltered: "(filtered from _MAX_ total entries)",
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

<!-- <script src="<?= base_url() ?>assets/js/plugins/datatables.js"></script> -->

<script>
    // // Initialize Simple DataTable
    // const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
    //     searchable: true,
    // });

    // // Move the generated search input and entries per page selector into the correct divs
    // const entriesPerPage = document.querySelector('.dataTables_length');
    // const searchInput = document.querySelector('.dataTables_filter');

    // // Move the controls
    // if (entriesPerPage) {
    //     document.getElementById('entries-per-page').appendChild(entriesPerPage);
    // }

    // if (searchInput) {
    //     document.getElementById('datatable-search_filter').appendChild(searchInput);
    // }

    // // Add click event to filter buttons
    // document.querySelectorAll(".filter-btn").forEach(button => {
    //     button.addEventListener("click", () => {
    //         const filterValue = button.getAttribute("data-filter");

    //         // Reset all rows before applying a filter
    //         const rows = document.querySelectorAll("#datatable-search tbody tr");
    //         rows.forEach(row => {
    //             if (filterValue) {
    //                 const rowText = row.textContent || row.innerText;
    //                 row.style.display = rowText.includes(filterValue) ? '' : 'none';
    //             } else {
    //                 row.style.display = ''; // Show all rows when "All" is clicked
    //             }
    //         });
    //     });
    // });
</script>