<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<!-- Select 2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link href="<?= base_url(); ?>assets/css/select2override.css" rel="stylesheet" />
<style>
    #barChartNEC {
        height: 100% !important;
        width: 100% !important;
    }
    .card-body.full-height {
        height: 100%;
    }
    
    .hover-effect {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    
    .hover-effect:hover {
        transform: translateY(-4px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);

        cursor: pointer;
    }
</style>

<div class="container-fluid">
    <div class="page-header min-height-150 border-radius-xl mt-4" style="background-image: url('../../../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
        <span class="mask bg-gradient-primary opacity-6"></span>
    </div>
    <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4 align-items-center">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <img 
                        src="<?= !empty($user_info->mpq_image) ? base_url($user_info->mpq_image) : base_url('assets/img/default-profile.jpg') ?>" 
                        alt="profile_image" 
                        class="w-100 border-radius-lg shadow-sm">
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h4 class="mb-1 fw-bold">
                        Admin Dashboard
                    </h4>
                </div>
            </div>
            <div class="col">
                <div class="d-flex p-0 justify-content-end">
                    <h6 class="m-2">Filter by University</h6>
                    <select id="selectFilter" class="form-control select2 w-auto" style="min-width: max-content;">
                        <option value="">All</option>
                        <?php foreach ($university_list as $uni): ?>
                            <option value="<?= $uni->qu_id ?>"><?= $uni->qu_name ?> (<?= $uni->qu_code ?>)</option>
                        <?php endforeach; ?>
                    </select>
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-4">
    <div class="row">
        <!-- Bar Chart (Left) -->
        <div class="col-lg-6 mb-4">
            <div class="card h-100 shadow">
                <div class="card-header p-3 bg-gradient-secondary text-white rounded-top">
                    <h6 class="mb-0">Assessors by NEC Field</h6>
                </div>
                <div class="card-body">
                    <canvas id="barChartNEC"></canvas>
                </div>
            </div>
        </div>

        <!-- Pie Charts (Middle: Stacked Squares) -->
        <div class="col-lg-3 mb-4 d-flex flex-column justify-content-between">
            <!-- Gender Pie -->
            <div class="card mb-3 shadow flex-fill">
                <div class="card-header p-3 bg-gradient-info text-white rounded-top">
                    <h6 class="mb-0">Assessor Gender Distribution</h6>
                </div>
                <div class="card-body d-flex align-items-center justify-content-center" >
                    <canvas id="pieChartGender"></canvas>
                </div>
            </div>

            <!-- Active Pie -->
            <div class="card shadow flex-fill">
                <div class="card-header p-3 bg-gradient-success text-white rounded-top">
                    <h6 class="mb-0">Active Assessors Distribution</h6>
                </div>
                <div class="card-body d-flex align-items-center justify-content-center" >
                    <canvas id="pieChartActive"></canvas>
                </div>
            </div>
        </div>

        <!-- University List (Right) -->
        <div class="col-lg-3 mb-4">
            <div class="card h-100 shadow">
                <div class="card-header p-3 bg-gradient-warning text-white rounded-top">
                    <h6 class="mb-0">Assessors by University</h6>
                </div>
                <div class="card-body overflow-auto" style="max-height: 600px;">
                    <?php foreach ($uni_summary as $uni): ?>
                        <div class="card mb-2 hover-effect">
                            <div class="card-body py-2 px-3 ">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6 class="mb-0"><?= esc($uni['code']) ?></h6>
                                    <div class="icon icon-shape bg-gradient-info shadow text-center rounded-circle d-flex justify-content-center align-items-center" style="width: 40px; height: 40px;">
                                        <span class="text-black fw-bold"><?= esc($uni['count'] ?? 0) ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
    <div class="modal-lg modal-dialog">
        <div class="modal-content">
            <form id="editProfileForm">
                <?= csrf_field() ?>
                <div class="bg-gradient-primary modal-header">
                    <h5 class="modal-title" id="editProfileLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-3 text-center">
                            <label for="profile_image" class="form-label fw-bold">Profile Picture</label><br>
                            <img id="profilePreview" src="<?= !empty($user_info->mpq_image) ? base_url($user_info->mpq_image) : base_url('assets/img/default-profile.jpg') ?>" alt="Profile Image" class="img-thumbnail mb-2" style="width: 120px; height: 120px; object-fit: cover;">
                            <input type="file" class="form-control mt-2" id="profile_image" name="profile_image" accept="image/*">
                            <small class="form-text text-muted">Accepted formats: JPG, JPEG, PNG</small>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="mpq_phone" value="$user_info->mpq_phone" required>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="fax" class="form-label">Fax</label>
                            <input type="text" class="form-control" id="fax" name="mpq_fax" value="$user_info->mpq_fax" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="mpq_email" value="$user_info->mpq_email" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary mb-0" data-bs-dismiss="modal"><i class="fas fa-times" style="font-size: 1rem !important;"></i>&nbsp; Close</button>
                    <button type="submit" class="btn btn-primary mb-0"><i class="fas fa-save" style="font-size: 1rem !important;"></i>&nbsp; Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>assets/js/plugins/datatables.js"></script>
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Edit Profile Script -->
<script>
    function showEditModal() {
        const editProfileModal = new bootstrap.Modal(document.getElementById('editProfileModal'));
        editProfileModal.show();
    }

    document.getElementById('editProfileForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        fetch("<?= base_url('appmpqua/update_profile') ?>", {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data.message,
                    }).then(() => {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message || 'Failed to update profile.',
                    });
                }
            })
            .catch(() => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An unexpected error occurred.',
                });
            });
    });

    let genderChart, necChart, activeChart;

    document.addEventListener('DOMContentLoaded', function() {
        genderChart = new Chart(document.getElementById('pieChartGender'), {
            type: 'doughnut',
            data: {
                labels: ['<?= $male_assessors ?? 0 ?> Male', '<?= $female_assessors ?? 0 ?> Female'],
                datasets: [{
                    data: [<?= $male_assessors ?? 0 ?>, <?= $female_assessors ?? 0 ?>], // default values
                    backgroundColor: ['#36A2EB', '#FF6384'],
                }]
            },
            options: {
                responsive: true,
                plugins: { 
                    legend: { position: 'bottom' },
                    tooltip: { enabled: false }
                },
            }
        });

        activeChart = new Chart(document.getElementById('pieChartActive'), {
            type: 'doughnut',
            data: {
                labels: ['<?= $active_assessors ?? 0 ?> Active', '<?= $retired_assessors ?? 0 ?> Retired'],
                datasets: [{
                    data: [<?= $active_assessors ?? 0 ?>, <?= $retired_assessors ?? 0 ?>],
                    backgroundColor: ['#4BC0C0', '#9966FF'],
                }]
            },
            options: {
                responsive: true,
                plugins: { 
                    legend: { 
                        position: 'bottom' 
                    },
                    tooltip: {
                        enabled: false
                    }
                },
            }
        });

        necChart = new Chart(document.getElementById('barChartNEC'), {
            type: 'bar',
            data: {
                labels: <?= json_encode(array_column($nec_counts, 'nec_code') ?? 'label') ?>,
                datasets: [{
                    label: 'Number of Assessors',
                    data: <?= json_encode(array_column($nec_counts, 'count') ?? 'count') ?>,
                    backgroundColor: '#36A2EB'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: true
                },
                scales: {
                    x: { beginAtZero: true },
                    y: { 
                        beginAtZero: true,
                        ticks: {
                            precision: 0,
                            stepSize: 1,
                            callback: function(value) {
                                return Number.isInteger(value) ? value : null;
                            }
                        }
                    }
                }
            }
        });

        document.getElementById('selectFilter').addEventListener('change', function() {
            var qu_id = jQuery(this).val();

            var csrfName = jQuery('input[name="<?= csrf_token() ?>"]').attr('name');
            var csrfHash = jQuery('input[name="<?= csrf_token() ?>"]').val();

            if (qu_id) {
                jQuery.ajax({
                    url: "<?= base_url('qvcAdmin/filterData') ?>",
                    type: "POST",
                    data: {
                        qu_id: qu_id,
                    },
                    dataType: "json",
                    beforeSend: function(xhr, settings) {
                        // Add CSRF token to the headers or data (preferably data)
                        settings.data += `&${csrfName}=${csrfHash}`;
                    },
                    success: function(response) {
                        if (response.success) {

                            genderChart.data.datasets[0].data = [response.male, response.female];
                            genderChart.data.labels = [response.male +' '+ 'Male', response.female +' '+ 'Female'];
                            genderChart.update();

                            activeChart.data.datasets[0].data = [response.active, response.retired];
                            activeChart.data.labels = [response.active +' '+ 'Active', response.retired +' '+ 'Retired'];
                            activeChart.update();

                            necChart.data.labels = response.nec_labels;
                            necChart.data.datasets[0].data = response.nec_counts;
                            necChart.update();

                            // Example in success callback
                            jQuery('input[name="<?= csrf_token() ?>"]').val(response.csrfHash);
                            

                        } else {
                            console.error('Error fetching response:', response.message);
                        }
                    }
                });
            } else {
                genderChart.data.datasets[0].data = [<?= $male_assessors ?? 0 ?>, <?= $female_assessors ?? 0 ?>];
                genderChart.data.labels = ['<?= $male_assessors ?? 0 ?> Male', '<?= $female_assessors ?? 0 ?> Female'];
                genderChart.update();

                activeChart.data.datasets[0].data = [<?= $active_assessors ?? 0 ?>, <?= $retired_assessors ?? 0 ?>];
                activeChart.data.labels = ['<?= $active_assessors ?? 0 ?> Active', '<?= $retired_assessors ?? 0 ?> Retired'];
                activeChart.update();

                necChart.data.labels = <?= json_encode(array_column($nec_counts, 'nec_code') ?? 'label') ?>;
                necChart.data.datasets[0].data = <?= json_encode(array_column($nec_counts, 'count') ?? 'count') ?>;
                necChart.update();
            }
        });        
    });

    document.getElementById('profile_image').addEventListener('change', function(e) {
        const [file] = this.files;
        if (file) {
            document.getElementById('profilePreview').src = URL.createObjectURL(file);
        }
    });
</script>

