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

<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
                <h2 class="mb-0 fs-4 fw-bold">Filter Assessors by NEC</h2>
            </div>
            <div class="card-body p-0 mt-4">
                <form id="filterAssessorForm">
                    <?= csrf_field() ?>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="nec_broad">NEC Broad</label>
                            <select id="add_nec_broad" class="form-select select2" name="nec_broad">
                                <option value="">Select NEC Broad</option>
                                <?php foreach ($nec_broad as $broad): ?>
                                    <option value="<?= esc($broad->nb_id) ?>"><?= esc($broad->nb_code) ?> - <?= esc($broad->nb_name) ?> (<?= $broad_counts[$broad->nb_id] ?? 0 ?>)</option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="nec_narrow">NEC Narrow</label>
                            <select id="add_nec_narrow" class="form-select select2" name="nec_narrow">
                                <option value="">Select NEC Narrow</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>NEC Detail</label>
                            <select id="add_nec_detail" class="form-select select2" name="nec_detail_id">
                                <option value="">Select NEC Detail</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" id="necFilterSubmit" class="btn btn-success mt-2" data-bs-toggle="tooltip" data-bs-placement="auto" title="Find Assessors by NEC"><i class="fa-solid fa-magnifying-glass"></i> Find Assessors</button>
                </form>
                <div id="assessor-table-container" class="mt-4"></div>
            </div>
        </div>
    </div>
</div>

<script>
jQuery(document).ready(function($) {
    $('.select2').select2({
        allowClear: false,
        width: '100%'
    });

    // Hide narrow and detail fields initially
    $('#add_nec_narrow').closest('.col-md-4').hide();
    $('#add_nec_detail').closest('.col-md-4').hide();
    $('#necFilterSubmit').hide();

    // Show NEC Narrow after selecting Broad
    $('#add_nec_broad').on('change', function() {
        var broad_id = $(this).val();
        $('#add_nec_narrow').html('<option value="">Loading...</option>');
        $('#add_nec_detail').html('<option value="">Select NEC Detail</option>');
        if (broad_id) {
            $('#add_nec_narrow').closest('.col-md-4').show();
            $.ajax({
                url: "<?= base_url('appmpqua/get_nec_narrow') ?>",
                type: "POST",
                data: {
                    broad_id: broad_id,
                    csrf_test_name: $("input[name='csrf_test_name']").val()
                },
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        var options = '<option value="">Select NEC Narrow</option>';
                        $.each(response.data, function(i, item) {
                            var count = response.narrow_counts_uni[item.nn_id] ?? 0;
                            options += `<option value="${item.nn_id}">${item.nn_code} ${item.nn_name} (${count})</option>`;
                        });
                        $('#add_nec_narrow').html(options).trigger('change');
                        $("input[name='csrf_test_name']").val(response.csrf_token);
                    } else {
                        $('#add_nec_narrow').html('<option value="">Select NEC Narrow</option>');
                    }
                }
            });
        } else {
            $('#add_nec_narrow').closest('.col-md-4').hide();
            $('#add_nec_detail').closest('.col-md-4').hide();
        }
        $('#add_nec_detail').closest('.col-md-4').hide();
    });

    // Show NEC Detail after selecting Narrow
    $('#add_nec_narrow').on('change', function() {
        var narrow_id = $(this).val();
        $('#add_nec_detail').html('<option value="">Loading...</option>');
        if (narrow_id) {
            $('#add_nec_detail').closest('.col-md-4').show();
            $.ajax({
                url: "<?= base_url('appmpqua/get_nec_detail') ?>",
                type: "POST",
                data: {
                    narrow_id: narrow_id,
                    csrf_test_name: $("input[name='csrf_test_name']").val()
                },
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        var options = '<option value="">Select NEC Detail</option>';
                        $.each(response.data, function(i, item) {
                            var count = response.counts_uni[item.nd_id] ?? 0;
                            options += `<option value="${item.nd_id}">${item.nd_code} ${item.nd_name} (${count})</option>`;
                        });
                        $('#add_nec_detail').html(options).trigger('change');
                        $("input[name='csrf_test_name']").val(response.csrf_token);
                    } else {
                        $('#add_nec_detail').html('<option value="">Select NEC Detail</option>');
                    }
                }
            });
        } else {
            $('#add_nec_detail').html('<option value="">Select NEC Detail</option>');
        }
    });

    $('#add_nec_detail').on('change', function() {
        var detail_id = $(this).val();
        if (detail_id) {
            $('#necFilterSubmit').show();
        } else {
            $('#necFilterSubmit').hide();
        }
    });
});
</script>

<script>
document.getElementById('filterAssessorForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const form = this;
    const formData = new FormData(form);

    fetch("<?= base_url('appmpqua/get_assessors_by_nec_detail_uni') ?>", {
        method: 'POST',
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        const container = document.getElementById('assessor-table-container');

        // Update CSRF token in form
        if (data.csrf_token) {
            document.querySelector("input[name='csrf_test_name']").value = data.csrf_token;
        }

        if (data.success && Array.isArray(data.assessors) && data.assessors.length > 0) {
            let html = `<div class="table-responsive"><table class="table" id="datatable-search">
            <thead>
                <tr>
                    <th class="text-center" style="width:60px;">No.</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th style="width:150px;">Expertise</th>
                    <th style="width:150px;">NEC Field</th>
                    <th style="width:120px;" class="text-center">Details</th>
                </tr>
            </thead>
            <tbody>`;
            data.assessors.forEach((a, idx) => {
                let expertiseHTML = '-';
                if (Array.isArray(a.expertise_list) && a.expertise_list.length > 0) {
                    expertiseHTML = a.expertise_list.map(exp =>
                        `<span class="badge bg-primary text-white mb-1" style="word-break:break-word;">${typeof exp === 'object' ? exp.ef_desc : exp}</span><br>`
                    ).join('');
                }

                let necHTML = '-';
                if (Array.isArray(a.nec_detail_list) && a.nec_detail_list.length > 0) {
                    necHTML = a.nec_detail_list.map(nec =>
                        `<span class="badge bg-success text-white mb-1" style="word-break:break-word;">${nec.nd_desc}</span><br>`
                    ).join('');
                }
                let imgHTML = '<img src="<?= base_url('assets/img/default-profile.jpg') ?>" class="img-thumbnail profile-thumb" style="width:50px; height:50px; object-fit:cover; cursor:pointer;">';
                if (a.asr_image) {
                    imgHTML = `<img src="<?= base_url() ?>${a.asr_image}" class="img-thumbnail profile-thumb" style="width:50px; height:50px; object-fit:cover; cursor:pointer;">`;
                }

                html += `<tr>
                <td class="text-center">${idx + 1}</td>
                <td>${imgHTML}</td>
                <td style="word-break:break-word;">${a.asr_title_desc ? a.asr_title_desc + ' ' : ''} ${a.asr_name}</td>
                <td><h6 class="mb-0 text-sm">${expertiseHTML}</h6></td>
                <td><h6 class="mb-0 text-sm">${necHTML}</h6></td>
                <td class="text-center">
                    <div class="action-container">
                        <span data-bs-toggle="tooltip" data-bs-placement="auto" title="View Assessor Details">
                            <button class="btn btn-primary btn-view-details"
                                data-asr-id="${a.asr_id}"
                                data-bs-toggle="modal" data-bs-target="#viewModal">
                                <i class="fas fa-eye" style="font-size: 1rem !important;"></i>
                            </button>
                        </span>
                    </div>
                </td>
            </tr>`;
            });
            html += '</tbody></table></div>';
            container.innerHTML = html;

            // Re-initialize DataTable for the new table
            if ($.fn.DataTable.isDataTable('#datatable-search')) {
                $('#datatable-search').DataTable().destroy();
            }
            $('#datatable-search').DataTable({
                responsive: true,
                dom: '<"top"fl>rt<"bottom"ip><"clear">',
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search assessors...",
                    lengthMenu: "Show _MENU_ entries",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                    infoEmpty: "Showing 0 to 0 of 0 entries",
                    infoFiltered: "(filtered from _MAX_ total entries)",
                    emptyTable: `<div class="d-flex flex-column align-items-center">
                        <i class="fas fa-folder-open text-muted mb-2" style="font-size: 2rem;"></i>
                        <h6 class="text-muted">No users found</h6>
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
                        targets: [1, 5]
                    },
                    {
                        className: "text-center",
                        targets: [0, 5]
                    }
                ],
                order: [
                    [0, 'asc']
                ]
            });
        } else {
            container.innerHTML = '<div class="alert alert-warning mt-3">No assessors found for this NEC detail.</div>';
        }
    });
});
</script>

<script>
document.addEventListener("click", function(e) {
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

            // Profile Image
            const modalPhoto = document.getElementById('modalPhoto');
            modalPhoto.innerHTML = '';
            let img = document.createElement('img');
            img.className = 'img-thumbnail rounded shadow';
            img.style.width = '100%';
            img.style.height = '100%';
            img.style.objectFit = 'cover';
            img.alt = 'Profile Image';
            img.src = data.asr_image
                ? '<?= base_url() ?>' + data.asr_image
                : '<?= base_url() ?>assets/img/default-profile.jpg';

            modalPhoto.appendChild(img);

            document.getElementById('modalName').innerText = (data.asr_title_desc ? data.asr_title_desc + ' ' : '') + (data.asr_name || '');
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
                link.innerHTML = '<span class="badge bg-secondary"><i class="fas fa-file-alt me-1"></i> Document</span>';
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
                    badge.className = 'badge bg-primary text-white me-1';
                    badge.innerText = typeof item === 'object' ? item.ef_desc : item;
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
                    badge.className = 'badge bg-success text-white me-1';
                    badge.innerText = item.nd_desc;
                    necContainer.appendChild(badge);
                });
            } else {
                necContainer.innerText = '-';
            }
        });
});
</script>

<?php include 'ListAllModal/viewModal.php'; ?>


