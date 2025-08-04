<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<!-- Select 2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link href="<?= base_url(); ?>assets/css/select2override.css" rel="stylesheet" />


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
                        <?= $user_info->qu_name ?>
                    </h4>
                    <p class="mb-0 font-weight-bold text-sm text-secondary">
                        <?= $user_info->qu_code ?>
                    </p>
                </div>
            </div>
            <div class="col text-end">
                <a href="javascript:;" onclick="showEditModal()" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-user-edit"></i> Edit Profile
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-4">
    <div class="row mt-3">
        <!-- University Info (Left) -->
        <div class="col-12 col-lg-4 mb-4">
            <div class="card h-100 shadow">
                <div class="card-header pb-0 p-3 bg-gradient-primary text-white rounded-top">
                    <h5 class="mb-3">University Information</h5>
                </div>
                <div class="card-body p-4">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong>Name:</strong> <br><?= $user_info->qu_name ?></li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong>Phone:</strong> <br><?= $user_info->mpq_phone ?></li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong>Fax:</strong> <br><?= $user_info->mpq_fax ?></li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong>Email:</strong> <br><?= $user_info->mpq_email ?></li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong>Address:</strong> <br><?= $user_info->mpq_address ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Charts (Right) -->
        <div class="col-12 col-lg-8">
            <div class="row">
                <!-- Pie Charts -->
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow">
                        <div class="card-header pb-0 p-3 bg-gradient-info text-white rounded-top">
                            <h6 class="mb-3">Assessor Gender Distribution</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="pieChartGender"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow">
                        <div class="card-header pb-0 p-3 bg-gradient-success text-white rounded-top">
                            <h6 class="mb-3">Active Assessors Distribution</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="pieChartActive"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Bar Chart -->
            <div class="row">
                <div class="col-12">
                    <div class="card h-100 shadow">
                        <div class="card-header pb-0 p-3 bg-gradient-secondary text-white rounded-top">
                            <h6 class="mb-3">Assessors by NEC Field</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="barChartNEC"></canvas>
                        </div>
                    </div>
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
                            <input type="text" class="form-control" id="phone" name="mpq_phone" value="<?= $user_info->mpq_phone ?>" required>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="fax" class="form-label">Fax</label>
                            <input type="text" class="form-control" id="fax" name="mpq_fax" value="<?= $user_info->mpq_fax ?>" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="mpq_email" value="<?= $user_info->mpq_email ?>" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="showChangePasswordModal()" class="btn btn-warning mb-0" data-bs-dismiss="modal"><i class="fas fa-key" style="font-size: 1rem !important;"></i>&nbsp; Change password</button>
                    <button type="button" class="btn btn-secondary mb-0" data-bs-dismiss="modal"><i class="fas fa-times" style="font-size: 1rem !important;"></i>&nbsp; Close</button>
                    <button type="submit" class="btn btn-primary mb-0"><i class="fas fa-save" style="font-size: 1rem !important;"></i>&nbsp; Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- change password modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordLabel" aria-hidden="true">
    <div class="modal-lg modal-dialog">
        <div class="modal-content">
            <form id="changePasswordForm">
                <?= csrf_field() ?>
                <div class="bg-gradient-primary modal-header">
                    <h5 class="modal-title" id="changePasswordLabel">Change Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Current Password</label>
                        <input type="password" class="form-control" id="current_password" name="current_password" required>
                    </div>
                    <div class="mb-3">
                        <label for="new_password" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="new_password" name="new_password"required>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php
$nec_labels = array_column($nec_counts, 'nec_code');
$nec_data = array_column($nec_counts, 'count');
$nec_names = array_column($nec_counts, 'nec_name');
?>

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

    document.addEventListener('DOMContentLoaded', function() {
        // Example data, replace with PHP variables or AJAX as needed
        const genderData = {
            labels: ['<?= $male_assessors ?? 0 ?> Male', '<?= $female_assessors ?? 0 ?> Female'],
            datasets: [{
                data: [<?= $male_assessors ?? 0 ?>, <?= $female_assessors ?? 0 ?>],
                backgroundColor: ['#36A2EB', '#FF6384'],
            }]
        };

        const activeData = {
            labels: ['<?= $active_assessors ?? 0 ?> Active', '<?= $retired_assessors ?? 0 ?> Retired'],
            datasets: [{
                data: [<?= $active_assessors ?? 0 ?>, <?= $retired_assessors ?? 0 ?>],
                backgroundColor: ['#4BC0C0', '#9966FF'],
            }]
        };

        const NECData = {
            labels: <?= json_encode($nec_labels) ?>,
            datasets: [{
                label: 'Number of Assessors',
                data: <?= json_encode($nec_data) ?>,
                backgroundColor: '#36A2EB'
            }]
        };
        const necNames = <?= json_encode($nec_names) ?>;

        // Pie Chart: Gender
        new Chart(document.getElementById('pieChartGender'), {
            type: 'doughnut',
            data: genderData,
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

        // Pie Chart: Active
        new Chart(document.getElementById('pieChartActive'), {
            type: 'doughnut',
            data: activeData,
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

        // Bar Chart: NEC
        new Chart(document.getElementById('barChartNEC'), {
            type: 'bar',
            data: NECData,
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            title: function(context) {
                                // Show nec_name as tooltip title
                                const idx = context[0].dataIndex;
                                return necNames[idx] || context[0].label;
                            },
                            label: function(context) {
                                // Show count as label
                                return 'Assessors: ' + context.parsed.y;
                            }
                        }
                    }
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
    });

    document.getElementById('profile_image').addEventListener('change', function(e) {
        const [file] = this.files;
        if (file) {
            document.getElementById('profilePreview').src = URL.createObjectURL(file);
        }
    });

    function showChangePasswordModal() {
        const changePasswordModal = new bootstrap.Modal(document.getElementById('changePasswordModal'));
        changePasswordModal.show();
    }

    document.getElementById('changePasswordForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        fetch("<?= base_url('appmpqua/change_password') ?>", {
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
                        text: data.message || 'Failed to change password',
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
</script>
