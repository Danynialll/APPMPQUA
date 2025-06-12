<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
<div class="container-fluid py-4">
    <div class="row mt-4">
        <div class="col-lg-3 col-md-6 col-12">
            <div class="card bg-gradient-info">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="textWhite text-sm mb-0 text-capitalize font-weight-bold opacity-7">Total Registered MPQUA</p>
                                <h5 class="textWhite font-weight-bolder mb-0">
                                    <?= esc($total_users) ?>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12 mt-4 mt-md-0">
            <div class="card bg-gradient-warning">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="textWhite text-sm mb-0 text-capitalize font-weight-bold opacity-7">Total Assessors</p>
                                <h5 class="textWhite font-weight-bolder mb-0">
                                    <?= esc($total_assessors) ?>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-12 mt-4 mt-lg-0">
            <div class="card bg-gradient-success">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="textWhite text-sm mb-0 text-capitalize font-weight-bold opacity-7">Dummy</p>
                                <h5 class="textWhite font-weight-bolder mb-0">
                                    0
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-12 mt-4 mt-lg-0">
            <div class="card bg-gradient-danger">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="textWhite text-sm mb-0 text-capitalize font-weight-bold opacity-7">Dummy #2</p>
                                <h5 class="textWhite font-weight-bolder mb-0">
                                    0
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="d-flex justify-content-end mb-3">
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addMPQModal">
        <i class="fas fa-plus"></i> Add MPQ Member
    </button>
</div>

<!-- assessors list -->
<table id="MPQTable" class="custom-table">
    <thead>
        <tr>
            <th>#</th>
            <th>INSTITUTE</th>
            <th>CODE</th>
            <th>USERNAME</th>
            <th>PASSWORD</th>
            <th>TOTAL ASSESSORS</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($mpqua_count)): ?>
            <?php $i = 1; foreach ($mpqua_count as $mpqua): ?>
                <tr data-au-id="<?= esc($mpqua['au_id']) ?>">
                    <td><?= $i++ ?></td>
                    <td><?= esc($mpqua['qu_name']) ?></td>
                    <td><?= esc($mpqua['qu_code']) ?></td>
                    <td><?= esc($mpqua['au_username']) ?></td>
                    <td>
                        <span class="password-mask" style="letter-spacing:2px;">••••••••</span>
                        <span class="real-password d-none"><?= esc($mpqua['au_plain_password']) ?></span>
                        <button type="button" class="btn btn-link btn-sm btn-toggle-password" tabindex="-1">
                            <i class="fas fa-eye" style="font-size: 1rem !important;"></i>&nbsp;
                        </button>
                    </td>
                    <td><?= esc($mpqua['assessor_count']) ?></td>
                    <td>
                        <button class="btn btn-primary btn-edit-mpq" data-bs-toggle="modal" data-bs-target="#editMPQModal">
                            <i class="fas fa-pencil"></i>&nbsp; Edit
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="9">No user data found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>


<!-- Add Modal -->
 <?php include 'actions/addModal.php'; ?>
<!-- edit Modal -->
 <?php include 'actions/editModal.php'; ?>


<style>
    .custom-table {
        width: 100%;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
        font-size: medium;
    }

    .custom-table th,
    .custom-table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }

    .custom-table th:first-child,
    .custom-table td:first-child {
        width: 50px;
        text-align: center;
    }

    .custom-table th {
        background-color: #BA191Cff;
        color: white;
        font-weight: bold;
    }

    .custom-table tr:nth-child{
        background-color: #f9f9f9;
    }

    /* Light mode (default) */
    .card.bg-gradient-info,
    .card.bg-gradient-warning,
    .card.bg-gradient-success,
    .card.bg-gradient-danger {
        color: #fff;
    }
    .card.bg-gradient-info { background: linear-gradient(87deg, #11cdef 0, #1171ef 100%) !important; }
    .card.bg-gradient-warning { background: linear-gradient(87deg, #fbcf33 0, #f53939 100%) !important; }
    .card.bg-gradient-success { background: linear-gradient(87deg, #2dce89 0, #2dcecc 100%) !important; }
    .card.bg-gradient-danger { background: linear-gradient(87deg, #f5365c 0, #f56036 100%) !important; }

    .textWhite {
        color: #FFFFFF;
    }

    /* Dark mode */
    body.dark-version .card.bg-gradient-info {
        background: linear-gradient(87deg, #0a3d62 0, #1e3799 100%) !important;
        color: #f1f1f1;
    }
    body.dark-version .card.bg-gradient-warning {
        background: linear-gradient(87deg, #b68900 0, #b71c1c 100%) !important;
        color: #f1f1f1;
    }
    body.dark-version .card.bg-gradient-success {
        background: linear-gradient(87deg, #145a32 0, #117864 100%) !important;
        color: #f1f1f1;
    }
    body.dark-version .card.bg-gradient-danger {
        background: linear-gradient(87deg, #922b21 0, #b03a2e 100%) !important;
        color: #f1f1f1;
    }

    body.dark-version .textWhite{
        color: #FFFFFF;
    }

    /* Dark mode */
    body.dark-version .custom-modal .modal-content {
        background-color: #23272b;
        color: #f1f1f1;
    }
    body.dark-version .custom-modal .modal-header,
    body.dark-version .custom-modal .modal-footer {
        background-color: #1a1d20;
        color: #f1f1f1;
        border-color: #333;
    }
    body.dark-version .custom-modal .btn-close {
        filter: invert(1);
    }
</style>

<script src="<?= base_url() ?>assets/js/plugins/datatables.js"></script>
<script type="text/javascript">
    const panelTable = new simpleDatatables.DataTable("#MPQTable", {
    searchable: true,
    fixedHeight: true
    });

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

    document.querySelectorAll('.btn-edit-mpq').forEach(btn => {
        btn.addEventListener('click', function () {
            const row = btn.closest('tr');
            const auId = row.getAttribute('data-au-id');
            const username = row.querySelector('td:nth-child(4)').innerText.trim();

            document.getElementById('editUserId').value = auId;
            document.getElementById('editUsername').value = username;
        });
    });
</script>

