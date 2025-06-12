<!-- FontAwesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header d-flex pb-0 p-3">
                <h2 class="mb-0">SAMC MANAGEMENT</h2>
                <div class="nav-wrapper position-relative ms-auto w-50">
                    <ul class="nav nav-pills nav-fill p-1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#cam1" role="tab" aria-controls="cam1" aria-selected="true">
                                New SAMC
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#cam2" role="tab" aria-controls="cam2" aria-selected="false">
                                My SAMC Review
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body p-3 mt-2">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show position-relative active border-radius-lg" id="cam1" role="tabpanel" aria-labelledby="cam1">


                        <?php if (!empty($pending_assignation)): ?>
                            <?php foreach ($pending_assignation as $pending_samc): ?>

                                <div class="card mt-4 bg-white text-dark shadow-sm rounded">
                                    <div class="p-4 d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-start">
                                            <!-- Icon on the left -->
                                            <div class="me-3 text-primary">
                                                <svg class="text-dark mt-3" width="50px" height="50px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <g id="Rounded-Icons" transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                            <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                                                                <g id="box-3d-50" transform="translate(603.000000, 0.000000)">
                                                                    <path class="color-background" d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z" id="Path"></path>
                                                                    <path class="color-background" d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z" id="Path" opacity="0.7"></path>
                                                                    <path class="color-background" d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z" id="Path" opacity="0.7"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <!-- Title and description -->
                                            <div>
                                                <h5 class="mb-1 d-flex align-items-center">
                                                    New SAMC Assigned By Admin
                                                </h5>
                                                <p class="text-sm text-muted mb-0">
                                                    <i class="fas fa-info-circle me-1"></i>
                                                    Please respond before <b><span class="badge bg-primary"><?= add_working_days($pending_samc->samc_assigned_date, 3); ?></span></b>
                                                    . If no action is taken within this period, the system will automatically notify the administrator, who may reassign the task to another reviewer.
                                                </p>
                                            </div>
                                        </div>
                                        <!-- Buttons -->
                                        <div class="col-lg-4 col-sm-6 col-12 d-flex align-items-center justify-content-end">
                                            <button class="btn btn-sm bg-primary text-white w-25 mb-0 me-2 d-flex align-items-center justify-content-center"
                                                type="button"
                                                id="acceptBtn"
                                                data-samc-id="<?= $pending_samc->samc_id; ?>">
                                                <i class="fas fa-check-circle me-2" style="font-size:16px;"></i> Accept
                                            </button>
                                            <button
                                                class="btn btn-sm bg-danger text-white w-25 mb-0 d-flex align-items-center justify-content-center"
                                                type="button"
                                                id="rejectBtn"
                                                data-samc-id="<?= $pending_samc->samc_id; ?>">
                                                <i class="fas fa-times-circle me-2" style="font-size:16px;"></i> Reject
                                            </button>
                                        </div>

                                    </div>
                                </div>

                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="card">
                                <div class="card-body border-radius-lg bg-gradient-dark p-3 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h5 class="mb-0 text-white">
                                            No Assignation Yet
                                        </h5>
                                        <p class="text-white text-sm mb-3">
                                            There are no pending assignments at the moment.
                                        </p>
                                    </div>
                                    <i class="fas fa-thumbs-up text-white fs-2"></i> <!-- Thumbs-up icon -->
                                </div>
                            </div>

                        <?php endif; ?>
                    </div>
                    <div class="tab-pane fade position-relative border-radius-lg" id="cam2" role="tabpanel" aria-labelledby="cam2">

                        <!-- Card header -->
                        <!-- Card Header and Controls on the Same Row -->
                        <div class="card-header d-flex align-items-center justify-content-between" style="padding: 10px 20px;">
                            <!-- Table Controls -->
                            <div class="table-controls d-flex align-items-center" style="gap: 10px;">
                                <!-- Filter Buttons -->
                                <div id="status-buttons" style="display: flex; gap: 5px;">
                                    <button class="filter-btn btn mb-0 p-2" style="background-color: #6c757d; color: white;" data-filter="Assign For Review">
                                        Assign For Review
                                    </button>
                                    <button class="filter-btn btn mb-0 p-2" style="background-color: #17a2b8; color: white;" data-filter="Review In Progress">
                                        Review In Progress
                                    </button>
                                    <button class="filter-btn btn mb-0 p-2" style="background-color: #28a745; color: white;" data-filter="Reviewed">
                                        Reviewed
                                    </button>
                                    <button class="filter-btn btn mb-0 p-2" style="background-color: #20c997; color: white;" data-filter="Pass">
                                        Pass
                                    </button>
                                    <button class="filter-btn btn mb-0 p-2" style="background-color: #fd7e14; color: white;" data-filter="Conditional Pass">
                                        Conditional Pass
                                    </button>
                                    <button class="filter-btn btn mb-0 p-2" style="background-color: #343a40; color: white;" data-filter="">
                                        All
                                    </button>
                                    <button id="export-btn" class="filter-btn btn mb-0 p-2">Export to Excel</button>

                                </div>


                                <!-- Search input -->
                                <div id="datatable-search_filter" style="margin-left: 10px;">
                                    <!-- This is where the search input will be added by Simple DataTables -->
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-flush" id="datatable-search">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="width:50px;">No.</th>
                                        <th>Course Name</th>
                                        <th style="width:100px;">Proforma</th>
                                        <th style="width:200px;">Status</th>
                                        <th style="width:200px;">Important Date</th>
                                        <th style="width:200px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $counter = 1;
                                    foreach ($samc_info as $samc): ?>
                                        <tr>
                                            <td class="text-sm font-weight-normal"><?= $counter++; ?></td>
                                            <td class="text-sm font-weight-normal"><?= $samc->samc_course_name ?></td>
                                            <td class="text-sm font-weight-normal">
                                                <a href="<?= base_url($samc->samc_proforma) ?>" class="btn badge-info p-2 m-0" target="_blank">
                                                    <i class="fas fa-file-pdf"></i> Proforma
                                                </a>
                                            </td>
                                            <td class="text-sm font-weight-normal"><?= get_samc_asr_status_badge($samc->samc_status); ?>
                                            </td>
                                            <td class="text-sm font-weight-normal">
                                                <?php if (!empty($samc->samc_submit_date)): ?>
                                                    <span class="badge badge-info">Submit Date: <?= date('d/m/Y', strtotime($samc->samc_submit_date)) ?></span><br>
                                                <?php endif; ?>
                                                <?php if (!empty($samc->samc_assigned_date)): ?>
                                                    <span class="badge badge-info">Assigned Date: <?= date('d/m/Y', strtotime($samc->samc_submit_date)) ?></span><br>
                                                <?php endif; ?>
                                                <?php if (!empty($samc->samc_reviewed_date)): ?>
                                                    <span class="badge badge-info">Reviewed Date: <?= date('d/m/Y', strtotime($samc->samc_reviewed_date)) ?></span><br>
                                                <?php endif; ?>
                                                <?php if (!empty($samc->samc_start_date)): ?>
                                                    <span class="badge badge-info">Start Date: <?= $samc->samc_start_date ?></span><br>
                                                <?php endif; ?>

                                                <?php if (!empty($samc->samc_expired_date)): ?>
                                                    <span class="badge badge-info">Expired Date: <?= $samc->samc_expired_date ?></span><br>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-sm font-weight-normal">
                                                <div class="btn-group">
                                                    <button class="btn btn-primary p-1" data-bs-toggle="tooltip" title="Details" style="width: 35px; height: 35px;">
                                                        <i class="fas fa-info-circle" style="font-size: 16px;"></i>
                                                    </button>
                                                    <?php if ($samc->samc_status != 'Assessment Completed'): ?>
                                                        <a href="<?= base_url('assessor/set_samc_id/' . $samc->samc_id) ?>" class="btn btn-success p-2" data-bs-toggle="tooltip" title="Review" style="width: 35px; height: 35px;">
                                                            <i class="fas fa-clipboard" style="font-size: 16px;"></i>
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
    jQuery(document).ready(function() {
        // Accept button click
        jQuery('#acceptBtn').on('click', function() {
            var samcId = jQuery(this).data('samc-id'); // Get the SAMC ID

            // Show SweetAlert confirmation
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
                    // Proceed with the update via Ajax
                    jQuery.ajax({
                        url: '<?= base_url('assessor/accept_samc'); ?>', // Update with the correct URL
                        type: 'POST',
                        data: {
                            samc_id: samcId
                        },
                        success: function(response) {
                            // Check response
                            if (response.success) {
                                Swal.fire(
                                    'Accepted!',
                                    'The SAMC has been marked as accepted.',
                                    'success'
                                ).then(() => {
                                    location.reload(); // Reload the page to see the updated status
                                });
                            } else {
                                Swal.fire(
                                    'Error!',
                                    'There was a problem updating the SAMC.',
                                    'error'
                                );
                            }
                        },
                        error: function() {
                            Swal.fire(
                                'Error!',
                                'Something went wrong. Please try again.',
                                'error'
                            );
                        }
                    });
                }
            });
        });

        jQuery('#rejectBtn').on('click', function() {
            let samcId = jQuery(this).data("samc-id");

            Swal.fire({
                title: "Are you sure?",
                text: "Do you want to reject this assignation?",
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

                            // Send the rejection data to the server
                            jQuery.ajax({
                                url: "<?= site_url('assessor/rejectSamc') ?>",
                                method: "POST",
                                data: {
                                    samc_id: samcId,
                                    reason: rejectionReason,
                                },
                                success: function(response) {
                                    // Check response
                                    if (response.success) {
                                        Swal.fire(
                                            "Rejected!",
                                            "The assignation has been rejected.",
                                            "success"
                                        ).then(() => {
                                            location.reload(); // Reload the page to see the updated status
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

<script src="<?= base_url() ?>assets/js/plugins/datatables.js"></script>

<script>
    // Initialize Simple DataTable
    const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
        searchable: true,
    });

    // Move the generated search input and entries per page selector into the correct divs
    const entriesPerPage = document.querySelector('.dataTables_length');
    const searchInput = document.querySelector('.dataTables_filter');

    // Move the controls
    if (entriesPerPage) {
        document.getElementById('entries-per-page').appendChild(entriesPerPage);
    }

    if (searchInput) {
        document.getElementById('datatable-search_filter').appendChild(searchInput);
    }

    // Add click event to filter buttons
    document.querySelectorAll(".filter-btn").forEach(button => {
        button.addEventListener("click", () => {
            const filterValue = button.getAttribute("data-filter");

            // Reset all rows before applying a filter
            const rows = document.querySelectorAll("#datatable-search tbody tr");
            rows.forEach(row => {
                if (filterValue) {
                    const rowText = row.textContent || row.innerText;
                    row.style.display = rowText.includes(filterValue) ? '' : 'none';
                } else {
                    row.style.display = ''; // Show all rows when "All" is clicked
                }
            });
        });
    });
</script>