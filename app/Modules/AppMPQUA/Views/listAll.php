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
                                    <?= esc($total_assessors) ?>
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
                                    <?= esc($male_assessors) ?>
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
                                    <?= esc($female_assessors) ?>
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
                        Telefon: <?= esc($assessor->asr_phone) ?><br>
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


<!-- view modal -->
<?php include 'ListAllModal/viewModal.php'; ?>



   <style>
        .custom-table {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            font-size: smaller;
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
    </style>

<script src="<?= base_url() ?>assets/js/plugins/datatables.js"></script>
<script type="text/javascript">
    const panelTable = new simpleDatatables.DataTable("#panelTable", {
    searchable: true,
    fixedHeight: true
    });
</script>

<script>
    document.querySelector("#panelTable").addEventListener("click", function(e) {
    const target = e.target.closest(".btn-view-details");
    if (!target) return;

    const asrId = target.getAttribute("data-asr-id");
    fetch('<?= base_url('appmpqua/get_assessor/') ?>' + asrId)
        .then(response => response.json())
        .then(result => {
            if (!result.success) {
                alert('Assessor not found.');
                return;
            }
            const data = result.data;

            document.getElementById('modalName').innerText = data.asr_name || '';
            document.getElementById('modalGender').innerText = data.asr_gender || '';
            document.getElementById('modalTelephone').innerText = data.asr_phone || '';
            document.getElementById('modalFax').innerText = data.asr_fax || '';
            document.getElementById('modalEmail').innerText = data.asr_email || '';
            document.getElementById('modalInst').innerText = data.qu_name || '';
            document.getElementById('modalAddress').innerText = data.asr_service_address || '';
            document.getElementById('modalRetirement').innerText = data.asr_retirement_date || '';
            document.getElementById('modalid').innerText = data.asr_id || '';

            // CV
            const cvContainer = document.getElementById('modalCV');
            cvContainer.innerHTML = '';
            if (data.asr_cv_path) {
                const link = document.createElement('a');
                link.href = '<?= base_url() ?>' + data.asr_cv_path;
                link.target = '_blank';
                link.rel = 'noopener noreferrer';
                link.innerText = 'View CV';
                link.className = 'btn btn-link p-0';
                cvContainer.appendChild(link);
            } else {
                cvContainer.innerText = '-';
            }

            // Expertise
            const expertiseContainer = document.getElementById('modalExpertise');
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
            const necContainer = document.getElementById('modalNEC');
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

</script>