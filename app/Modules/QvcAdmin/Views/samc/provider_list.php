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

<div class="row mt-4">
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
                        <button class="filter-btn btn mb-0 p-2" style="background-color: #17a2b8; color: white;" data-filter="Awaiting Verification">
                            Awaiting Verification
                        </button>
                        <button class="filter-btn btn mb-0 p-2" style="background-color: #28a745; color: white;" data-filter="Verified">
                            Verified
                        </button>
                        <button class="filter-btn btn mb-0 p-2" style="background-color: #dc3545; color: white;" data-filter="Rejected">
                            Rejected
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
                            <th>Name</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-sm font-weight-normal">Universiti Pendidikan Sultan Idris</td>
                            <td class="text-sm font-weight-normal">Government</td>
                            <td class="text-sm font-weight-normal"><span style="background-color: #4CAF50; color: white; padding: 3px 6px;">Verified</span></td>
                            <td class="text-sm font-weight-normal">2011/04/25</td>
                            <td class="text-sm font-weight-normal">
                                <div class="btn-group">
                                    <button class="btn btn-primary p-1" data-bs-toggle="tooltip" title="Details" style="width: 35px; height: 35px;">
                                        <i class="fas fa-info-circle" style="font-size: 16px;"></i>
                                    </button>
                                    <button class="btn btn-secondary p-1" data-bs-toggle="tooltip" title="Change Status" style="width: 35px; height: 35px;">
                                        <i class="fas fa-edit" style="font-size: 16px;"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-sm font-weight-normal">Universiti Teknologi Malaysia</td>
                            <td class="text-sm font-weight-normal">Private</td>
                            <td class="text-sm font-weight-normal"><span style="background-color: #FFC107; color: white; padding: 3px 6px;">Pending</span></td>
                            <td class="text-sm font-weight-normal">2022/06/18</td>
                            <td class="text-sm font-weight-normal">
                                <div class="btn-group">
                                    <button class="btn btn-primary p-1" data-bs-toggle="tooltip" title="Details" style="width: 35px; height: 35px;">
                                        <i class="fas fa-info-circle" style="font-size: 16px;"></i>
                                    </button>
                                    <button class="btn btn-secondary p-1" data-bs-toggle="tooltip" title="Change Status" style="width: 35px; height: 35px;">
                                        <i class="fas fa-edit" style="font-size: 16px;"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-sm font-weight-normal">Universiti Malaya</td>
                            <td class="text-sm font-weight-normal">Public</td>
                            <td class="text-sm font-weight-normal"><span style="background-color: #F44336; color: white; padding: 3px 6px;">Rejected</span></td>
                            <td class="text-sm font-weight-normal">2020/08/14</td>
                            <td class="text-sm font-weight-normal">
                                <div class="btn-group">
                                    <button class="btn btn-primary p-1" data-bs-toggle="tooltip" title="Details" style="width: 35px; height: 35px;">
                                        <i class="fas fa-info-circle" style="font-size: 16px;"></i>
                                    </button>
                                    <button class="btn btn-secondary p-1" data-bs-toggle="tooltip" title="Change Status" style="width: 35px; height: 35px;">
                                        <i class="fas fa-edit" style="font-size: 16px;"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-sm font-weight-normal">Universiti Putra Malaysia</td>
                            <td class="text-sm font-weight-normal">Public</td>
                            <td class="text-sm font-weight-normal"><span style="background-color: #2196F3; color: white; padding: 3px 6px;">Approved</span></td>
                            <td class="text-sm font-weight-normal">2019/11/23</td>
                            <td class="text-sm font-weight-normal">
                                <div class="btn-group">
                                    <button class="btn btn-primary p-1" data-bs-toggle="tooltip" title="Details" style="width: 35px; height: 35px;">
                                        <i class="fas fa-info-circle" style="font-size: 16px;"></i>
                                    </button>
                                    <button class="btn btn-secondary p-1" data-bs-toggle="tooltip" title="Change Status" style="width: 35px; height: 35px;">
                                        <i class="fas fa-edit" style="font-size: 16px;"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-sm font-weight-normal">Universiti Sains Malaysia</td>
                            <td class="text-sm font-weight-normal">Public</td>
                            <td class="text-sm font-weight-normal"><span style="background-color: #9C27B0; color: white; padding: 3px 6px;">Under Review</span></td>
                            <td class="text-sm font-weight-normal">2021/02/10</td>
                            <td class="text-sm font-weight-normal">
                                <div class="btn-group">
                                    <button class="btn btn-primary p-1" data-bs-toggle="tooltip" title="Details" style="width: 35px; height: 35px;">
                                        <i class="fas fa-info-circle" style="font-size: 16px;"></i>
                                    </button>
                                    <button class="btn btn-secondary p-1" data-bs-toggle="tooltip" title="Change Status" style="width: 35px; height: 35px;">
                                        <i class="fas fa-edit" style="font-size: 16px;"></i>
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
<script src="<?= base_url() ?>assets/js/plugins/datatables.js"></script>

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