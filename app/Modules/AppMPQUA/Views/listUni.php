<div class="container-fluid py-4">
    <div class="row mt-4">
        <div class="col-lg-3 col-md-6 col-12">
            <div class="card bg-gradient-info">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="textWhite text-sm mb-0 text-capitalize font-weight-bold opacity-7">Total Assessors</p>
                                <h5 class="textWhite font-weight-bolder mb-0">
                                    1
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
                                <p class="textWhite text-sm mb-0 text-capitalize font-weight-bold opacity-7">Male Assessors</p>
                                <h5 class="textWhite font-weight-bolder mb-0">
                                    1
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
                                <p class="textWhite text-sm mb-0 text-capitalize font-weight-bold opacity-7">Female Assessors</p>
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
                                <p class="textWhite text-sm mb-0 text-capitalize font-weight-bold opacity-7">Retired Assessors</p>
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

<!-- assessors list -->
<table id="panelTable" class="custom-table">
    <thead>
        <tr>
            <th>#</th>
            <th>NAME</th>
            <th>EXPERTISE</th>
            <th>SERVICE ADDRESS</th>
            <th>RETIREMENT DATE</th>
            <th>CONTACT NO.</th>
            <th>EMAIL</th>
            <th>VIEW DETAILS</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($assessor_list)): ?>
            <?php $i = 1; foreach ($assessor_list as $assessor): ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= esc($assessor->asr_name) ?></td>
                    <td>
                        <?php if (!empty($assessor->expertise_list)): ?>
                            <?php foreach ($assessor->expertise_list as $expertise): ?>
                                <span class="badge bg-info text-dark"><?= esc($expertise) ?></span><br>
                            <?php endforeach; ?>
                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </td>
                    <td><?= esc($assessor->asr_service_address) ?></td>
                    <td><?= esc($assessor->asr_retirement_date) ?></td>
                    <td>
                        Telephone: <?= esc($assessor->asr_phone) ?><br>
                        Fax: <?= esc($assessor->asr_fax) ?>
                    </td>
                    <td><?= esc($assessor->asr_email) ?></td>
                    <td>
                        <button class="btn btn-primary btn-view-details"
                            data-asr-id="<?= esc($assessor->asr_id) ?>"
                            data-bs-toggle="modal" data-bs-target="#viewModal">
                            <i class="fas fa-eye" style="font-size: 1rem !important;"></i>&nbsp;
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="9">No assessor data found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<div class="d-flex justify-content-end mb-3">
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addAssessorModal">
        <i class="fas fa-plus"></i> Add Assessor
    </button>
</div>

<!-- View Modal -->
<?php include 'ListUniFunctionModal/viewModal.php'; ?>
<!-- Edit Modal -->
<?php include 'ListUniFunctionModal/editModal.php'; ?>
<!-- Add Modal -->
 <?php include 'ListUniFunctionModal/createModal.php'; ?>
<!-- Add Button -->



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
    const panelTable = new simpleDatatables.DataTable("#panelTable", {
    searchable: true,
    fixedHeight: true
    });
</script>

<script>
    const viewButtons = document.querySelectorAll('.btn-view-details');
    viewButtons.forEach(button => {
        button.addEventListener('click', function() {
            const asrId = this.getAttribute('data-asr-id');
            fetch('<?= base_url('appmpqua/get_assessor/') ?>' + asrId)
                .then(response => response.json())
                .then(result => {
                    if (!result.success) {
                        alert('Assessor not found.');
                        return;
                    }
                    const data = result.data;

                    document.getElementById('modalUniName').innerText = data.asr_name || '';
                    document.getElementById('modalUniGender').innerText = data.asr_gender || '';
                    document.getElementById('modalUniTelephone').innerText = data.asr_phone || '';
                    document.getElementById('modalUniFax').innerText = data.asr_fax || '';
                    document.getElementById('modalUniEmail').innerText = data.asr_email || '';
                    document.getElementById('modalUniAddress').innerText = data.asr_service_address || '';
                    document.getElementById('modalUniRetirement').innerText = data.asr_retirement_date || '';
                    document.getElementById('openEditModalBtn').setAttribute('data-asr-id', data.asr_id);

                    document.getElementById('modalUniCV').innerHTML = '';
                    if (data.asr_cv_path) {
                        // Create a link to open the CV in a new tab
                        const link = document.createElement('a');
                        link.href = '<?= base_url() ?>' + data.asr_cv_path;
                        link.target = '_blank';
                        link.rel = 'noopener noreferrer';
                        link.innerText = 'View CV';
                        link.className = 'btn btn-link p-0';
                        document.getElementById('modalUniCV').appendChild(link);
                    } else {
                        document.getElementById('modalUniCV').innerText = '-';
                    }

                    // Expertise
                    const expertiseContainer = document.getElementById('modalUniExpertise');
                    expertiseContainer.innerHTML = '';
                    if (data.expertise_list && data.expertise_list.length > 0) {
                        data.expertise_list.forEach(item => {
                            const badge = document.createElement('span');
                            badge.className = 'badge bg-info text-dark me-1';
                            badge.innerText = item;
                            expertiseContainer.appendChild(badge);
                        });
                    } else {
                        expertiseContainer.innerText = '-';
                    }

                    // NEC
                    const necContainer = document.getElementById('modalUniNEC');
                    necContainer.innerHTML = '';
                    if (data.nec_detail_list && data.nec_detail_list.length > 0) {
                        data.nec_detail_list.forEach(item => {
                            const badge = document.createElement('span');
                            badge.className = 'badge bg-success text-dark me-1';
                            badge.innerText = item.nd_desc;
                            necContainer.appendChild(badge);
                        });
                    } else {
                        necContainer.innerText = '-';
                    }
                });
        });
    });

</script>