<form id="filterAssessorForm">
    <?= csrf_field() ?>
    <div class="container py-4">
        <h4>Filter Assessors by NEC</h4>
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="nec_broad">NEC Broad</label>
                <select id="add_nec_broad" class="form-select select2" name="nec_broad">
                    <option value="">Select NEC Broad</option>
                    <?php foreach ($nec_broad as $broad): ?>
                        <option value="<?= esc($broad->nb_id) ?>"><?= esc($broad->nb_code) ?> - <?= esc($broad->nb_name) ?></option>
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
        <button type="submit" id="necFilterSubmit" class="btn btn-success mt-2">Show Assessors</button>
        <div id="assessor-table-container"></div>
    </div>
</form>

<script>
    jQuery(document).ready(function($) {
        // Hide narrow and detail fields initially
        $('#add_nec_narrow').closest('.col-md-4').hide();
        $('#add_nec_detail').closest('.col-md-4').hide();
        $('#necFilterSubmit').closest('.mt-2').hide();

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
                                options += `<option value="${item.nn_id}">${item.nn_code} ${item.nn_name}</option>`;
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
                                options += `<option value="${item.nd_id}">${item.nd_code} ${item.nd_name}</option>`;
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

        document.getElementById('add_nec_detail').addEventListener('change', function() {
            const submitBtn = document.getElementById('necFilterSubmit');
            if (this.value) {
                submitBtn.style.display = '';
            } else {
                submitBtn.style.display = 'none';
            }
        });
    });
</script>

<script>
    document.getElementById('filterAssessorForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const form = this;
        const formData = new FormData(form);

        fetch("<?= base_url('appmpqua/get_assessors_by_nec_detail') ?>", {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            const container = document.getElementById('assessor-table-container');

            console.log('Fetch response:', data);

            // ✅ Update CSRF token in form
            if (data.csrf_token) {
                document.querySelector("input[name='csrf_test_name']").value = data.csrf_token;
            }
            
            if (data.success && Array.isArray(data.assessors) && data.assessors.length > 0) {
                let html = `<table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Institute</th>
                        </tr>
                    </thead>
                    <tbody>`;
                data.assessors.forEach(a => {
                    html += `<tr>
                        <td>${a.asr_name}</td>
                        <td>${a.asr_gender}</td>
                        <td>${a.asr_phone}</td>
                        <td>${a.asr_email}</td>
                        <td>${a.asr_qu_id}</td>
                    </tr>`;
                });
                html += '</tbody></table>';
                container.innerHTML = html;
            } else {
                container.innerHTML = '<div class="alert alert-warning mt-3">No assessors found for this NEC detail.</div>';
            }
        });
    });
</script>


