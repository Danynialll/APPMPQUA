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
                <h2 class="mb-0 fs-4 fw-bold">Invoice Management</h2>
            </div>
            <div class="card-body p-0 mt-4">
                <div class="row mb-0">
                    <div class="col-xl-3 col-lg-6 col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Pending Checking</p>
                                            <h5 class="font-weight-bolder mb-0">

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
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Paid</p>
                                            <h5 class="font-weight-bolder mb-0">

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
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Rejected</p>
                                            <h5 class="font-weight-bolder mb-0">

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
                                <button class="filter-btn btn bg-gradient-secondary" data-filter="Invoice" style="font-size: 12px;">
                                    <i class="fas fa-list-alt me-1"></i> Invoice
                                </button>
                                <button class="filter-btn btn bg-gradient-warning" data-filter="FPX" style="font-size: 12px;">
                                    <i class="fas fa-spinner me-1"></i> FPX
                                </button>
                                <button class="filter-btn btn bg-gradient-dark" data-filter="" style="font-size: 12px;">
                                    <i class="fas fa-th-list me-1"></i> All
                                </button>
                                <button id="export-btn" class="btn bg-gradient-success me-2" style="font-size: 12px;">
                                    Export
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-5 mt-3 mt-md-0">
                            <div class="d-flex align-items-center justify-content-md-end">
                                <a href="<?= base_url('provider/samc/new_samc') ?>" class="btn bg-gradient-success me-2" style="font-size: 12px;">
                                    <i class="fas fa-credit-card"></i> New SAMC
                                </a>
                                <a href="<?= base_url('provider/payment/checkout') ?>" class="btn bg-gradient-success me-2" style="font-size: 12px;">
                                    <i class="fas fa-credit-card"></i> Make Payment
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SAMC Table -->
            <div class="card mb-3">
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table" id="datatable-search">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width:60px;">Invoice No.</th>
                                    <th>Amount (RM)</th>
                                    <th>Invoice Date</th>
                                    <th>Last Payment Date</th>
                                    <th style="width:170px;">Payment Method</th>
                                    <th style="width:170px;">Status</th>
                                    <th style="width:120px;" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $counter = 1;
                                if (!empty($invoice_info)):
                                    foreach ($invoice_info as $invoice): ?>
                                        <tr>
                                            <td>
                                                <h6 class="mb-0 text-sm"><?= $invoice->sp_invoice_number ?></h6>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-sm"><?= $invoice->sp_amount ?></h6>
                                            </td>
                                            <td>
                                                <span class="badge bg-light text-dark">
                                                    <i class="fas fa-check-circle text-primary me-1"></i>
                                                    <?= date('d/m/Y', strtotime($invoice->sp_created_at)) ?>
                                                </span>
                                            </td>
                                            <td>
                                                <?php
                                                $tarikh_invois = new DateTime($invoice->sp_created_at); // Convert the string to DateTime
                                                $tarikh_akhir = clone $tarikh_invois; // Clone it if it's a DateTime object
                                                $tarikh_akhir->modify('+30 days');
                                                ?>
                                                <span class="badge bg-light text-dark">
                                                    <i class="fas fa-calendar-times text-danger me-1"></i>
                                                    <?= $tarikh_akhir->format('d/m/Y') ?>
                                                </span>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-sm"><?= $invoice->sp_method ?></h6>
                                            </td>
                                            <td>
                                                <?= get_samc_admin_status_badge($invoice->sp_status) ?>
                                            </td>

                                            <!-- Replace the existing action buttons section with this updated code -->
                                            <td class="text-center">
                                                <div class="action-container justify-content-center">
                                                    <!-- check type -->
                                                    <?php if ($invoice->sp_method == 'INVOICE') : ?>
                                                        <!-- Display Invoice -->
                                                        <a href="<?= base_url('qvcAdmin/invoice/fetch_invoice_details/' . $invoice->sp_invoice_number) ?>"
                                                            class="btn btn-sm bg-gradient-info action-icon"
                                                            data-bs-toggle="tooltip" title="Invoice Details">
                                                            <i class="fas fa-info-circle" style="font-size: 12px;"></i>
                                                        </a>
                                                    <?php elseif ($invoice->sp_method == 'FPX') : ?>
                                                        <!-- Display Payment Prove -->
                                                        <a href="<?= base_url('provider/payment/checkout') ?>"
                                                            class="btn btn-sm bg-gradient-info action-icon"
                                                            data-bs-toggle="tooltip" title="Details">
                                                            <i class="fas fa-info-circle" style="font-size: 12px;"></i>
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

<!-- Upload Payment Proof Modal -->
<div class="modal fade" id="uploadProofModal" tabindex="-1" aria-labelledby="uploadProofModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadProofModalLabel">Upload Payment Proof</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="uploadProofForm" method="post" action="<?= base_url('provider/payment/upload_proof') ?>" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <input type="hidden" name="invoice_number" id="invoice_number" value="">

                    <div class="mb-3">
                        <label for="payment_date" class="form-label">Payment Date</label>
                        <input type="date" class="form-control" id="payment_date" name="payment_date" required>
                    </div>

                    <div class="mb-3">
                        <label for="payment_reference" class="form-label">Payment Reference/Transaction ID</label>
                        <input type="text" class="form-control" id="payment_reference" name="payment_reference" placeholder="Enter transaction reference number" required>
                    </div>

                    <div class="mb-3">
                        <label for="payment_proof" class="form-label">Upload Proof</label>
                        <input type="file" class="form-control" id="payment_proof" name="payment_proof" accept="image/png, image/jpeg, image/jpg, application/pdf" required>
                        <div class="form-text">Accepted formats: JPG, PNG, PDF (Max 2MB)</div>
                    </div>

                    <div class="mb-3">
                        <label for="payment_notes" class="form-label">Additional Notes (Optional)</label>
                        <textarea class="form-control" id="payment_notes" name="payment_notes" rows="3" placeholder="Any additional information about this payment"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit Proof</button>
                </div>
            </form>
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

<!-- Upload Payment Proof Function -->
<script>
    // Add this script at the end of your file, inside the document.addEventListener section
    // or add it to your existing script block

    document.addEventListener("DOMContentLoaded", function() {
        // Upload Payment Proof functionality
        document.querySelectorAll('.upload-proof-btn').forEach(button => {
            button.addEventListener('click', function() {
                const invoiceId = this.getAttribute('data-invoice-id');
                document.getElementById('invoice_number').value = invoiceId;

                // Set default date to today
                const today = new Date().toISOString().split('T')[0];
                document.getElementById('payment_date').value = today;
            });
        });

        // Form validation and submission
        document.getElementById('uploadProofForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Basic validation
            const fileInput = document.getElementById('payment_proof');
            const maxSize = 2 * 1024 * 1024; // 2MB

            if (fileInput.files[0] && fileInput.files[0].size > maxSize) {
                Swal.fire({
                    icon: 'error',
                    title: 'File too large',
                    text: 'Please upload a file smaller than 2MB'
                });
                return false;
            }

            // Use FormData to handle file uploads
            const formData = new FormData(this);

            // Show loading state
            Swal.fire({
                title: 'Uploading...',
                text: 'Please wait while we upload your payment proof',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            // Submit the form via AJAX
            fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Payment Proof Uploaded',
                            text: 'Your payment proof has been successfully submitted',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            // Close modal and reload page
                            bootstrap.Modal.getInstance(document.getElementById('uploadProofModal')).hide();
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Upload Failed',
                            text: data.message || 'There was a problem uploading your payment proof'
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Upload Error',
                        text: 'There was a problem connecting to the server'
                    });
                    console.error('Error:', error);
                });
        });
    });
</script>