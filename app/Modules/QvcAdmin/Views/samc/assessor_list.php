<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

<!-- DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>

<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <!-- Card header -->
            <!-- Card Header and Controls on the Same Row -->
            <div class="card-header d-flex align-items-center justify-content-between" style="padding: 10px 20px;">
                <!-- Header Content -->
                <div>
                    <h5 class="mb-0">Assessors List</h5>
                    <p class="text-sm mb-0">
                        List of Assessor that have been registered with QVC UPSI
                    </p>
                </div>

                <!-- Table Controls -->
                <div class="table-controls d-flex align-items-center" style="gap: 10px;">
                    <!-- Entries per page selector -->
                    <div id="entries-per-page">
                        <!-- This is where the entries per page selector will be added by Simple DataTables -->
                    </div>

                    <!-- Filter Buttons -->
                    <!-- <div id="status-buttons" style="display: flex; gap: 5px;">
                        <button class="filter-btn btn btn-primary mb-0 p-2" data-filter="Awaiting Assignment">Awaiting Assignment</button>
                        <button class="filter-btn btn btn-secondary mb-0 p-2" data-filter="Assign For Review">Assign For Review</button>
                        <button class="filter-btn btn btn-success mb-0 p-2" data-filter="Review In Progress">Review In Progress</button>
                        <button class="filter-btn btn btn-success mb-0 p-2" data-filter="Reassigned Needed">Reassigned Needed</button>
                        <button class="filter-btn btn btn-info mb-0 p-2" data-filter="Reviewed">Reviewed</button>
                        <button class="filter-btn btn btn-info mb-0 p-2" data-filter="Pass">Pass</button>
                        <button class="filter-btn btn btn-info mb-0 p-2" data-filter="Conditional Pass">Conditional Pass</button>
                        <button class="filter-btn btn btn-info mb-0 p-2" data-filter="Appeal">Appeal</button>
                        <button class="filter-btn btn btn-dark mb-0 p-2" data-filter="">All</button>
                    </div> -->

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
                            <th>Name</th>
                            <th>Field</th>
                            <th>Contact</th>
                            <th>Verify Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($assessor_info as $assessor): ?>
                            <tr>
                                <td><?= esc($assessor->asr_name); ?></td>
                                <td>
                                    <?php if (!empty($assessor->expertise)): ?>
                                        <ul>
                                            <?php foreach ($assessor->expertise as $exp): ?>
                                                <li><?= esc($exp->aef_desc); ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php else: ?>
                                        <p>No expertise listed.</p>
                                    <?php endif; ?>
                                </td>
                                <td><?= esc($assessor->asr_phone); ?></td>
                                <td>
                                    <?= $assessor->asr_verified === 'f' ? '<span class="badge badge-secondary">Not Verified</span>' : '<span class="badge badge-success">Verified</span>'; ?>
                                </td>
                                <td class="text-sm font-weight-normal">
                                    <button type="button" class="btn btn-link p-0" title="View More"><i class="fas fa-eye"></i></button>
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