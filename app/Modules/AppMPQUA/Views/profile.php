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
                    <img src="../../../assets/img/bruce-mars.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
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
        <div class="col-12 col-lg-6 mx-auto">
            <div class="card h-100 shadow">
                <div class="card-header pb-0 p-3 bg-gradient-primary text-white rounded-top">
                    <h5 class="mb-0">University Information</h5>
                </div>
                <div class="card-body p-4">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong>Name:</strong> <br><?= $user_info->qu_name ?></li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong>Telephone:</strong> <br><?= $user_info->mpq_phone ?></li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong>Fax:</strong> <br><?= $user_info->mpq_fax ?></li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong>Email:</strong> <br><?= $user_info->mpq_email ?></li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong>Address:</strong> <br><?= $user_info->mpq_address ?></li>
                    </ul>
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
                <div class="bg-primary modal-header">
                    <h5 class="modal-title" id="editProfileLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="phone" class="form-label">Telephone</label>
                        <input type="text" class="form-control" id="phone" name="mpq_phone" value="<?= $user_info->mpq_phone ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="fax" class="form-label">Fax</label>
                        <input type="text" class="form-control" id="fax" name="mpq_fax" value="<?= $user_info->mpq_fax ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="mpq_email" value="<?= $user_info->mpq_email ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="mpq_address" value="<?= $user_info->mpq_address ?>" required>
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
</script>
