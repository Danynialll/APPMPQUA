document.getElementById('add_nec_detail').addEventListener('change', function() {
            const detailId = this.value;
            const container = document.getElementById('assessor-table-container');
            container.innerHTML = '';

            // Only send the detailId to the controller
            if (detailId) {
                fetch('<?= base_url('appmpqua/get_assessors_by_nec_detail') ?>', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    body: 'nec_detail_id=' + encodeURIComponent(detailId)
                })
                .then(res => res.json())
                .then(data => {
                    console.log('Returned data:', data);
                    if (data.success && data.data.length > 0) {
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
                        data.data.forEach(a => {
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
            }
        });