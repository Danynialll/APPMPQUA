
<div class="modal fade custom-modal" id="editAssessorModal" tabindex="-1" aria-labelledby="editAssessorModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="editAssessorModalLabel">Edit Assessor</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="editAssessorForm">
        <?= csrf_field() ?>
        <div class="modal-body">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Name</label>
                    <input type="text" name="asr_name" id="modalNameInput" value="" class="form-control" required>
                    <input type="text" name="asr_id" id="modalIdInput" value="" class="form-control" hidden>
                </div>
                <div class="col-md-6">
                    <label class="form-label">University</label>
                    <input type="text" name="asr_university" class="form-control" value="<?= get_university_name($mpq->mpq_qu_id) ?>" disabled>
                    <input type="text" name="asr_qu_id" class="form-control" required style="display: none;" value="<?= $mpq->mpq_qu_id ?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Telephone No.</label>
                    <input type="text" name="asr_phone" id="modalTelephoneInput" value="" class="form-control" >
                </div>
                <div class="col-md-6">
                    <label class="form-label">Fax</label>
                    <input type="text" name="asr_fax" class="form-control" id="modalFaxInput" value="">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" name="asr_email" class="form-control" id="modalEmailInput" value="" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Service Address</label>
                    <input type="text" name="asr_service_address" class="form-control" id="modalAddressInput" value="">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Retirement Date</label>
                    <input type="date" name="asr_retirement_date" class="form-control" id="modalRetirementInput" value="">
                </div>

                <!-- My Expertise -->
                <div class="mb-3">
                    <label for="expertise" class="form-label">Selected Expertise:</label><br>
                    <div id="modalExpertiseInput"></div>
                </div>

                <!-- Expertise Select2 Fields -->
                <div id="expertiseFields">
                    <div class="mb-3 expertise-field">
                        <label for="expertise" class="form-label">Expertise</label>
                        <select class="form-select select2" id="editExpertise">
                            <option value="">Select Expertise</option>
                            <?php foreach ($expertise_list as $expertise): ?>
                                <option value="<?= $expertise->ef_id ?>"><?= $expertise->ef_desc ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <!-- Button to add another expertise -->
                <button type="button" class="btn btn-primary btn-sm" id="addExpertiseBtnEdit">
                    <i class="fas fa-add" style="font-size: 1rem !important;"></i>&nbsp; Add Expertise
                </button>

                <!-- My NEC Field -->
                <div class="mb-3">
                    <label for="nec" class="form-label">Selected NEC Field:</label><br>
                    <div id="modalNECInput"></div>
                </div>

                <!-- NEC Selection -->
                <div class="mb-3">
                    <label for="nec_broad" class="form-label">NEC Broad</label>
                    <select class="form-select select2" id="edit_nec_broad" name="nec_broad">
                        <option value="">Select NEC Broad</option>
                        <?php foreach ($nec_broad as $broad): ?>
                            <option value="<?= $broad->nb_id ?>"><?= $broad->nb_code ?> <?= $broad->nb_name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="nec_narrow" class="form-label">NEC Narrow</label>
                    <select class="form-select select2" id="edit_nec_narrow" name="nec_narrow">
                        <option value="">Select NEC Narrow</option>
                        <!-- Options will be populated via JS -->
                    </select>
                </div>

                <div class="mb-3">
                    <label for="nec_detail" class="form-label">NEC Detail</label>
                    <select class="form-select select2" id="edit_nec_detail" name="nec_detail[]">
                        <option value="">Select NEC Detail</option>
                        <!-- Options will be populated via JS -->
                    </select>
                </div>

                <button type="button" class="btn btn-primary btn-sm" id="addNECBtnEdit">
                    <i class="fas fa-add" style="font-size: 1rem !important;"></i>&nbsp; Add NEC Field
                </button>
                
                <!-- edit cv -->
                <div class="mb-3">
                    <label for="asr_cv" class="form-label">CV File</label><br>
                    <span id="modalCVinput"></span>
                    <input type="file" name="asr_cv" class="form-control" accept=".pdf,.image/*">
                    <small class="form-text text-muted">Upload CV file (optional)</small>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger me-auto" id="deleteAssessorBtn">
            <i class="fas fa-trash"></i> Delete
          </button>
          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>


<script>
    document.getElementById('editAssessorForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        for (let [key, value] of formData.entries()) {
            console.log(key, value);
        }

        fetch("<?= base_url('appmpqua/editAssessor') ?>", {
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
    let editExpertiseArray = [];
    let editNECArray = [];

    function renderExpertiseBadges() {
        const container = document.getElementById('modalExpertiseInput');
        container.innerHTML = '';
        editExpertiseArray.forEach(exp => {
            // Badge
            const badge = document.createElement('span');
            badge.className = 'badge my-2 badge-secondary text-dark me-1';
            badge.setAttribute('data-exp-id', exp.id);
            badge.innerHTML = `
                ${exp.desc}
                <i class="fas fa-times text-danger ms-2 edit-delete-exp" style="cursor: pointer;"></i>
            `;
            container.appendChild(badge);

            // Hidden input for form submission
            const hidden = document.createElement('input');
            hidden.type = 'hidden';
            hidden.name = 'expertise[]';
            hidden.value = exp.id;
            hidden.setAttribute('data-exp-id', exp.id);
            container.appendChild(hidden);
        });
    }

    function renderNECBadges() {
        const container = document.getElementById('modalNECInput');
        container.innerHTML = '';
        editNECArray.forEach(nec => {
            // Badge
            const badge = document.createElement('span');
            badge.className = 'badge my-2 badge-secondary text-dark me-1';
            badge.setAttribute('data-nec-id', nec.id);
            badge.innerHTML = `
                ${nec.desc}
                <i class="fas fa-times text-danger ms-2 edit-delete-nec" style="cursor: pointer;"></i>
            `;
            container.appendChild(badge);

            // Hidden input for form submission (for nec_detail[])
            const hidden = document.createElement('input');
            hidden.type = 'hidden';
            hidden.name = 'nec_detail[]';
            hidden.value = nec.id;
            hidden.setAttribute('data-nec-id', nec.id);
            container.appendChild(hidden);
        });
    }

    // Add expertise from select
    document.getElementById('addExpertiseBtnEdit').addEventListener('click', function() {
        const select = document.getElementById('editExpertise');
        const expId = select.value;
        const expDesc = select.options[select.selectedIndex].text;

        if (!expId || editExpertiseArray.some(e => e.id == expId)) return;

        editExpertiseArray.push({id: expId, desc: expDesc});
        renderExpertiseBadges();
        select.value = '';
        console.log(editExpertiseArray);
    });

    // Add nec detail from select
    document.getElementById('addNECBtnEdit').addEventListener('click', function() {
        const select = document.getElementById('edit_nec_detail');
        const necId = select.value;
        const necDesc = select.options[select.selectedIndex].text;

        if (!necId || editNECArray.some(e => e.id == necId)) return;

        editNECArray.push({id: necId, desc: necDesc});
        renderNECBadges();
        select.value = '';
        console.log(editNECArray);
    });

    //Remove expertise on badge X click (event delegation) with SweetAlert confirmation
    document.getElementById('modalExpertiseInput').addEventListener('click', function(e) {
        if (e.target.classList.contains('edit-delete-exp')) {
            const badge = e.target.closest('span[data-exp-id]');
            const expId = badge.getAttribute('data-exp-id');
            const expDesc = badge.textContent.trim();

            Swal.fire({
                title: 'Remove Expertise?',
                text: `Are you sure you want to remove "${expDesc.replace('×','').trim()}"?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, remove it'
            }).then((result) => {
                if (result.isConfirmed) {
                    editExpertiseArray = editExpertiseArray.filter(e => e.id != expId);
                    renderExpertiseBadges();
                }
            });
        }
    });

    //Remove nec detail on badge X click (event delegation) with SweetAlert confirmation
    document.getElementById('modalNECInput').addEventListener('click', function(e) {
        if (e.target.classList.contains('edit-delete-nec')) {
            const badge = e.target.closest('span[data-nec-id]');
            const necId = badge.getAttribute('data-nec-id');
            const necDesc = badge.textContent.trim();

            Swal.fire({
                title: 'Remove NEC Detail?',
                text: `Are you sure you want to remove "${necDesc.replace('×','').trim()}"?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, remove it'
            }).then((result) => {
                if (result.isConfirmed) {
                    editNECArray = editNECArray.filter(e => e.id != necId);
                    renderNECBadges();
                }
            });
        }
    });

    // When opening the edit modal, reset and populate expertise and nec_detail arrays and render
    document.getElementById('openEditModalBtn').addEventListener('click', function() {
        // Reset the form and arrays
        document.getElementById('editAssessorForm').reset();
        editExpertiseArray = [];
        editNECArray = [];
        renderExpertiseBadges();
        renderNECBadges();

        const asrId = this.getAttribute('data-asr-id');
        fetch('<?= base_url('appmpqua/get_assessor/') ?>' + asrId)
            .then(response => response.json())
            .then(result => {
                if (!result.success) return;
                const data = result.data;

                // Fill other fields...
                document.getElementById('modalIdInput').value = data.asr_id || '';
                document.getElementById('modalNameInput').value = data.asr_name || '';
                document.getElementById('modalTelephoneInput').value = data.asr_phone || '';
                document.getElementById('modalFaxInput').value = data.asr_fax || '';
                document.getElementById('modalEmailInput').value = data.asr_email || '';
                document.getElementById('modalAddressInput').value = data.asr_service_address || '';
                document.getElementById('modalRetirementInput').value = data.asr_retirement_date || '';

                document.getElementById('modalCVinput').innerHTML = '';
                if (data.asr_cv_path) {
                    // Create a link to open the CV in a new tab
                    const link = document.createElement('a');
                    link.href = '<?= base_url() ?>' + data.asr_cv_path;
                    link.target = '_blank';
                    link.rel = 'noopener noreferrer';
                    link.innerText = 'View Existing CV';
                    link.className = 'btn btn-link p-0';
                    document.getElementById('modalCVinput').appendChild(link);
                } else {
                    document.getElementById('modalCVinput').innerText = '';
                }

                // Populate expertise array
                if (data.expertise_list && data.expertise_list.length > 0) {
                    const select = document.getElementById('editExpertise');
                    data.expertise_list.forEach(exp => {
                        if (typeof exp === 'object') {
                            editExpertiseArray.push({
                                id: exp.ef_id || exp.id || exp,
                                desc: exp.ef_desc || exp.name || exp
                            });
                        } else {
                            // If only string desc, try to find id from select options
                            let found = false;
                            for (let i = 0; i < select.options.length; i++) {
                                if (select.options[i].text === exp) {
                                    editExpertiseArray.push({id: select.options[i].value, desc: exp});
                                    found = true;
                                    break;
                                }
                            }
                            if (!found) editExpertiseArray.push({id: exp, desc: exp});
                        }
                    });
                }
                renderExpertiseBadges();

                // Populate nec_detail array
                if (data.nec_detail_list && data.nec_detail_list.length > 0) {
                    const select = document.getElementById('edit_nec_detail');
                    data.nec_detail_list.forEach(nec => {
                        if (typeof nec === 'object') {
                            editNECArray.push({
                                id: nec.nd_id,
                                desc: nec.nd_desc
                            });
                        } else {
                            // If only string desc, try to find id from select options
                            let found = false;
                            for (let i = 0; i < select.options.length; i++) {
                                if (select.options[i].text === nec) {
                                    editNECArray.push({id: select.options[i].value, desc: nec});
                                    found = true;
                                    break;
                                }
                            }
                            if (!found) editNECArray.push({id: nec, desc: nec});
                        }
                    });
                }
                renderNECBadges();
            });
    });
</script>

<script>
    jQuery(document).ready(function($) {
        // Hide narrow and detail fields initially
        $('#edit_nec_narrow').closest('.mb-3').hide();
        $('#edit_nec_detail').closest('.mb-3').hide();

        // Show NEC Narrow after selecting Broad
        $('#edit_nec_broad').on('change', function() {
            var broad_id = $(this).val();
            $('#edit_nec_narrow').html('<option value="">Loading...</option>');
            $('#edit_nec_detail').html('<option value="">Select NEC Detail</option>');
            if (broad_id) {
                $('#edit_nec_narrow').closest('.mb-3').show();
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
                                options += `<option value="${item.nn_id}">${item.nn_code} ${item.nn_name}</option>`;
                            });
                            $('#edit_nec_narrow').html(options).trigger('change');
                            $("input[name='csrf_test_name']").val(response.csrf_token);
                        } else {
                            $('#edit_nec_narrow').html('<option value="">Select NEC Narrow</option>');
                        }
                    }
                });
            } else {
                $('#edit_nec_narrow').closest('.mb-3').hide();
                $('#edit_nec_detail').closest('.mb-3').hide();
            }
            $('#edit_nec_detail').closest('.mb-3').hide();
        });

        // Show NEC Detail after selecting Narrow
        $('#edit_nec_narrow').on('change', function() {
            var narrow_id = $(this).val();
            $('#edit_nec_detail').html('<option value="">Loading...</option>');
            if (narrow_id) {
                $('#edit_nec_detail').closest('.mb-3').show();
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
                                options += `<option value="${item.nd_id}">${item.nd_code} ${item.nd_name}</option>`;
                            });
                            $('#edit_nec_detail').html(options).trigger('change');
                            $("input[name='csrf_test_name']").val(response.csrf_token);
                        } else {
                            $('#edit_nec_detail').html('<option value="">Select NEC Detail</option>');
                        }
                    }
                });
            } else {
                $('#edit_nec_detail').html('<option value="">Select NEC Detail</option>');
            }
        });
    });
</script>

<script>
// Handle delete assessor button
document.getElementById('deleteAssessorBtn').addEventListener('click', function() {
    const assessorId = document.getElementById('modalIdInput').value;
    Swal.fire({
        title: 'Delete Assessor?',
        text: 'Are you sure you want to delete this assessor? This action cannot be undone.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(`<?= base_url('appmpqua/deleteAssessor/') ?>${assessorId}`, {
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
                        text: data.message || 'Assessor has been deleted.',
                    }).then(() => {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message || 'Failed to delete assessor.',
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