<div class="modal fade custom-modal" id="addMPQModal" tabindex="-1" aria-labelledby="addMPQModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="addMPQForm">
        <?= csrf_field() ?>
        <div class="modal-body">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">University</label>
                    <select class="form-control select2" name="au_qu_id" id="university" aria-label="University" required>
                        <option value="">Select University</option>
                            <?php foreach ($university_list as $uni): ?>
                              <option value="<?= $uni->qu_id ?>"><?= $uni->qu_name ?></option>
                            <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" name="mpq_email" class="form-control" required>
                </div>
                <div class="md-3">
                    <label class="form-label">Address</label>
                    <textarea name="mpq_address" class="form-control" required></textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Phone</label>
                    <input type="text" name="mpq_phone" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Username</label>
                    <input type="text" name="au_username" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="au_password" id="password" placeholder="Enter password" aria-label="Password" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirm password" aria-label="Confirm Password" required>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i>&nbsp; Save</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>


<script>
    document.getElementById('addMPQForm').addEventListener('submit', function(e) {

        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirmPassword").value;

        // Check if the passwords match
        if (password !== confirmPassword) {
            // Prevent form submission
            event.preventDefault();

            // Display SweetAlert error message
            Swal.fire({
            title: 'Error!',
            text: 'Passwords do not match. Please check your input.',
            icon: 'error',
            confirmButtonText: 'Okay'
            });
        }

        e.preventDefault();

        const formData = new FormData(this);

        fetch("<?= base_url('qvcAdmin/mpqua/addUser') ?>", {
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
