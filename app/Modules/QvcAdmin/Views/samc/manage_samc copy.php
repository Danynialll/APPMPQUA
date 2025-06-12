<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

<!-- DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

<style>
    .dataTable-wrapper .dataTable-container .table tbody tr td {
        padding: 0.25rem 1rem !important;
    }

    .dataTable-wrapper .dataTable-container .table thead tr th {
        padding: 0.75rem 1rem;
        opacity: .7;
        font-weight: bolder;
        color: #000000;
        text-transform: uppercase;
        font-size: 1rem;
        background-color: #0ea5e9;
    }

    .dataTable-wrapper .dataTable-bottom {
        padding-top: 1rem !important;
    }
</style>
<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- Card header -->
            <!-- Card Header and Controls on the Same Row -->
            <div class="card-header d-flex align-items-center justify-content-between" style="padding: 10px 20px;">
                <!-- Header Content -->
                <div>
                    <h5 class="mb-0">My SAMC</h5>
                    <p class="text-sm mb-0">
                        List of Submitted SAMC
                    </p>
                </div>

                <!-- Table Controls -->
                <div class="table-controls d-flex align-items-center" style="gap: 10px;">
                    <!-- Entries per page selector -->
                    <div id="entries-per-page">
                        <!-- This is where the entries per page selector will be added by Simple DataTables -->
                    </div>

                    <!-- Filter Buttons -->
                    <div id="status-buttons" style="display: flex; gap: 5px;">
                        <button class="filter-btn btn mb-0 p-2" style="background-color: #ffc107; color: white;" data-filter="Awaiting Assignment">
                            Awaiting Assignment
                        </button>
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
                        <button class="filter-btn btn mb-0 p-2" style="background-color: #dc3545; color: white;" data-filter="Appeal">
                            Appeal
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
                <table class="table table-flush p-1" id="datatable-search">
                    <thead class="thead-light">
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Course Name</th>
                            <th>Status</th>
                            <th>Submit Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $counter = 1;
                        foreach ($samc_info as $samc): ?>
                            <tr>
                                <td class="text-sm font-weight-normal"><?= $counter++; ?></td>
                                <td class="text-sm font-weight-normal"><?= $samc->pvd_name ?></td>
                                <td class="text-sm font-weight-normal"><?= $samc->samc_course_name ?></td>
                                <td class="text-sm font-weight-normal"><?= get_samc_admin_status_badge($samc->samc_status); ?>
                                </td>
                                <td class="text-sm font-weight-normal">
                                    <?php if (!empty($samc->samc_submit_date)): ?>
                                        <span class="badge badge-secondary pb-1">Submit Date: <?= date('d/m/Y', strtotime($samc->samc_submit_date)) ?></span><br>
                                    <?php endif; ?>
                                    <?php if (!empty($samc->samc_assigned_date)): ?>
                                        <span class="badge badge-secondary pb-1">Assigned Date: <?= date('d/m/Y', strtotime($samc->samc_submit_date)) ?></span><br>
                                    <?php endif; ?>
                                    <?php if (!empty($samc->samc_reviewed_date)): ?>
                                        <span class="badge badge-secondary pb-1">Reviewed Date: <?= date('d/m/Y', strtotime($samc->samc_reviewed_date)) ?></span><br>
                                    <?php endif; ?>
                                    <?php if (!empty($samc->samc_start_date)): ?>
                                        <span class="badge badge-secondary pb-1">Start Date: <?= $samc->samc_start_date ?></span><br>
                                    <?php endif; ?>

                                    <?php if (!empty($samc->samc_expired_date)): ?>
                                        <span class="badge badge-secondary pb-1">Expired Date: <?= $samc->samc_expired_date ?></span><br>
                                    <?php endif; ?>
                                </td>
                                <td class="text-sm font-weight-normal">
                                    <div class="btn-group">
                                        <a href="<?= base_url('qvcAdmin/getSamcData/' . $samc->samc_id) ?>"
                                            class="btn btn-primary p-2 mb-0"
                                            data-bs-toggle="tooltip"
                                            title="View SAMC Details"
                                            style="width: 35px; height: 35px;">
                                            <i class="fas fa-info-circle" style="font-size: 16px;"></i>
                                        </a>


                                        <?php if ($samc->samc_status == 'Submitted'): ?>
                                            <a href="<?= base_url('qvcAdmin/set_reviewed_samc/' . $samc->samc_id) ?>"
                                                class="btn btn-secondary p-2 mb-0" data-bs-toggle="tooltip" title="Review & Assign APP" style="width: 35px; height: 35px;">
                                                <i class="fas fa-clipboard" style="font-size: 16px;"></i>
                                            </a>
                                        <?php endif; ?>
                                        <?php if ($samc->samc_status == 'Assessment Completed'): ?>
                                            <a href="<?= base_url('qvcAdmin/set_final_reviewed_samc_id/' . $samc->samc_id) ?>"
                                                class="btn btn-info p-2 mb-0" data-bs-toggle="tooltip" title="Final Review" style="width: 35px; height: 35px;">
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


<script src="<?= base_url() ?>assets/js/plugins/datatables.js"></script>
<!-- export excel function -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
    // Export Excel
    document.getElementById('export-btn').addEventListener('click', function() {
        // Get table element
        const table = document.getElementById('datatable-search');

        // Convert HTML table to SheetJS workbook
        const workbook = XLSX.utils.table_to_book(table, {
            sheet: "Sheet 1"
        });

        // Export workbook to Excel file
        XLSX.writeFile(workbook, "table_data.xlsx");
    });
</script>

<!-- Datatable Initialization function -->
<script>
    // Initialize Simple DataTable
    const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
        searchable: true,
        fixedHeight: true,
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