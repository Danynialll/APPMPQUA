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

<div class="row">
    <h2 class="mb-0">SAMC MONITORING</h2>
    <p class="mb-4 ms-1">This is a simple dashboard with some statistics and charts.</p>
    <div class="col-lg-7">
        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <div class="card  mb-4">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total SAMC-01 Reviewed</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        100
                                        <!-- <span class="text-success text-sm font-weight-bolder">+55%</span> -->
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-primary shadow text-center border-radius-md">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card ">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Registered Providers</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        300
                                        <!-- <span class="text-success text-sm font-weight-bolder">+3%</span> -->
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-primary shadow text-center border-radius-md">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 mt-sm-0 mt-4">
                <div class="card  mb-4">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Income</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        RM50, 000
                                        <span class="text-danger text-sm font-weight-bolder">-10% (BENDAHARI)</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-primary shadow text-center border-radius-md">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card ">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Registered Assessors</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        100
                                        <!-- <span class="text-success text-sm font-weight-bolder">+5%</span> -->
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-primary shadow text-center border-radius-md">
                                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <div class="card ">
                <div class="card-header pb-0 p-3">
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-2">Top Selling Courses</h6>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-left text-sm p-0 pb-2 ps-3">Course</th>
                                <th class="text-left text-sm p-0 pb-2 ps-1">Total Reviewed</th>
                                <th class="text-left text-sm p-0 pb-2 ps-1">Total Profit</th>
                                <th class="text-left text-sm p-0 pb-2 ps-1">Percentage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="w-30">
                                    <div class="d-flex px-2 py-1 align-items-center">
                                        <div>
                                            <img src="../../assets/img/icons/flags/US.png" alt="Country flag">
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="text-sm mb-0">United States</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-left">
                                        <h6 class="text-sm mb-0">2500</h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-left">
                                        <h6 class="text-sm mb-0">$230,900</h6>
                                    </div>
                                </td>
                                <td class="align-middle text-sm">
                                    <div class="col text-left">
                                        <h6 class="text-sm mb-0">29.9%</h6>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-30">
                                    <div class="d-flex px-2 py-1 align-items-center">
                                        <div>
                                            <img src="../../assets/img/icons/flags/DE.png" alt="Country flag">
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="text-sm mb-0">Germany</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-left">
                                        <h6 class="text-sm mb-0">3.900</h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-left">
                                        <h6 class="text-sm mb-0">$440,000</h6>
                                    </div>
                                </td>
                                <td class="align-middle text-sm">
                                    <div class="col text-left">
                                        <h6 class="text-sm mb-0">40.22%</h6>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-30">
                                    <div class="d-flex px-2 py-1 align-items-center">
                                        <div>
                                            <img src="../../assets/img/icons/flags/GB.png" alt="Country flag">
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="text-sm mb-0">Great Britain</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-left">
                                        <h6 class="text-sm mb-0">1.400</h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-left">
                                        <h6 class="text-sm mb-0">$190,700</h6>
                                    </div>
                                </td>
                                <td class="align-middle text-sm">
                                    <div class="col text-left">
                                        <h6 class="text-sm mb-0">23.44%</h6>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-30">
                                    <div class="d-flex px-2 py-1 align-items-center">
                                        <div>
                                            <img src="../../assets/img/icons/flags/BR.png" alt="Country flag">
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="text-sm mb-0">Brasil</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-left">
                                        <h6 class="text-sm mb-0">562</h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-left">
                                        <h6 class="text-sm mb-0">$143,960</h6>
                                    </div>
                                </td>
                                <td class="align-middle text-sm">
                                    <div class="col text-left">
                                        <h6 class="text-sm mb-0">32.14%</h6>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-5 col-sm-6 mt-sm-0 mt-4">
        <div class="card">
            <div class="card-body p-3 position-relative overflow-hidden min-height-500">
                <div class="row">
                    <div class="col-10">
                        <div class="numbers">
                            <h3 class="text-dark font-weight-bold mb-0">Global Sales</h3>
                            <p class="mb-0 mb-4">Check the global stats of the company</p>
                            <h5 class="font-weight-bolder mb-0">
                                $103,430
                            </h5>
                            <p class="mb-2">Generated sales</p>
                            <h5 class="font-weight-bolder mb-0">
                                24,500
                            </h5>
                            <p class="mb-0">Reached Users</p>
                        </div>
                    </div>
                    <div class="col-2 text-end">
                        <div class="icon icon-shape bg-primary shadow text-center border-radius-md">
                            <i class="ni ni-square-pin text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <div id="globe" class="position-absolute end-0 bottom-n2 mt-sm-3 peekaboo">
                    <canvas width="600" height="655" class="w-lg-100 h-lg-100 w-75 h-75 me-lg-0 me-n8 mt-lg-5" style="width: 600px; height: 655.594px;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
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
                <table class="table table-flush" id="datatable-search">
                    <thead class="thead-light">
                        <tr>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Courses</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-sm font-weight-normal">Universiti Pendidikan Sultan Idris</td>
                            <td class="text-sm font-weight-normal">Government</td>
                            <td class="text-sm font-weight-normal">Bahasa Arab</td>
                            <td class="text-sm font-weight-normal">Review In Progress</td>
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
                            <td class="text-sm font-weight-normal">Universiti Malaya</td>
                            <td class="text-sm font-weight-normal">Government</td>
                            <td class="text-sm font-weight-normal">English</td>
                            <td class="text-sm font-weight-normal">Awaiting Assignment</td>
                            <td class="text-sm font-weight-normal">2012/06/15</td>
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
                            <td class="text-sm font-weight-normal">Government</td>
                            <td class="text-sm font-weight-normal">Mathematics</td>
                            <td class="text-sm font-weight-normal">Assign For Review</td>
                            <td class="text-sm font-weight-normal">2013/11/30</td>
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
                            <td class="text-sm font-weight-normal">Universiti Kebangsaan Malaysia</td>
                            <td class="text-sm font-weight-normal">Government</td>
                            <td class="text-sm font-weight-normal">Physics</td>
                            <td class="text-sm font-weight-normal">Reviewed</td>
                            <td class="text-sm font-weight-normal">2014/02/20</td>
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
                            <td class="text-sm font-weight-normal">Universiti Teknologi MARA</td>
                            <td class="text-sm font-weight-normal">Government</td>
                            <td class="text-sm font-weight-normal">Accounting</td>
                            <td class="text-sm font-weight-normal">Pass</td>
                            <td class="text-sm font-weight-normal">2015/07/12</td>
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
                            <td class="text-sm font-weight-normal">Universiti Utara Malaysia</td>
                            <td class="text-sm font-weight-normal">Government</td>
                            <td class="text-sm font-weight-normal">Business</td>
                            <td class="text-sm font-weight-normal">Conditional Pass</td>
                            <td class="text-sm font-weight-normal">2016/01/15</td>
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
                            <td class="text-sm font-weight-normal">Universiti Malaysia Sarawak</td>
                            <td class="text-sm font-weight-normal">Government</td>
                            <td class="text-sm font-weight-normal">Engineering</td>
                            <td class="text-sm font-weight-normal">Awaiting Assignment</td>
                            <td class="text-sm font-weight-normal">2017/05/20</td>
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
                            <td class="text-sm font-weight-normal">Universiti Pendidikan Sultan Idris</td>
                            <td class="text-sm font-weight-normal">Government</td>
                            <td class="text-sm font-weight-normal">Bahasa Arab</td>
                            <td class="text-sm font-weight-normal">Review In Progress</td>
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
                            <td class="text-sm font-weight-normal">Universiti Malaya</td>
                            <td class="text-sm font-weight-normal">Government</td>
                            <td class="text-sm font-weight-normal">English</td>
                            <td class="text-sm font-weight-normal">Awaiting Assignment</td>
                            <td class="text-sm font-weight-normal">2012/06/15</td>
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
                            <td class="text-sm font-weight-normal">Government</td>
                            <td class="text-sm font-weight-normal">Mathematics</td>
                            <td class="text-sm font-weight-normal">Assign For Review</td>
                            <td class="text-sm font-weight-normal">2013/11/30</td>
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
                            <td class="text-sm font-weight-normal">Universiti Kebangsaan Malaysia</td>
                            <td class="text-sm font-weight-normal">Government</td>
                            <td class="text-sm font-weight-normal">Physics</td>
                            <td class="text-sm font-weight-normal">Reviewed</td>
                            <td class="text-sm font-weight-normal">2014/02/20</td>
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
                            <td class="text-sm font-weight-normal">Universiti Teknologi MARA</td>
                            <td class="text-sm font-weight-normal">Government</td>
                            <td class="text-sm font-weight-normal">Accounting</td>
                            <td class="text-sm font-weight-normal">Pass</td>
                            <td class="text-sm font-weight-normal">2015/07/12</td>
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
                            <td class="text-sm font-weight-normal">Universiti Utara Malaysia</td>
                            <td class="text-sm font-weight-normal">Government</td>
                            <td class="text-sm font-weight-normal">Business</td>
                            <td class="text-sm font-weight-normal">Conditional Pass</td>
                            <td class="text-sm font-weight-normal">2016/01/15</td>
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
                            <td class="text-sm font-weight-normal">Universiti Malaysia Sarawak</td>
                            <td class="text-sm font-weight-normal">Government</td>
                            <td class="text-sm font-weight-normal">Engineering</td>
                            <td class="text-sm font-weight-normal">Awaiting Assignment</td>
                            <td class="text-sm font-weight-normal">2017/05/20</td>
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
<script src="<?= base_url() ?>assets/js/plugins/threejs.js"></script>
<script src="<?= base_url() ?>assets/js/plugins/datatables.js"></script>
<script src="<?= base_url() ?>assets/js/plugins/orbit-controls.js"></script>
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

<script>
    (function() {
        const container = document.getElementById("globe");
        const canvas = container.getElementsByTagName("canvas")[0];

        const globeRadius = 100;
        const globeWidth = 4098 / 2;
        const globeHeight = 1968 / 2;

        function convertFlatCoordsToSphereCoords(x, y) {
            let latitude = ((x - globeWidth) / globeWidth) * -180;
            let longitude = ((y - globeHeight) / globeHeight) * -90;
            latitude = (latitude * Math.PI) / 180;
            longitude = (longitude * Math.PI) / 180;
            const radius = Math.cos(longitude) * globeRadius;

            return {
                x: Math.cos(latitude) * radius,
                y: Math.sin(longitude) * globeRadius,
                z: Math.sin(latitude) * radius
            };
        }

        function makeMagic(points) {
            const {
                width,
                height
            } = container.getBoundingClientRect();

            // 1. Setup scene
            const scene = new THREE.Scene();
            // 2. Setup camera
            const camera = new THREE.PerspectiveCamera(45, width / height);
            // 3. Setup renderer
            const renderer = new THREE.WebGLRenderer({
                canvas,
                antialias: true
            });
            renderer.setSize(width, height);
            // 4. Add points to canvas
            // - Single geometry to contain all points.
            const mergedGeometry = new THREE.Geometry();
            // - Material that the dots will be made of.
            const pointGeometry = new THREE.SphereGeometry(0.5, 1, 1);
            const pointMaterial = new THREE.MeshBasicMaterial({
                color: "#989db5",
            });

            for (let point of points) {
                const {
                    x,
                    y,
                    z
                } = convertFlatCoordsToSphereCoords(
                    point.x,
                    point.y,
                    width,
                    height
                );

                if (x && y && z) {
                    pointGeometry.translate(x, y, z);
                    mergedGeometry.merge(pointGeometry);
                    pointGeometry.translate(-x, -y, -z);
                }
            }

            const globeShape = new THREE.Mesh(mergedGeometry, pointMaterial);
            scene.add(globeShape);

            container.classList.add("peekaboo");

            // Setup orbital controls
            camera.orbitControls = new THREE.OrbitControls(camera, canvas);
            camera.orbitControls.enableKeys = false;
            camera.orbitControls.enablePan = false;
            camera.orbitControls.enableZoom = false;
            camera.orbitControls.enableDamping = false;
            camera.orbitControls.enableRotate = true;
            camera.orbitControls.autoRotate = true;
            camera.position.z = -265;

            function animate() {
                // orbitControls.autoRotate is enabled so orbitControls.update
                // must be called inside animation loop.
                camera.orbitControls.update();
                requestAnimationFrame(animate);
                renderer.render(scene, camera);
            }
            animate();
        }

        function hasWebGL() {
            const gl =
                canvas.getContext("webgl") || canvas.getContext("experimental-webgl");
            if (gl && gl instanceof WebGLRenderingContext) {
                return true;
            } else {
                return false;
            }
        }

        function init() {
            if (hasWebGL()) {
                window
                window.fetch("https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-dashboard-pro/assets/js/points.json")
                    .then(response => response.json())
                    .then(data => {
                        makeMagic(data.points);
                    });
            }
        }
        init();
    })();
</script>