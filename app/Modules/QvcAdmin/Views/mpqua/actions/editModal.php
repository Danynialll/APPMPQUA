<div class="modal fade custom-modal" id="editMPQModal" tabindex="-1" aria-labelledby="editMPQModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="editMPQForm">
        <?= csrf_field() ?>
        <div class="modal-body">
            <div class="row g-3">
                <input type="text" name="au_id" id="editUserId" class="form-control" hidden>
                <div class="row-md-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="au_username" id="editUsername" class="form-control" required>
                </div>
                <div class="row-md-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="au_password" placeholder="Enter password" aria-label="Password">
                </div>
                <div class="row-md-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirm password" aria-label="Confirm Password">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger me-auto" id="deleteUserBtn">
            <i class="fas fa-trash"></i>&nbsp; Delete
          </button>
          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i>&nbsp; Save</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>


<script>
    document.getElementById('editMPQForm').addEventListener('submit', function(e) {

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

        fetch("<?= base_url('qvcAdmin/mpqua/editUser') ?>", {
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

<script>
// Handle delete user button
document.getElementById('deleteUserBtn').addEventListener('click', function() {
    const au_id = document.getElementById('editUserId').value;
    Swal.fire({
        title: 'Delete user?',
        text: 'Are you sure you want to delete this user? This action cannot be undone.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(`<?= base_url('qvcAdmin/mpqua/deleteUser/') ?>${au_id}`, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('input[name="csrf_test_name"]').value
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: data.message || 'User has been deleted.',
                    }).then(() => {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message || 'Failed to delete User.',
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
        }
    });
});
</script>
